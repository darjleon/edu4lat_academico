<x-app-layout>
    @can('Editar_libro')
        <x-quiz-format-create>
            <x-slot name="titulo">
                Edita el un libro seleccionado
            </x-slot>
            <x-slot name="icono">
                no
            </x-slot>
            <div class="divide-y divide-gray-200">
                <form method="post"
                    action={{ route('book.update', ['libro_id' => $libro->id, 'curso_id' => $curso_id]) }}>
                    @csrf
                    <div class="py-8 space-y-4 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7">
                        <div class="flex flex-col">
                            <label class="leading-loose" for="titulo">Titulo</label>
                            <input type="text" id="titulo" name="titulo" value="{{ $libro->titulo }}"
                                class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                placeholder="Titulo" required>
                        </div>
                        <div class="flex flex-col">
                            <label class="leading-loose" for="descripcion">Descripcion/Instrucciones</label>
                            <textarea id="descripcion" name="descripcion"
                                class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                placeholder="Opcional">{{ $libro->descripcion }}</textarea>
                        </div>
                        @can('Asignar_libro')
                            @if ($curso_id != null)
                                <div class="relative flex items-center border-b last:border-b-0">
                                    <input type="checkbox"
                                        class="absolute w-4 h-4 text-green-600 border border-gray-300 rounded-md cursor-pointer left-3"
                                        name="check" id="check" value="1" onchange="javascript:showContent()">
                                    <label class="flex-1 block py-2 pl-10 pr-2 text-base cursor-pointer" for="check">Desea
                                        cambiar al encargado de este libro en el curso?
                                    </label>
                                </div>
                                <div id="content" style="display: none;">
                                    <div class="flex flex-col">
                                        <div class="input-group-prepend">
                                            <label class="leading-loose input-group-text" for="docnete">Docente
                                                encargado:</label>
                                        </div>
                                        <select id="docente"
                                            class="w-full py-2 text-gray-600 border border-gray-300 rounded-md form-multiselect focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                            name="docente">
                                            <option value="{{ $encargado->id ?? '' }}">Docente:
                                                {{ $encargado->name ?? '' }}</option>
                                            @foreach ($docentes as $docente)
                                                <option value="{{ $docente->id }}">{{ $docente->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                        @endcan
                    </div>
                    <div class="flex justify-center pt-4 space-x-4">
                        <a href="#" onclick="history.back()"
                            class="flex items-center justify-center w-full px-4 py-3 text-gray-900 bg-red-400 rounded-md hover:bg-red-600 focus:outline-none">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12">
                                </path>
                            </svg>Cancelar
                        </a>
                        <button type="submit"
                            class="flex items-center justify-center w-full px-4 py-3 text-white bg-blue-400 rounded-md hover:bg-blue-600 focus:outline-none">Guardar
                            cambios
                            <svg class="w-12 h-12 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            <script type="text/javascript">
                function showContent() {
                    element = document.getElementById("content");
                    check = document.getElementById("check");
                    if (check.checked) {
                        element.style.display = 'block';
                    } else {
                        element.style.display = 'none';
                        $("#docente").val("");
                    }
                }

            </script>
        </x-quiz-format-create>
    @endcan


</x-app-layout>
