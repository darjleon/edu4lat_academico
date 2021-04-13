<x-app-layout>

    <x-quiz-format-create>
        <div class="divide-y divide-gray-200">
            <form>
                @csrf
                <div class="py-8 space-y-4 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7">
                    <div class="flex flex-col">
                        <label class="leading-loose" for="titulo">Titulo</label>
                        <input type="text" value="{{ $prueba->titulo }}"
                            class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                            readonly>
                    </div>
                    <div class="flex flex-col">
                        <label class="leading-loose" for="descripcion">Descripcion/Instrucciones</label>
                        <textarea id="descripcion" name="descripcion"
                            class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                            placeholder="{{ $prueba->descripcion }}" readonly></textarea>
                    </div>
                    <div class="flex justify-around space-x-4">
                        <div class="flex flex-col">
                            <div class="input-group-prepend">
                                <label class="leading-loose input-group-text" for="curso">Curso:</label>
                            </div>
                            <input type="text" id="curso" name="curso" value="{{ $prueba->curso }}"
                                class="w-full py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                readonly>
                        </div>
                        <div class="flex flex-col">
                            <div class="input-group-prepend">
                                <label class="leading-loose input-group-text" for="area">Area:</label>
                            </div>
                            <input type="text" id="area" name="area" value="{{ $prueba->area }}"
                                class="w-full py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                readonly>
                        </div>
                        <div class="flex flex-col">
                            <div class="leading-loose input-group-prepend">
                                <label class="input-group-text" for="nivel">Nivel:</label>
                            </div>
                            <input type="text" id="nivel" name="nivel" value="{{ $prueba->nivel }}"
                                class="w-full py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                readonly>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <label class="leading-loose" for="fecha">Fecha de la
                            prueba</label>
                        <input value="{{ $prueba->fecha }}"
                            class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                            name="fecha" id="fecha" type="date" readonly>
                    </div>
                    <div class="flex justify-around space-x-4">
                        <div class="flex flex-col">
                            <label class="leading-loose">Hora de inicio</label>
                            <div class="flex flex-col text-gray-400 focus-within:text-gray-600">
                                <input value="{{ $prueba->inicio }}"
                                    class="w-full px-8 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                    name="hora_de_inicio" id="hora_de_inicio" type="time" readonly>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label class="leading-loose">Hora de cierre</label>
                            <div class="flex flex-col text-gray-400 focus-within:text-gray-600">
                                <input value="{{ $prueba->fin }}"
                                    class="w-full px-8 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                    name="hora_de_cierre" id="hora_de_cierre" type="time" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center pt-4 space-x-4">
                    <a href="#" onclick="history.back()"
                        class="flex items-center justify-center w-full px-4 py-3 text-gray-900 bg-blue-300 rounded-md focus:outline-none">
                        <svg class="w-12 h-12 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z">
                            </path>
                        </svg>Volver
                    </a>
                    <a href="{{ route('quiz.edit', $prueba->id) }}"
                        class="flex items-center justify-center w-full px-4 py-3 text-white bg-blue-500 rounded-md focus:outline-none">Editar
                        <svg class="w-12 h-12 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </a>
                </div>
            </form>
        </div>
    </x-quiz-format-create>

</x-app-layout>
