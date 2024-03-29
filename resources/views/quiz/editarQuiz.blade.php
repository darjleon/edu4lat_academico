<x-app-layout>
    {{ Breadcrumbs::render('Prueba.edit', $prueba) }}

    @can('Editar_prueba')
        <x-quiz-format-create>
            <x-slot name="titulo">
                Edita los datos o intrucciones necesarios para programar y realizar la prueba
            </x-slot>
            <x-slot name="icono">
                no
            </x-slot>
            <div class="divide-y divide-gray-200">
                <form method="post" action={{ route('quiz.update', $prueba->id) }}>
                    @csrf
                    <div class="py-8 space-y-4 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7">
                        <div class="flex flex-col">
                            <label class="leading-loose" for="titulo">Titulo</label>
                            <input type="text" id="titulo" name="titulo" value="{{ $prueba->titulo }}"
                                class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                placeholder="Titulo" required>
                        </div>
                        <div class="flex flex-col">
                            <label class="leading-loose" for="descripcion">Descripcion/Instrucciones</label>
                            <textarea id="descripcion" name="descripcion"
                                class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                placeholder="Opcional">{{ $prueba->descripcion }}</textarea>
                        </div>
                        <div class="flex flex-col">
                            <div class="input-group-prepend">
                                <label class="leading-loose input-group-text" for="libro">Libro</label>
                            </div>
                            <select id="libro"
                                class="w-full py-2 text-gray-600 border border-gray-300 rounded-md form-multiselect focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                name="libro" required>
                                <option value="{{ $prueba->libro_id }}">Libro:
                                    {{ $libros->find($prueba->libro_id)->titulo }}-{{ $libros->find($prueba->libro_id)->area }}-{{ $libros->find($prueba->libro_id)->nivel }}
                                </option>
                                @foreach ($libros as $libro)
                                    <option value="{{ $libro->id }}">
                                        {{ $libro->titulo }}-{{ $libro->area }}-{{ $libro->nivel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="relative flex items-center border-b last:border-b-0">
                            <input type="checkbox"
                                class="absolute w-4 h-4 text-green-600 border border-gray-300 rounded-md cursor-pointer left-3"
                                name="check" id="check" value="1" onchange="javascript:showContent()">
                            <label class="flex-1 block py-2 pl-10 pr-2 cursor-pointer" for="check">Seleccionar una fecha?
                            </label>
                        </div>
                        <div id="content" style="display: none;">
                            <div class="flex flex-col">
                                <label class="leading-loose" for="fecha">Fecha de la
                                    prueba</label>
                                <input value="{{ $prueba->fecha }}"
                                    class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                    name="fecha" id="fecha" type="date">
                            </div>
                            <div class="flex justify-around space-x-4">
                                <div class="flex flex-col">
                                    <label class="leading-loose">Hora de inicio</label>
                                    <div class="flex flex-col text-gray-400 focus-within:text-gray-600">
                                        <input value="{{ $prueba->inicio }}"
                                            class="w-full px-8 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                            name="hora_de_inicio" id="hora_de_inicio" type="time">
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose">Hora de cierre</label>
                                    <div class="flex flex-col text-gray-400 focus-within:text-gray-600">
                                        <input value="{{ $prueba->fin }}"
                                            class="w-full px-8 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                            name="hora_de_cierre" id="hora_de_cierre" type="time">
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        $("#fecha , #hora_de_inicio, #hora_de_cierre").val("");
                    }
                }
            </script>
        </x-quiz-format-create>
    @endcan


</x-app-layout>
