<x-app-layout>
    <x-header-title>
        Verdadero o Falso
    </x-header-title>

    <x-container>
        <div class="w-full max-w-md mt-4">
            <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
                <h2 class="font-bold">Crear actividad</h2>
                <div class="container my-4">
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea name="description" id="description"
                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                            placeholder="Ingrese una descripción"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="options">La respuesta es: </label>
                        <div class="inline ml-2">
                            <input type="radio" name="answer" id="options" class="w-5 h-5 text-green-500 form-radio"
                                value="true" checked>
                            <span class="ml-2">Verdadera</span>
                            <input type="radio" name="answer" id="options" class="w-5 h-5 ml-4 text-red-500 form-radio"
                                value="false">
                            <span class="ml-2">Falsa</span>
                        </div>
                    </div>
                    <input type="submit" value="Crear"
                        class="px-4 py-2 my-4 font-bold text-white bg-blue-900 border-b-4 border-blue-800 rounded hover:bg-blue-900 hover:border-blue-600">
                </div>
            </form>
        </div>
    </x-container>
</x-app-layout>
