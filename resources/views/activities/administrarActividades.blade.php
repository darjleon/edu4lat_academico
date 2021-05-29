<x-app-layout>

    <x-header-title>
        @if ($quiz_id != null)
            Escoje las actividades que tendra la prueba
        @else
            Actividades
        @endif
    </x-header-title>

    <x-container>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                        #
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                        Tipo de actividad
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                        Area
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                        Nivel
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                        Enunciado
                                    </th>
                                    @if ($quiz_id != null)
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                            Asignada
                                        </th>
                                    @endif
                                    <th colspan="1" class="relative px-6 py-3">
                                        <span class="sr-only">Accion</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($actividades as $actividad)
                                    @foreach ($act_tipo->where('id', '=', $actividad->activity_type_id) as $tipo)
                                        <tr>
                                            <td class="px-2 py-4 text-center whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $actividad->id }}</div>
                                            </td>
                                            <td class="px-2 py-4 text-center whitespace-nowrap">
                                                <div class="text-sm font-semibold text-gray-900">{{ $tipo->nombre }}
                                                </div>
                                            </td>
                                            <td class="px-2 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                                {{ $actividad->area }}
                                            </td>
                                            <td class="px-2 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                                @if ($actividad->nivel == null)
                                                    <span
                                                        class="inline-flex px-2 text-xs font-bold leading-6 text-red-800 bg-yellow-300 rounded-full">
                                                        Asignar nivel
                                                    </span>
                                                @else
                                                    {{ $actividad->nivel }}
                                                @endif
                                            </td>
                                            <td class="px-2 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                                {{ $actividad->enunciado }}
                                            </td>
                                            @if ($quiz_id != null)
                                                <td class="px-2 py-4 text-center whitespace-nowrap">
                                                    @if (in_array($actividad->id, $quiz_acti))
                                                        <span
                                                            class="inline-flex px-2 text-xs font-bold leading-6 text-gray-800 bg-green-300 rounded-full">
                                                            Asignado
                                                        </span>
                                                    @else
                                                        <span
                                                            class="inline-flex px-2 text-xs font-bold leading-6 text-red-800 bg-yellow-300 rounded-full">
                                                            Sin asignar
                                                        </span>
                                                    @endif
                                                </td>
                                            @endif
                                            <td class="px-4 py-2 text-center whitespace-nowrap">
                                                <div class="flex justify-center item-center">
                                                    @if ($quiz_id != null)
                                                        @can('Asignar_actividad')
                                                            <div
                                                                class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                                <a
                                                                    href="{{ route('quiz.activity.saveInQuiz', [$quiz_id, $actividad->id]) }}"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2"
                                                                            d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                                                    </svg></a>
                                                            </div>
                                                        @endcan
                                                    @endif
                                                    @can('Editar_actividad')
                                                        <div
                                                            class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <a
                                                                href="{{ route('activity.show', [$actividad->id, $quiz_id]) }}"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg></a>
                                                        </div>
                                                    @endcan
                                                    @can('Eliminar_actividad')
                                                        <div class="w-6 mr-2 hover:scale-110">
                                                            <form class="actividad-eliminar"
                                                                action="{{ route('activity.destroy', $actividad->id) }}"
                                                                method="post">
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}">
                                                                <button type="#">
                                                                    <div
                                                                        class="w-6 transform hover:text-purple-500 hover:scale-110">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                        </svg>
                                                                    </div>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @endcan

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                        {{ $actividades->links() }}
                    </div>
                </div>
            </div>
        </div>
    </x-container>

    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

        </script>

        @if (session('estado') == 'Guardada')
            <script>
                $(document).ready(function() {
                    Toast.fire({
                        icon: 'success',
                        title: 'Actividad guardada en la prueba'
                    })
                });

            </script>
        @elseif (session('estado')=='Eliminada')
            <script>
                $(document).ready(function() {
                    Toast.fire({
                        icon: 'success',
                        title: 'Actividad eliminada de la prueba'
                    })
                });

            </script>
        @endif

        <script>
            $(document).ready(function() {
                $('.actividad-eliminar').submit(function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Desea eliminar esta actividad?',
                        text: "Se eliminara de todas las pruebas en las que se encuentre",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'si, Eliminar!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    })
                });
            });

        </script>
    @endsection
    @can('Crear_actividad')
        <x-header-title>
            Crea una nueva actividad
        </x-header-title>

        <x-container>
            <div class="grid w-full max-w-6xl gap-4 lg:grid-cols-3 md:grid-cols-2">

                <x-modal-form>
                    <x-slot name="actividad">
                        Respuesta única
                    </x-slot>

                    <x-slot name="variable">
                        {{ $quiz_id }}
                    </x-slot>

                    <div class="form-group">
                        <label for="descripcion">Enunciado</label>
                        <textarea name="descripcion" id="descripcion"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escriba aquí"></textarea>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="respuesta">La opción correcta: </label>
                            <input type="text" name="respuesta" id="respuesta"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba la respuesta (opcion 0)"></input>
                        </div>
                        <div>
                            <label for="opciones">Las opciones: </label>

                            <input type="text" name="options1" id="options1"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba la opcion 1"></input>
                            <input type="text" name="options2" id="options2"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba la opcion 2"></input>
                            <input type="text" name="options3" id="options3"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba la opcion 3"></input>
                        </div>
                    </div>

                </x-modal-form>

                <x-modal-form>
                    <x-slot name="actividad">
                        Respuesta múltiple
                    </x-slot>

                    <x-slot name="variable">
                        {{ $quiz_id }}
                    </x-slot>

                    <div class="form-group">
                        <label for="descripcion">Enunciado</label>
                        <textarea name="descripcion" id="descripcion"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escriba aquí"></textarea>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="respuesta">Las opciones correctas: </label>

                            <input type="text" name="respuesta1" id="respuesta1"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba la respuesta"></input>
                            <input type="text" name="respuesta2" id="respuesta2"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba la respuesta"></input>
                            <input type="text" name="respuesta3" id="respuesta3"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba la respuesta"></input>
                        </div>
                        <div>
                            <label for="opciones">Las opciones: </label>

                            <input type="text" name="options1" id="options1"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba la options 1"></input>
                            <input type="text" name="options2" id="options2"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba la options 2"></input>
                            <input type="text" name="options3" id="options3"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba la options 3"></input>
                        </div>
                    </div>

                </x-modal-form>

                <x-modal-form>
                    <x-slot name="actividad">
                        Relación única
                    </x-slot>

                    <x-slot name="variable">
                        {{ $quiz_id }}
                    </x-slot>

                    <div class="form-group">
                        <label for="descripcion">Enunciado</label>
                        <textarea name="descripcion" id="descripcion"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escriba aquí"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="relacion1">La relación 1: </label>
                        <input type="text" name="relacion1" id="relacion1"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escriba A-A"></input>
                        <input type="text" name="respuesta1" id="respuesta1"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escriba A-A"></input>

                        <label for="relacion2">La relación 2: </label>
                        <input type="text" name="relacion2" id="relacion2"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escriba B-B"></input>
                        <input type="text" name="respuesta2" id="respuesta2"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escriba B-B"></input>

                        <label for="relacion3">La relación 3: </label>
                        <input type="text" name="relacion3" id="relacion3"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escriba C-C"></input>
                        <input type="text" name="respuesta3" id="respuesta3"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escriba C-C"></input>

                        <label for="relacion4">La relación 4: </label>
                        <input type="text" name="relacion4" id="relacion4"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escriba D-D"></input>
                        <input type="text" name="respuesta4" id="respuesta4"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escriba D-D"></input>
                    </div>

                </x-modal-form>

                <x-modal-form>
                    <x-slot name="actividad">
                        Verdadero o Falso
                    </x-slot>

                    <x-slot name="variable">
                        {{ $quiz_id }}
                    </x-slot>

                    <div class="form-group">
                        <label for="descripcion">Enunciado</label>
                        <textarea name="descripcion" id="descripcion"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escriba aquí"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="options">La respuesta será: </label><br>
                        <div class="inline ml-2">
                            <input type="radio" name="respuesta" id="options" class="w-5 h-5 text-green-500 form-radio"
                                value="true" checked>
                            <span class="ml-2">Verdadera</span>
                            <input type="radio" name="respuesta" id="options" class="w-5 h-5 ml-4 text-red-500 form-radio"
                                value="false">
                            <span class="ml-2">Falsa</span>
                        </div>
                    </div>

                </x-modal-form>

                <x-modal-form>
                    <x-slot name="actividad">
                        Dar respuesta
                    </x-slot>

                    <x-slot name="variable">
                        {{ $quiz_id }}
                    </x-slot>

                    <div class="form-group">
                        <label for="descripcion">Enunciado</label>
                        <textarea name="descripcion" id="descripcion"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escriba aquí"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="opcion">Pregunta</label>
                        <textarea name="opcion" id="opcion"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escriba aquí"></textarea>
                    </div>

                </x-modal-form>

                <x-modal-form>
                    <x-slot name="actividad">
                        Completar
                    </x-slot>

                    <x-slot name="variable">
                        {{ $quiz_id }}
                    </x-slot>

                    <div class="form-group">
                        <label for="descripcion">Enunciado</label>
                        <textarea name="descripcion" id="descripcion"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escriba aquí"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inicio">Inicio de la frase</label>
                        <textarea name="inicio" id="inicio"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escribe lo que irá antes del recuadro faltante"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="respuesta">Parte faltante</label>
                        <input type="text" name="respuesta" id="respuesta" placeholder="Escribe la palabra faltante"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none">
                    </div>
                    <div class="pt-4 form-group">
                        <label for="final">Final de la frase</label>
                        <textarea name="final" id="final"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escribe lo que irá después del recuadro faltante"></textarea>
                    </div>

                </x-modal-form>

            </div>
        </x-container>
    @endcan


    @if ($quiz_id != null)
        <a href="#" onclick="history.back()">
            <x-button-end class="text-black bg-white hover:bg-gray-200">
                Volver
            </x-button-end>
        </a>
    @endif
</x-app-layout>
