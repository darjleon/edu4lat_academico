<div x-data="{ {{ $id }}: false }" :class="{'overflow-y-hidden': {{ $id }} }">

    {{ $boton }}
    <div class="fixed inset-0 z-20 w-full h-full overflow-y-auto duration-300 bg-black bg-opacity-50"
        x-show="{{ $id }}" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="relative opacity-100 ">
            <div class="relative z-20 rounded-md" @click.away="{{ $id }} = false" x-show="{{ $id }}"
                x-transition:enter="transition transform duration-300" x-transition:enter-start="scale-0"
                x-transition:enter-end="scale-100" x-transition:leave="transition transform duration-300"
                x-transition:leave-start="scale-100" x-transition:leave-end="scale-0">

                <x-quiz-format-create>
                    <x-slot name="titulo">
                        {{ $titulo }}
                        <button class="p-2 focus:outline-none" @click="{{ $id }} = false">
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                </path>
                            </svg>
                        </button>
                    </x-slot>
                    <div class="divide-y divide-gray-200">
                        <form method="post" {{ $attributes->merge(['action']) }}>
                            @csrf
                            {{ $slot }}
                            <div class="flex justify-center pt-4 space-x-4">
                                <a href="#" @click="{{ $id }} = false"
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
            </div>
        </div>
    </div>
</div>
