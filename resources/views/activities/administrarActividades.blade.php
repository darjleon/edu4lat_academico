<x-app-layout>

    <x-header-title>
        <p
            class="flex items-center justify-center w-1/2 px-4 py-3 text-white bg-green-500 rounded-md focus:outline-none">
            Escoje las actividades que tendra la prueba</p><br>
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
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        #
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Tipo de actividad
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Area
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Nivel
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Enunciado
                                    </th>
                                    <th colspan="1" class="relative px-6 py-3">
                                        <span class="sr-only">Accion</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($actividades as $actividad)
                                    @foreach ($act_tipo->where('id', '=', $actividad->activity_type_id) as $tipo)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $actividad->id }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $tipo->tipo }}</div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                {{ $actividad->area }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                {{ $actividad->nivel }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                {{ $actividad->enunciado }}
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">editar</a>
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

    <x-header-title>
        <br>
        <p
            class="flex items-center justify-center w-1/2 px-4 py-3 text-white bg-green-500 rounded-md focus:outline-none">
            Crea una nueva actividad</p><br>
    </x-header-title>

    <x-container>
        <div class="grid w-full max-w-6xl gap-4 lg:grid-cols-3 md:grid-cols-2">

            <x-modal-form>
                <x-slot name="actividad">
                    Escojer la opción correcta
                </x-slot>

                <div class="form-group">
                    <label for="description">Enunciado</label>
                    <textarea name="description" id="description"
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
                    Escojer las opciones correctas
                </x-slot>

                <div class="form-group">
                    <label for="description">Enunciado</label>
                    <textarea name="description" id="description"
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
                    Relacionar las palabras
                </x-slot>

                <div class="form-group">
                    <label for="description">Enunciado</label>
                    <textarea name="description" id="description"
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
                    Verdadero y falso
                </x-slot>

                <div class="form-group">
                    <label for="description">Enunciado</label>
                    <textarea name="description" id="description"
                        class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                        placeholder="Escriba aquí"></textarea>
                </div>
                <div class="form-group">
                    <label for="options">La respuesta será: </label><br>
                    <div class="inline ml-2">
                        <input type="radio" name="answer" id="options" class="w-5 h-5 text-green-500 form-radio"
                            value="true" checked>
                        <span class="ml-2">Verdadera</span>
                        <input type="radio" name="answer" id="options" class="w-5 h-5 ml-4 text-red-500 form-radio"
                            value="false">
                        <span class="ml-2">Falsa</span>
                    </div>
                </div>

            </x-modal-form>

            <x-modal-form>
                <x-slot name="actividad">
                    Responder pregunta
                </x-slot>

                <div class="form-group">
                    <label for="description">Enunciado/Pregunta</label>
                    <textarea name="description" id="description"
                        class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                        placeholder="Escriba aquí"></textarea>
                </div>

            </x-modal-form>

            <x-modal-form>
                <x-slot name="actividad">
                    Complete la frase
                </x-slot>

                <div class="form-group">
                    <label for="txt_init">Enunciado</label>
                    <textarea name="txt_init" id="txt_init"
                        class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                        placeholder="Escribe lo que irá antes del recuadro faltante"></textarea>
                </div>
                <div class="my-2 form-group">
                    <label>Palabra</label>
                    <div class="inline ml-2">
                        <input type="text" name="answer" placeholder="Escribe la palabra faltante"
                            class="px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txt_end">Enunciado</label>
                    <textarea name="txt_end" id="txt_end"
                        class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                        placeholder="Escribe lo que irá después del recuadro faltante"></textarea>
                </div>

            </x-modal-form>

        </div>
    </x-container>

</x-app-layout>
