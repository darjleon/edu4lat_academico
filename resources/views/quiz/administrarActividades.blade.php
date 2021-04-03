<x-app-layout>

    <x-header-title>
        <p
            class="flex items-center justify-center w-1/2 px-4 py-3 text-white bg-green-500 rounded-md focus:outline-none">
            Escoje las actividades que tendra la prueba</p>
    </x-header-title>

    <x-container>
        <div class="grid content-start justify-center grid-flow-row grid-cols-3 gap-4 ">

            <div class="w-full max-w-md m-4">
                <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
                    @csrf
                    <h2 class="font-bold">Escojer la opción correcta</h2>
                    <div class="container my-4">
                        <div class="form-group">
                            <label for="description">Enunciado</label>
                            <textarea name="description" id="description"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba aquí"></textarea>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="respuesta">La opción correcta: </label>
                                <input type="text" name="respuesta" id="respuesta"
                                    class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                    placeholder="Escriba la respuesta (opcion 0)"></input>
                            </div>
                            <div>
                                <label for="opciones">Las opciones: </label>

                                <input type="text" name="options1" id="options1"
                                    class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                    placeholder="Escriba la options 1"></input>
                                <input type="text" name="options2" id="options2"
                                    class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                    placeholder="Escriba la options 2"></input>
                                <input type="text" name="options3" id="options3"
                                    class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                    placeholder="Escriba la options 3"></input>
                            </div>
                        </div>
                        <input type="submit" value="Crear"
                            class="px-4 py-2 my-4 font-bold text-white bg-blue-900 border-b-4 border-blue-800 rounded hover:bg-blue-900 hover:border-blue-600">
                    </div>
                </form>
            </div>



            <div class="w-full max-w-md m-4">
                <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
                    @csrf
                    <h2 class="font-bold">Escojer las opciones correctas</h2>
                    <div class="container my-4">
                        <div class="form-group">
                            <label for="description">Enunciado</label>
                            <textarea name="description" id="description"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba aquí"></textarea>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="respuesta">Las opciones correctas: </label>

                                <input type="text" name="respuesta1" id="respuesta1"
                                    class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                    placeholder="Escriba la respuesta"></input>
                                <input type="text" name="respuesta2" id="respuesta2"
                                    class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                    placeholder="Escriba la respuesta"></input>
                                <input type="text" name="respuesta3" id="respuesta3"
                                    class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                    placeholder="Escriba la respuesta"></input>
                            </div>
                            <div>
                                <label for="opciones">Las opciones: </label>

                                <input type="text" name="options1" id="options1"
                                    class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                    placeholder="Escriba la options 1"></input>
                                <input type="text" name="options2" id="options2"
                                    class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                    placeholder="Escriba la options 2"></input>
                                <input type="text" name="options3" id="options3"
                                    class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                    placeholder="Escriba la options 3"></input>
                            </div>
                        </div>
                        <input type="submit" value="Crear"
                            class="px-4 py-2 my-4 font-bold text-white bg-blue-900 border-b-4 border-blue-800 rounded hover:bg-blue-900 hover:border-blue-600">
                    </div>
                </form>
            </div>



            <div class="w-full max-w-md m-4">
                <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
                    @csrf
                    <h2 class="font-bold">Relacionar las palabras</h2>
                    <div class="container my-4">
                        <div class="form-group">
                            <label for="description">Enunciado</label>
                            <textarea name="description" id="description"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba aquí"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="relacion1">La relación 1: </label>
                            <input type="text" name="relacion1" id="relacion1"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba A-A"></input>
                            <input type="text" name="respuesta1" id="respuesta1"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba A-A"></input>

                            <label for="relacion2">La relación 2: </label>
                            <input type="text" name="relacion2" id="relacion2"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba B-B"></input>
                            <input type="text" name="respuesta2" id="respuesta2"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba B-B"></input>

                            <label for="relacion3">La relación 3: </label>
                            <input type="text" name="relacion3" id="relacion3"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba C-C"></input>
                            <input type="text" name="respuesta3" id="respuesta3"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba C-C"></input>

                            <label for="relacion4">La relación 4: </label>
                            <input type="text" name="relacion4" id="relacion4"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba D-D"></input>
                            <input type="text" name="respuesta4" id="respuesta4"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba D-D"></input>
                        </div>
                        <input type="submit" value="Crear"
                            class="px-4 py-2 my-4 font-bold text-white bg-blue-900 border-b-4 border-blue-800 rounded hover:bg-blue-900 hover:border-blue-600">
                    </div>
                </form>
            </div>



            <div class="w-full max-w-md m-4">
                <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
                    @csrf
                    <h2 class="font-bold">Verdadero y falso</h2>
                    <div class="container my-4">
                        <div class="form-group">
                            <label for="description">Enunciado</label>
                            <textarea name="description" id="description"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba aquí"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="options">La respuesta será: </label><br>
                            <div class="inline ml-2">
                                <input type="radio" name="answer" id="options" class="w-5 h-5 text-green-500 form-radio"
                                    value="true" checked>
                                <span class="ml-2">Verdadera</span>
                                <input type="radio" name="answer" id="options"
                                    class="w-5 h-5 ml-4 text-red-500 form-radio" value="false">
                                <span class="ml-2">Falsa</span>
                            </div>
                        </div>
                        <input type="submit" value="Crear"
                            class="px-4 py-2 my-4 font-bold text-white bg-blue-900 border-b-4 border-blue-800 rounded hover:bg-blue-900 hover:border-blue-600">
                    </div>
                </form>
            </div>



            <div class="w-full max-w-md m-4">
                <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
                    @csrf
                    <h2 class="font-bold">Responder pregunta</h2>
                    <div class="container my-4">
                        <div class="form-group">
                            <label for="description">Enunciado/Pregunta</label>
                            <textarea name="description" id="description"
                                class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                placeholder="Escriba aquí"></textarea>
                        </div>
                        <input type="submit" value="Crear"
                            class="px-4 py-2 my-4 font-bold text-white bg-blue-900 border-b-4 border-blue-800 rounded hover:bg-blue-900 hover:border-blue-600">
                    </div>
                </form>
            </div>

        </div>
    </x-container>

</x-app-layout>
