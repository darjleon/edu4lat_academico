<x-app-layout>
    <div class="bg-white ">

        <div class="relative w-full overflow-hidden rounded shadow-2xl">
            <form method="post" enctype="multipart/form-data"
                action={{ route('institucion.update', $institucion->id) }}>
                @csrf
                <div class="relative w-full h-full overflow-hidden bg-blue-600 top">
                    <img src="https://images.unsplash.com/photo-1503264116251-35a269479413?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                        alt="" class="absolute z-0 object-cover object-center w-full h-full bg">
                    <div
                        class="relative flex flex-col items-center justify-center h-full p-4 text-white bg-black bg-opacity-50">
                        <img src="{{ asset('storage/institucion/' . $institucion->logo) }}"
                            onerror="this.onerror=null; this.src='{{ asset('images/defecto.jpg') }}';"
                            class="object-cover w-24 h-24 rounded-full">
                        <div class="relative w-64 mt-4 mb-4 overflow-hidden">
                            <label
                                class="mb-1 text-xs font-semibold text-white uppercase md:text-sm text-light">Subir/Cambiar
                                logo</label>
                            <input class="text-sm " size="55" type="file" name="logo" id="logo" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="relative flex flex-col items-center justify-center h-full">
                    @if (!empty($errors->all()))
                        <div class="notification is-danger">
                            <div class="card-header">
                                <h3>Por favor, valida los siguientes errores:</h3>
                            </div>
                            <ul>
                                @foreach ($errors->all() as $mensaje)
                                    <li>
                                        <p style="color:red">{{ $mensaje }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="w-full max-w-4xl bg-white rounded-lg shadow-xl">
                        <div
                            class="items-center p-4 space-y-1 border-b-4 md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                            <h2 class="text-2xl font-semibold">
                                Información de la institución
                            </h2>
                        </div>
                        <div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Nombre de la institución
                                </p>
                                <p>
                                    <input type="text" value="{{ $institucion->nombre }}" name="nombre" id="nombre"
                                        placeholder="Escriba aquí"
                                        class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Eslogan
                                </p>
                                <p>
                                    <input type="text" value="{{ $institucion->frase }}" name="frase" id="frase"
                                        placeholder="Escriba aquí"
                                        class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Acerca de nosotros
                                </p>
                                <p>

                                    <textarea rows="5" name="descripcion" id="descripcion" placeholder="Escriba aquí"
                                        class="w-full text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-200 ">{{ $institucion->descripcion }}</textarea>
                                </p>
                            </div>
                        </div>
                        <div class="p-4 border-b-4">
                            <h2 class="text-2xl font-semibold">
                                Ubicación de la institución
                            </h2>
                        </div>
                        <div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Dirección
                                </p>
                                <p>
                                    <input type="text" value="{{ $institucion->direccion }}" name="direccion"
                                        id="direccion" placeholder="Escriba aquí"
                                        class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Ciudad
                                </p>
                                <p>
                                    <input type="text" value="{{ $institucion->ciudad }}" name="ciudad" id="ciudad"
                                        placeholder="Escriba aquí"
                                        class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Provincia
                                </p>
                                <p>
                                    <input type="text" value="{{ $institucion->provincia }}" name="provincia"
                                        id="provincia" placeholder="Escriba aquí"
                                        class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Parroquia
                                </p>
                                <p>
                                    <input type="text" value="{{ $institucion->parroquia }}" name="parroquia"
                                        id="parroquia" placeholder="Escriba aquí"
                                        class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Indicaciones extra
                                </p>
                                <p>
                                    <input type="text" value="{{ $institucion->indicaciones_extra }}"
                                        name="indicaciones_extra" id="indicaciones_extra" placeholder="Escriba aquí"
                                        class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                </p>
                            </div>
                        </div>
                        <div class="p-4 border-b-4">
                            <h2 class="text-2xl font-semibold">
                                Información de contacto
                            </h2>
                        </div>
                        <div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Correo de la institución
                                </p>
                                <p>
                                    <input type="text" value="{{ $institucion->correo }}" name="correo" id="correo"
                                        placeholder="Escriba aquí"
                                        class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Número teléfonico
                                </p>
                                <p>
                                    <input type="text" value="{{ $institucion->telefono }}" name="telefono"
                                        id="telefono" placeholder="Escriba aquí"
                                        class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Teléfono móvil
                                </p>
                                <p>
                                    <input type="text" value="{{ $institucion->celular }}" name="celular"
                                        id="celular" placeholder="Escriba aquí"
                                        class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                </p>
                            </div>
                        </div>
                        <div class="p-4 border-b-4">
                            <h2 class="text-2xl font-semibold">
                                Siguenos
                            </h2>
                        </div>
                        <div>
                            <div class="p-4 space-y-1 md:grid md:grid-cols-2 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Nuestras redes sociales
                                </p>
                                <div class="space-y-2">
                                    <div class="flex items-center justify-between p-2 space-x-2 border-b-2 rounded">
                                        <div class="items-center space-x-2 ">
                                            <span style="font-size: 20px"><i
                                                    class="text-gray-800 fas fa-address-book"></i>
                                            </span><span>Link de nuestro sitio web</span>
                                            <input type="url" value="{{ $institucion->web }}" name="web" id="web"
                                                placeholder="Escriba aquí"
                                                class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between p-2 space-x-2 border-b-2 rounded">
                                        <div class="items-center w-full space-x-2">
                                            <span style="font-size: 20px"><i class="text-blue-700 fab fa-facebook"></i>
                                            </span><span>Link de facebook</span>
                                            <input type="url" value="{{ $institucion->facebook }}" name="facebook"
                                                id="facebook" placeholder="Escriba aquí"
                                                class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between p-2 space-x-2 border-b-2 rounded">
                                        <div class="items-center w-full space-x-2">
                                            <span style="font-size: 20px"><i class="text-red-500 fab fa-instagram"></i>
                                            </span><span>Link de instagram</span>
                                            <input type="url" value="{{ $institucion->instagram }}" name="instagram"
                                                id="instagram" placeholder="Escriba aquí"
                                                class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between p-2 space-x-2 border-b-2 rounded">
                                        <div class="items-center w-full space-x-2">
                                            <span style="font-size: 20px"><i class="text-red-700 fab fa-youtube"></i>
                                            </span><span>Link de youtube</span>
                                            <input type="url" value="{{ $institucion->youtube }}" name="youtube"
                                                id="youtube" placeholder="Escriba aquí"
                                                class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between p-2 space-x-2 border-b-2 rounded">
                                        <div class="items-center w-full space-x-2">
                                            <span style="font-size: 20px"><i class="text-blue-800 fab fa-twitter"></i>
                                            </span><span>Link de twitter</span>
                                            <input type="url" value="{{ $institucion->twitter }}" name="twitter"
                                                id="twitter" placeholder="Escriba aquí"
                                                class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col-reverse md:justify-end md:flex-row">
                    <a href="#" onclick="history.back()">
                        <x-button-end class="text-black bg-gray-300 hover:bg-gray-400">
                            Cancelar
                        </x-button-end>
                    </a>
                    <button type="submit">
                        <x-button-end class="text-white bg-blue-600 hover:bg-blue-700">
                            Guardar cambios
                        </x-button-end>
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
