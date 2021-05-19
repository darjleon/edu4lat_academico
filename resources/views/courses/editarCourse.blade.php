<x-app-layout>

    <x-quiz-format-create>
        <x-slot name="titulo">
            <div class="flex items-center justify-between">
                <p class="pr-4">Edita el curso {{ $curso->nombre }} </p>
                <form action="{{ route('course.destroy', $curso->id) }}" method="post">
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit">
                        <div
                            class="flex items-center justify-center px-4 text-gray-900 bg-red-400 rounded-md w-50 hover:bg-red-600 focus:outline-none">
                            <svg class=" w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                    </button>
                </form>
            </div>
        </x-slot>

        <div class="divide-y divide-gray-200">
            <form method="post" action={{ route('course.update', $curso->id) }}>
                @csrf
                <div class="py-8 space-y-4 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7">
                    <div class="flex flex-col">
                        <label class="leading-loose" for="nombre">Nombre del curso</label>
                        <input type="text" id="nombre" name="nombre" value="{{ $curso->nombre }}"
                            class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                            placeholder="Nombre del curso" required>
                    </div>
                    <div class="flex flex-col">
                        <label class="leading-loose" for="descripcion">Descripcion</label>
                        <textarea id="descripcion" name="descripcion"
                            class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                            placeholder="Opcional">{{ $curso->descripcion }}</textarea>
                    </div>
                </div>
                <div class="flex justify-center pt-4 space-x-4">
                    <a href="#" onclick="history.back()"
                        class="flex items-center justify-center w-full px-4 py-3 text-gray-900 bg-green-400 rounded-md hover:bg-green-600 focus:outline-none">
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
