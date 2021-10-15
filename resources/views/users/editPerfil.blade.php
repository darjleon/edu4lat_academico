<x-app-layout>
    <div class="h-screen bg-white">

        <div class="relative w-full overflow-hidden rounded ">
            <form method="post" enctype="multipart/form-data"
                action={{ route('usuario.perfilActualizar', $user_edit->id) }}>
                @csrf
                <div class="relative w-full h-full overflow-hidden bg-blue-600 top">
                    <img src="https://images.unsplash.com/photo-1503264116251-35a269479413?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                        alt="" class="absolute object-center w-full h-full ">
                    <div
                        class="relative flex flex-col items-center justify-center h-full p-4 text-white bg-black bg-opacity-50">
                        <img src="{{ asset('storage/userPerfilFoto/' . $user_edit->foto) }}"
                            class="object-cover w-24 h-24 rounded-full"
                            onerror="this.onerror=null; this.src='{{ asset('images/defecto.jpg') }}';">
                        <div class="relative w-64 mt-4 mb-4 overflow-hidden">
                            <label for="foto"
                                class="mb-1 text-xs font-semibold text-white uppercase md:text-sm text-light">Cambiar
                                Foto de perfil</label>
                            <input class="text-sm " size="55" type="file" name="foto" id="foto" accept="image/*">
                        </div>
                    </div>
                </div>

                <div class="relative flex flex-col items-center justify-center ">
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
                    <div class="w-full h-full max-w-4xl bg-white rounded-lg shadow-xl">
                        <div
                            class="items-center p-4 space-y-1 border-b-4 md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                            <h2 class="text-2xl font-semibold">
                                Información de la básica
                            </h2>
                        </div>
                        <div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Nombre:
                                </p>
                                <p>
                                    <input type="text" value="{{ $user_edit->name }}" name="name" id="name"
                                        placeholder="Escriba aquí" required
                                        class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Correo:
                                </p>
                                <p>
                                    <input type="email" value="{{ $user_edit->email }}" name="email" id="email"
                                        placeholder="Escriba aquí" required
                                        class="w-full px-2 py-1 mr-2 text-black rounded shadow appearance-none text-opacity-60 focus:outline-none focus:shadow-outline focus:border-blue-400">
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Rol:
                                </p>
                                <p>
                                    {{ $user_edit->getRoleNames()->First() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col-reverse md:justify-end md:flex-row">
                    <a href="{{ route('usuario.show', $user_edit->id) }}">
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
