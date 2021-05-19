<x-app-layout>

    <x-quiz-format-create>
        <x-slot name="titulo">
            Crea un nuevo curso
        </x-slot>
        <div class="divide-y divide-gray-200">
            <form method="post" action={{ route('course.store') }}>
                @csrf
                <div class="py-8 space-y-4 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7">
                    <div class="flex flex-col">
                        <label class="leading-loose" for="nombre">Nombre del curso</label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"
                            class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                            placeholder="Nombre del curso" required>
                    </div>
                    <div class="flex flex-col">
                        <label class="leading-loose" for="descripcion">Descripcion</label>
                        <textarea id="descripcion" name="descripcion"
                            class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                            placeholder="Opcional">{{ old('descripcion') }}</textarea>
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
                        curso
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
