<x-app-layout>
    {{ Breadcrumbs::render('Actividades.edit', null, $actividad->id) }}

    @can('Ver_actividad')
        <x-container>
            <div class="flex-grow p-3 px-4 pt-3 pb-4 mb-2 bg-white">
                <form method="post" action={{ route('activity.update', $actividad->id) }}>
                    @csrf
                    @if ($actividad->activity_type_id == 1)
                        <div class="flex flex-row justify-center ">
                            <input class="text-2xl font-semibold text-center text-red-800 " name="nombre" id="nombre"
                                value="Verdadero o Falso" readonly>
                        </div>
                        <div class="flex flex-col px-4 pt-3 pb-4 my-2 bg-white rounded shadow-md">
                            <div class="mb-3 -mx-3 md:flex">
                                <div class="px-3 md:w-full">
                                    <div class="flex items-center justify-center space-x-3 form-group">
                                        <div class="flex flex-row">
                                            <input
                                                class="w-full py-2 font-semibold text-center text-gray-800 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                name="area" id="area" value="{{ $actividad->area }}" readonly>
                                        </div>
                                        <div class="flex flex-row">
                                            <select
                                                class="w-full py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                id="nivel" name="nivel">
                                                <option value="{{ $actividad->nivel }}">Nivel: {{ $actividad->nivel }}
                                                </option>
                                                @foreach ($niveles as $nivel)
                                                    <option value="{{ $nivel->nombre }}">{{ $nivel->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="block mb-2 text-lg font-bold tracking-wide uppercase text-grey-darker"
                                            for="descripcion">Enunciado:
                                        </label>
                                        <textarea name="descripcion" id="descripcion"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escriba el enunciado">{{ $actividad->enunciado }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="options">La respuesta es: </label><br>
                                        <div class="inline ml-2">
                                            @if ($actividad->respuesta == 'true')
                                                <input type="radio" name="respuesta" id="options"
                                                    class="w-5 h-5 text-green-500 form-radio" value="true" checked>
                                                <span class="ml-2">Verdadera</span>
                                                <input type="radio" name="respuesta" id="options"
                                                    class="w-5 h-5 ml-4 text-red-500 form-radio" value="false">
                                                <span class="ml-2">Falsa</span>
                                            @else
                                                <input type="radio" name="respuesta" id="options"
                                                    class="w-5 h-5 text-green-500 form-radio" value="true">
                                                <span class="ml-2">Verdadera</span>
                                                <input type="radio" name="respuesta" id="options"
                                                    class="w-5 h-5 ml-4 text-red-500 form-radio" value="false" checked>
                                                <span class="ml-2">Falsa</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif ($actividad->activity_type_id == 2)

                        <div class="flex flex-row justify-center ">
                            <input class="text-2xl font-semibold text-center text-red-800 " name="nombre" id="nombre"
                                value="Respuesta única" readonly>
                        </div>
                        <div class="flex flex-col px-4 pt-3 pb-4 my-2 bg-white rounded shadow-md">
                            <div class="mb-3 -mx-3 md:flex">
                                <div class="px-3 md:w-full">
                                    <div class="flex items-center justify-center space-x-3 form-group">
                                        <div class="flex flex-row">
                                            <input
                                                class="w-full py-2 font-semibold text-center text-gray-800 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                name="area" id="area" value="{{ $actividad->area }}" readonly>
                                        </div>
                                        <div class="flex flex-row">
                                            <select
                                                class="w-full py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                id="nivel" name="nivel">
                                                <option value="{{ $actividad->nivel }}">Nivel: {{ $actividad->nivel }}
                                                </option>
                                                @foreach ($niveles as $nivel)
                                                    <option value="{{ $nivel->nombre }}">{{ $nivel->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="block mb-2 text-lg font-bold tracking-wide uppercase text-grey-darker"
                                            for="descripcion">Enunciado:
                                        </label>
                                        <textarea name="descripcion" id="descripcion"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escriba el enunciado">{{ $actividad->enunciado }}</textarea>
                                    </div>
                                    @php
                                        $opciones = Arr::collapse([json_decode($actividad->opciones), json_decode($actividad->respuesta)]);
                                    @endphp

                                    <div class="form-group">
                                        <div>
                                            <label for="respuesta">La opción correcta: </label>
                                            <input type="text" name="respuesta" id="respuesta" value="{{ $opciones[3] }}"
                                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                                placeholder="Escriba la respuesta (opcion 0)"></input>
                                        </div>
                                        <div>
                                            <label for="opciones">Las opciones: </label>

                                            <input type="text" name="options1" id="options1" value="{{ $opciones[0] }}"
                                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                                placeholder="Escriba la opcion 1"></input>
                                            <input type="text" name="options2" id="options2" value="{{ $opciones[1] }}"
                                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                                placeholder="Escriba la opcion 2"></input>
                                            <input type="text" name="options3" id="options3" value="{{ $opciones[2] }}"
                                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                                placeholder="Escriba la opcion 3"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif ($actividad->activity_type_id == 3)

                        <div class="flex flex-row justify-center ">
                            <input class="text-2xl font-semibold text-center text-red-800 " name="nombre" id="nombre"
                                value="Respuesta múltiple" readonly>
                        </div>
                        <div class="flex flex-col px-4 pt-3 pb-4 my-2 bg-white rounded shadow-md">
                            <div class="mb-3 -mx-3 md:flex">
                                <div class="px-3 md:w-full">
                                    <div class="flex items-center justify-center space-x-3 form-group">
                                        <div class="flex flex-row">
                                            <input
                                                class="w-full py-2 font-semibold text-center text-gray-800 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                name="area" id="area" value="{{ $actividad->area }}" readonly>
                                        </div>
                                        <div class="flex flex-row">
                                            <select
                                                class="w-full py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                id="nivel" name="nivel">
                                                <option value="{{ $actividad->nivel }}">Nivel: {{ $actividad->nivel }}
                                                </option>
                                                @foreach ($niveles as $nivel)
                                                    <option value="{{ $nivel->nombre }}">{{ $nivel->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="block mb-2 text-lg font-bold tracking-wide uppercase text-grey-darker"
                                            for="descripcion">Enunciado:
                                        </label>
                                        <textarea name="descripcion" id="descripcion"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escriba el enunciado">{{ $actividad->enunciado }}</textarea>
                                    </div>
                                    @php
                                        $opciones = Arr::collapse([json_decode($actividad->opciones), json_decode($actividad->respuesta)]);
                                    @endphp
                                    <div class="form-group">
                                        <div>
                                            <label for="respuesta">Las opciones correctas: </label>

                                            <input type="text" name="respuesta1" id="respuesta1"
                                                value="{{ $opciones[3] }}"
                                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                                placeholder="Escriba la respuesta"></input>
                                            <input type="text" name="respuesta2" id="respuesta2"
                                                value="{{ $opciones[4] }}"
                                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                                placeholder="Escriba la respuesta"></input>
                                            <input type="text" name="respuesta3" id="respuesta3"
                                                value="{{ $opciones[5] }}"
                                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                                placeholder="Escriba la respuesta"></input>
                                        </div>
                                        <div>
                                            <label for="opciones">Las opciones: </label>

                                            <input type="text" name="options1" id="options1" value="{{ $opciones[0] }}"
                                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                                placeholder="Escriba la options 1"></input>
                                            <input type="text" name="options2" id="options2" value="{{ $opciones[1] }}"
                                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                                placeholder="Escriba la options 2"></input>
                                            <input type="text" name="options3" id="options3" value="{{ $opciones[2] }}"
                                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                                placeholder="Escriba la options 3"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif ($actividad->activity_type_id == 4)

                        <div class="flex flex-row justify-center ">
                            <input class="text-2xl font-semibold text-center text-red-800 " name="nombre" id="nombre"
                                value="Dar respuesta" readonly>
                        </div>
                        <div class="flex flex-col px-4 pt-3 pb-4 my-2 bg-white rounded shadow-md">
                            <div class="mb-3 -mx-3 md:flex">
                                <div class="px-3 md:w-full">
                                    <div class="flex items-center justify-center space-x-3 form-group">
                                        <div class="flex flex-row">
                                            <input
                                                class="w-full py-2 font-semibold text-center text-gray-800 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                name="area" id="area" value="{{ $actividad->area }}" readonly>
                                        </div>
                                        <div class="flex flex-row">
                                            <select
                                                class="w-full py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                id="nivel" name="nivel">
                                                <option value="{{ $actividad->nivel }}">Nivel: {{ $actividad->nivel }}
                                                </option>
                                                @foreach ($niveles as $nivel)
                                                    <option value="{{ $nivel->nombre }}">{{ $nivel->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="block mb-2 text-lg font-bold tracking-wide uppercase text-grey-darker"
                                            for="descripcion">Enunciado:
                                        </label>
                                        <textarea name="descripcion" id="descripcion"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escriba el enunciado">{{ $actividad->enunciado }}</textarea>
                                    </div>
                                    @php
                                        $pregunta = json_decode($actividad->opciones)[0];
                                    @endphp

                                    <div class="form-group">
                                        <label for="opcion">Pregunta</label>
                                        <textarea name="opcion" id="opcion"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escriba la pregunta">{{ $pregunta }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif ($actividad->activity_type_id == 5)

                        <div class="flex flex-row justify-center ">
                            <input class="text-2xl font-semibold text-center text-red-800 " name="nombre" id="nombre"
                                value="Relación única" readonly>
                        </div>
                        <div class="flex flex-col px-4 pt-3 pb-4 my-2 bg-white rounded shadow-md">
                            <div class="mb-3 -mx-3 md:flex">
                                <div class="px-3 md:w-full">
                                    <div class="flex items-center justify-center space-x-3 form-group">
                                        <div class="flex flex-row">
                                            <input
                                                class="w-full py-2 font-semibold text-center text-gray-800 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                name="area" id="area" value="{{ $actividad->area }}" readonly>
                                        </div>
                                        <div class="flex flex-row">
                                            <select
                                                class="w-full py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                id="nivel" name="nivel">
                                                <option value="{{ $actividad->nivel }}">Nivel: {{ $actividad->nivel }}
                                                </option>
                                                @foreach ($niveles as $nivel)
                                                    <option value="{{ $nivel->nombre }}">{{ $nivel->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="block mb-2 text-lg font-bold tracking-wide uppercase text-grey-darker"
                                            for="descripcion">Enunciado:
                                        </label>
                                        <textarea name="descripcion" id="descripcion"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escriba el enunciado">{{ $actividad->enunciado }}</textarea>
                                    </div>
                                    @php
                                        $opcionPar = json_decode($actividad->respuesta);
                                        $opcionImpar = json_decode($actividad->opciones);
                                    @endphp


                                    <div class="form-group">
                                        <label for="relacion1">La relación 1: </label>
                                        <input type="text" name="relacion1" id="relacion1" value="{{ $opcionImpar[0] }}"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escriba A-A"></input>
                                        <input type="text" name="respuesta1" id="respuesta1" value="{{ $opcionPar[0] }}"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escriba A-A"></input>

                                        <label for="relacion2">La relación 2: </label>
                                        <input type="text" name="relacion2" id="relacion2" value="{{ $opcionImpar[1] }}"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escriba B-B"></input>
                                        <input type="text" name="respuesta2" id="respuesta2" value="{{ $opcionPar[1] }}"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escriba B-B"></input>

                                        <label for="relacion3">La relación 3: </label>
                                        <input type="text" name="relacion3" id="relacion3" value="{{ $opcionImpar[2] }}"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escriba C-C"></input>
                                        <input type="text" name="respuesta3" id="respuesta3" value="{{ $opcionPar[2] }}"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escriba C-C"></input>

                                        <label for="relacion4">La relación 4: </label>
                                        <input type="text" name="relacion4" id="relacion4" value="{{ $opcionImpar[3] }}"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escriba D-D"></input>
                                        <input type="text" name="respuesta4" id="respuesta4" value="{{ $opcionPar[3] }}"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escriba D-D"></input>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif ($actividad->activity_type_id == 6)

                        <div class="flex flex-row justify-center ">
                            <input class="text-2xl font-semibold text-center text-red-800 " name="nombre" id="nombre"
                                value="Completar" readonly>
                        </div>
                        <div class="flex flex-col px-4 pt-3 pb-4 my-2 bg-white rounded shadow-md">
                            <div class="mb-3 -mx-3 md:flex">
                                <div class="px-3 md:w-full">
                                    <div class="flex items-center justify-center space-x-3 form-group">
                                        <div class="flex flex-row">
                                            <input
                                                class="w-full py-2 font-semibold text-center text-gray-800 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                name="area" id="area" value="{{ $actividad->area }}" readonly>
                                            {{-- <select
                                            class="w-full py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                            id="area" name="area" required>
                                            <option value="{{ $actividad->area }}">Area: {{ $actividad->area }}
                                            </option>
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->nombre }}">{{ $area->nombre }}</option>
                                            @endforeach
                                        </select> --}}
                                        </div>
                                        <div class="flex flex-row">
                                            <select
                                                class="w-full py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                id="nivel" name="nivel">
                                                <option value="{{ $actividad->nivel }}">Nivel: {{ $actividad->nivel }}
                                                </option>
                                                @foreach ($niveles as $nivel)
                                                    <option value="{{ $nivel->nombre }}">{{ $nivel->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="block mb-2 text-lg font-bold tracking-wide uppercase text-grey-darker"
                                            for="descripcion">Enunciado:
                                        </label>
                                        <textarea name="descripcion" id="descripcion"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escriba el enunciado">{{ $actividad->enunciado }}</textarea>
                                    </div>
                                    @php
                                        $opciones = Arr::collapse([json_decode($actividad->opciones), json_decode($actividad->respuesta)]);
                                    @endphp

                                    <div class="form-group">
                                        <label for="inicio">Inicio de la frase</label>
                                        <textarea name="inicio" id="inicio"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escribe lo que irá antes del recuadro faltante">{{ $opciones[0] }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="respuesta">Parte faltante</label>
                                        <input type="text" name="respuesta" id="respuesta"
                                            placeholder="Escribe la palabra faltante" value="{{ $opciones[2] }}"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none">
                                    </div>
                                    <div class="pt-4 form-group">
                                        <label for="final">Final de la frase</label>
                                        <textarea name="final" id="final"
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Escribe lo que irá después del recuadro faltante">{{ $opciones[1] }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="flex-grow p-6 px-4 pt-3 pb-4 mb-2 bg-white">
                        <div class="flex justify-end px-6 pt-3 border-t">
                            <a href="{{ route('activity.index', $quiz_id) }}"
                                class="px-4 py-2 mr-1 text-gray-100 bg-red-500 rounded">Volver</a>
                            @can('Editar_actividad')
                                <button type="submit" class="px-4 py-2 text-gray-200 bg-blue-600 rounded">Guardar
                                    cambios</Button>
                            @endcan
                        </div>
                    </div>
                </form>
            </div>
            @can('Editar_prueba')
                <x-container>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                    <table class="min-w-full ">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                    Creado
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                    Libro
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                    Titulo
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
                                                    Estado
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                    Fecha
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                    Asignada
                                                </th>
                                                <th colspan="1" class="relative px-3 py-3">
                                                    <span class="sr-only">Accion</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($pruebas as $prueba)
                                                <tr>
                                                    <td class="px-5 py-4 text-center whitespace-normal">
                                                        <div class="text-sm text-gray-900">
                                                            {{ \Carbon\Carbon::parse($prueba->created_at)->diffForHumans() }}
                                                        </div>
                                                    </td>
                                                    <td class="px-3 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                                        <span
                                                            class="inline-flex px-2 text-xs font-bold leading-6 text-gray-800 bg-green-300 rounded-full">
                                                            {{ $prueba->libro_id }}
                                                        </span>
                                                    </td>
                                                    <td class="px-3 py-4 text-center whitespace-nowrap">
                                                        <div class="text-sm font-medium text-gray-900">{{ $prueba->titulo }}
                                                        </div>
                                                    </td>
                                                    <td class="px-3 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                                        {{ $prueba->area }}
                                                    </td>
                                                    <td class="px-3 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                                        {{ $prueba->nivel }}
                                                    </td>
                                                    @if ($prueba->estado == 'Pendiente')
                                                        <td class="px-3 py-4 text-center whitespace-nowrap">
                                                            <span
                                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-500 bg-yellow-200 rounded-full">
                                                                {{ $prueba->estado }}
                                                            </span>
                                                        </td>
                                                        <td class="px-3 py-4 text-center whitespace-nowrap">
                                                            <span
                                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-500 bg-yellow-200 rounded-full">
                                                                {{ \Carbon\Carbon::parse($prueba->fecha)->toFormattedDateString() }}
                                                            </span>
                                                        </td>
                                                    @else
                                                        <td class="px-3 py-4 text-center whitespace-nowrap">
                                                            <span
                                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                                {{ $prueba->estado }}
                                                            </span>
                                                        </td>
                                                        <td class="px-3 py-4 text-center whitespace-nowrap">
                                                            <span
                                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                                {{ \Carbon\Carbon::parse($prueba->fecha)->toFormattedDateString() }}
                                                            </span>
                                                        </td>
                                                    @endif
                                                    <td class="px-2 py-4 text-center whitespace-nowrap">
                                                        @if (in_array($prueba->id, $pruebas_keys))
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
                                                    <td class="px-4 py-2 text-center whitespace-nowrap">
                                                        <div class="flex justify-center item-center">
                                                            @can('Asignar_actividad')
                                                                <div
                                                                    class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                                    <a
                                                                        href="{{ route('quiz.activity.saveInActivity', [$prueba->id, $actividad->id, $quiz_id]) }}"><svg
                                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                                                        </svg></a>
                                                                </div>
                                                            @endcan
                                                            @can('Ver_prueba')
                                                                <div
                                                                    class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                                    <a href="{{ route('quiz.show', $prueba->id) }}"><svg
                                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                        </svg></a>
                                                                </div>
                                                            @endcan
                                                            <div
                                                                class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                                <a href="{{ route('quiz.edit', $prueba->id) }}"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2"
                                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                    </svg></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-container>
            @endcan


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
        @endsection
    @endcan

</x-app-layout>
