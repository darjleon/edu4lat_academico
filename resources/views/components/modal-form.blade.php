<div x-data="{ show: false }">
    <div class="flex justify-center px-2 py-2 ">
        <button @click={show=true} type="button"
            class="w-full px-2 py-2 uppercase transition duration-200 border-2 border-gray-900 rounded-3xl hover:bg-gray-800 hover:text-white focus:outline-none">
            {{ $actividad }}
        </Button>
    </div>
    <div x-show="show" tabindex="0" class="fixed top-0 bottom-0 left-0 right-0 z-40 w-full h-full overflow-auto">
        <div @click.away="show = false" class="relative z-50 max-w-full p-3 mx-auto my-0" style="width: 600px;">
            <div class="flex flex-col overflow-hidden bg-white border rounded shadow-lg">
                <button @click={show=false}
                    class="absolute top-0 right-0 w-6 h-6 m-6 font-bold fill-current font-3xl">&times;</button>
                <div class="px-6 py-3 text-xl font-bold border-b">{{ $actividad }}</div>
                <div class="flex-grow p-6">
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
                        @csrf
                        <div class="container my-4">
                            {{ $slot }}
                        </div>
                    </form>
                </div>
                <div class="px-6 py-3 border-t">
                    <div class="flex justify-end">
                        <button @click={show=false} type="button"
                            class="px-4 py-2 mr-1 text-gray-100 bg-gray-700 rounded">Cerrar</Button>
                        <button type="button" class="px-4 py-2 text-gray-200 bg-blue-600 rounded">Guardar
                            actividad</Button>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed top-0 bottom-0 left-0 right-0 z-40 w-full h-full overflow-auto bg-black opacity-50"></div>
    </div>
</div>
