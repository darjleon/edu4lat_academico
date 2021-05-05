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
                    class="absolute top-0 right-0 w-6 h-6 m-6 font-bold fill-current font-3xl">&times;
                </button>
                <form method="post" action={{ route('activity.store') }}>
                    @csrf
                    <input class="w-full px-6 py-3 text-xl font-bold border-b" name="nombre" id="nombre"
                        value="{{ $actividad }}" readonly>
                    <div class="flex-grow p-6 px-4 pt-3 pb-4 mb-2 bg-white">

                        <div>
                            {{ $slot }}
                        </div>
                        <div class="flex justify-end px-6 pt-3 border-t">
                            <button @click={show=false} type="button"
                                class="px-4 py-2 mr-1 text-gray-100 bg-gray-700 rounded">Cerrar</Button>
                            <button type="submit" class="px-4 py-2 text-gray-200 bg-blue-600 rounded">Guardar
                                actividad</Button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="fixed top-0 bottom-0 left-0 right-0 z-40 w-full h-full overflow-auto bg-black opacity-50"></div>
    </div>
</div>
