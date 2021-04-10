<x-app-layout>

    <x-quiz-format-create>
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
                    <div class="flex justify-around space-x-4">
                        <div class="flex flex-col">
                            <div class="input-group-prepend">
                                <label class="leading-loose input-group-text" for="curso">Curso</label>
                            </div>
                            <select id="curso"
                                class="w-full py-2 text-gray-600 border border-gray-300 rounded-md form-multiselect focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                name="curso">
                                <option value="{{ $prueba->curso }}">Area: {{ $prueba->curso }}</option>
                                @foreach ($cursos as $curso)
                                    <option value="{{ $curso }}">{{ $curso }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <div class="input-group-prepend">
                                <label class="leading-loose input-group-text" for="area">Area</label>
                            </div>
                            <select
                                class="w-full py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                id="area" name="area" required>
                                <option value="{{ $prueba->area }}">Area: {{ $prueba->area }}</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area }}">{{ $area }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <div class="leading-loose input-group-prepend">
                                <label class="input-group-text" for="nivel">Nivel</label>
                            </div>
                            <select
                                class="w-full py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                id="nivel" name="nivel" required>
                                <option value="{{ $prueba->nivel }}">Nivel: {{ $prueba->nivel }}</option>
                                @foreach ($niveles as $nivel)
                                    <option value="{{ $nivel }}">{{ $nivel }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <label class="leading-loose" for="fecha">Fecha de la
                            prueba</label>
                        <input value="{{ $prueba->fecha }}"
                            class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                            name="fecha" id="fecha" type="date" required>
                    </div>
                    <div class="flex justify-around space-x-4">
                        <div class="flex flex-col">
                            <label class="leading-loose">Hora de inicio</label>
                            <div class="flex flex-col text-gray-400 focus-within:text-gray-600">
                                <input value="{{ $prueba->inicio }}"
                                    class="w-full px-8 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                    name="hora_de_inicio" id="hora_de_inicio" type="time" required>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label class="leading-loose">Hora de cierre</label>
                            <div class="flex flex-col text-gray-400 focus-within:text-gray-600">
                                <input value="{{ $prueba->fin }}"
                                    class="w-full px-8 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                    name="hora_de_cierre" id="hora_de_cierre" type="time" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center pt-4 space-x-4">
                    <a href="#" onclick="history.back()"
                        class="flex items-center justify-center w-full px-4 py-3 text-gray-900 bg-red-400 rounded-md focus:outline-none">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>Cancelar
                    </a>
                    <button type="submit"
                        class="flex items-center justify-center w-full px-4 py-3 text-white bg-blue-500 rounded-md focus:outline-none">Guardar
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
    </x-quiz-format-create>

</x-app-layout>
