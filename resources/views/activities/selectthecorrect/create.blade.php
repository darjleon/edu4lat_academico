<x-app-layout>
    <x-header-title>
        Selecciona la Respuesta correcta
    </x-header-title>

    <x-container>
        <div class="w-full max-w-md mt-4">
            <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
                <h2 class="font-bold">Crear actividad</h2>
                <div class="container my-4">
                    <div class="form-group">
                        <label for="txt_init">Enunciado</label>
                        <textarea name="txt_init" id="txt_init"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escribe lo que irá antes del recuadro faltante"></textarea>
                    </div>
                    <div class="my-2 form-group">
                        <label>Palabra</label>
                        <div class="inline ml-2">
                            <input type="text" name="answer" placeholder="Escribe la palabra faltante"
                                class="px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txt_end">Enunciado</label>
                        <textarea name="txt_end" id="txt_end"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Escribe lo que irá después del recuadro faltante"></textarea>
                    </div>

                    <input type="submit" value="Crear"
                        class="px-4 py-2 my-4 font-bold text-white bg-blue-900 border-b-4 border-blue-800 rounded hover:bg-blue-900 hover:border-blue-600">
                </div>
            </form>
        </div>
    </x-container>
</x-app-layout>
