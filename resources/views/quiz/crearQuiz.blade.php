<x-app-layout>
    <x-container>
        <div class="flex flex-col justify-center min-h-screen py-6 bg-gray-100 sm:py-12">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div class="relative px-4 py-10 mx-8 bg-white shadow md:mx-0 rounded-3xl sm:p-10">
                    <div class="max-w-md mx-auto">
                        <div class="flex items-center space-x-5">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-20 h-20 font-mono text-2xl rounded-full">
                                <svg class="h-36 w-36" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                    <path
                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                                    </path>
                                </svg>
                            </div>
                            <div class="self-start block pl-2 text-xl font-semibold text-gray-700">
                                <h2 class="leading-relaxed">Crea la prueba</h2>
                                <p class="text-sm font-normal leading-relaxed text-gray-500">Ingrese los datos e
                                    intrucciones necesarios para la prueba</p>
                            </div>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <div class="py-8 space-y-4 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7">
                                <div class="flex flex-col">
                                    <label class="leading-loose">Titulo</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                        placeholder="Titulo" required>
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose">Descripcion/Instrucciones</label>
                                    <textarea
                                        class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                        placeholder="Opcional"></textarea>
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose" for="Date">Fecha de la
                                        prueba</label>
                                    <input
                                        class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                        name="date" id="date" type="date" required>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <div class="flex flex-col">
                                        <label class="leading-loose">Hora de inicio</label>
                                        <div class="flex flex-col text-gray-400 focus-within:text-gray-600">
                                            <input
                                                class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                                name="dateStart" id="dateStart" type="time" required>
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="leading-loose">Hora de cierre</label>
                                        <div class="flex flex-col text-gray-400 focus-within:text-gray-600">
                                            <input
                                                class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                                name="dateEnd" id="dateEnd" type="time" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center pt-4 space-x-4">
                                <a href="#" onclick="history.back()"
                                    class="flex items-center justify-center w-full px-4 py-3 text-gray-900 rounded-md btn btn-info focus:outline-none">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>Cancelar
                                </a>
                                <a href="{{ route('activity.index') }}"
                                    class="flex items-center justify-center w-full px-4 py-3 text-white bg-blue-500 rounded-md focus:outline-none">Administrar
                                    actividades
                                    <svg class="w-12 h-12 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-container>

</x-app-layout>
