<x-app-layout>
    <x-header-title>
        Actividades
    </x-header-title>

    <x-container>
        <div class="container">
            <div class="items-center justify-center w-full py-8 font-sans bg-blue-darker">
                <div class="flex flex-row w-full max-w-lg overflow-hidden leading-normal bg-white rounded shadow-lg">
                    <a href="{{ route('act_true_or_false') }}"
                        class="flex-1 block p-4 border-b hover:bg-gray-200 focus:outline-none">
                        <p class="mb-1 text-lg font-bold text-black">Verdadero y falso</p>

                    </a>
                    <a href="{{ route('act_complete') }}"
                        class="flex-1 block p-4 hover:bg-gray-200 focus:outline-none">
                        <p class="mb-1 text-lg font-bold text-black">Completa la palabra</p>

                    </a>
                    <a href="#" class="flex-1 block p-4 border-b hover:bg-gray-200 focus:outline-none">
                        <p class="mb-1 text-lg font-bold text-black">Selecciona la respuesta correcta</p>

                    </a>
                    <a href="#" class="flex-1 block p-4 hover:bg-gray-200 focus:outline-none">
                        <p class="mb-1 text-lg font-bold text-black">Ingresa tu respuesta</p>

                    </a>
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>