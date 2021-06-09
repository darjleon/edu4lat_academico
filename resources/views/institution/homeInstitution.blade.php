<x-app-layout>
    @can('Ver_institución')
        <div class="bg-white ">

            <div class="relative w-full overflow-hidden rounded shadow-2xl">
                <div class="relative w-full h-full overflow-hidden bg-blue-600 top">
                    <img src="https://images.unsplash.com/photo-1503264116251-35a269479413?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                        alt="" class="absolute z-0 object-cover object-center w-full h-full bg">
                    <div
                        class="relative flex flex-col items-center justify-center h-full p-4 text-white bg-black bg-opacity-50">
                        <img src="{{ asset('storage/institucion/' . $institucion->logo) }}"
                            class="object-cover w-24 h-24 rounded-full"
                            onerror="this.onerror=null; this.src='{{ asset('images/defecto.jpg') }}';">
                        <h1 class="text-2xl font-semibold">{{ $institucion->nombre }}</h1>
                        <h4 class="text-sm font-semibold">{{ $institucion->frase }}</h4>
                    </div>

                </div>
                @can('Editar_institución')
                    <div class="flex justify-end">
                        <a href="{{ route('institucion.edit', $institucion->id) }}">
                            <x-button-end class="text-white bg-blue-600 hover:bg-blue-700">
                                Editar información
                            </x-button-end>
                        </a>
                    </div>
                @endcan

                <div class="relative flex flex-col items-center justify-center h-full">

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
                                    {{ $institucion->nombre }}
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Eslogan
                                </p>
                                <p>
                                    {{ $institucion->frase ?? 'Sin contenido' }}
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Acerca de nosotros
                                </p>
                                <p>
                                    {{ $institucion->descripcion ?? 'Sin contenido' }}
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
                                    {{ $institucion->direccion ?? 'Sin contenido' }}
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Ciudad
                                </p>
                                <p>
                                    {{ $institucion->ciudad ?? ('Sin contenido' ?? 'Sin contenido') }}
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Provincia
                                </p>
                                <p>
                                    {{ $institucion->provincia ?? ('Sin contenido' ?? 'Sin contenido') }}
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Parroquia
                                </p>
                                <p>
                                    {{ $institucion->parroquia ?? ('Sin contenido' ?? 'Sin contenido') }}
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Indicaciones extra
                                </p>
                                <p>
                                    {{ $institucion->indicaciones_extra ?? ('Sin contenido' ?? 'Sin contenido') }}
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
                                    {{ $institucion->correo ?? 'Sin contenido' }}
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Número teléfonico
                                </p>
                                <p>
                                    {{ $institucion->telefono ?? 'Sin contenido' }}
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Teléfono móvil
                                </p>
                                <p>
                                    {{ $institucion->celular ?? 'Sin contenido' }}
                                </p>
                            </div>
                        </div>

                        @if ($institucion->web != null or $institucion->facebook != null or $institucion->instagram != null or $institucion->youtube != null or $institucion->twitter != null)
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
                                        @if ($institucion->web != null)
                                            <div class="flex items-center justify-between p-2 space-x-2 border-b-2 rounded">
                                                <div class="items-center space-x-2 truncate">
                                                    <a href="{{ $institucion->web }}" target="_blank"
                                                        class="text-blue-700">
                                                        <span style="font-size: 20px"><i
                                                                class="text-gray-800 fas fa-address-book"></i>
                                                        </span>
                                                        <span class="hover:underline">{{ $institucion->web }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($institucion->facebook != null)
                                            <div class="flex items-center justify-between p-2 space-x-2 border-b-2 rounded">
                                                <div class="items-center space-x-2 truncate">
                                                    <a href="{{ $institucion->facebook }}" target="_blank"
                                                        class="text-blue-700">
                                                        <span style="font-size: 20px"><i class="fab fa-facebook"></i>
                                                        </span>
                                                        <span class="hover:underline">{{ $institucion->facebook }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($institucion->instagram != null)
                                            <div class="flex items-center justify-between p-2 space-x-2 border-b-2 rounded">
                                                <div class="items-center space-x-2 truncate">
                                                    <a href="{{ $institucion->instagram }}" target="_blank"
                                                        class="text-blue-700">
                                                        <span style="font-size: 20px"><i
                                                                class="text-red-500 fab fa-instagram"></i>
                                                        </span>
                                                        <span
                                                            class="hover:underline">{{ $institucion->instagram }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($institucion->youtube != null)
                                            <div class="flex items-center justify-between p-2 space-x-2 border-b-2 rounded">
                                                <div class="items-center space-x-2 truncate">
                                                    <a href="{{ $institucion->youtube }}" target="_blank"
                                                        class="text-blue-700">
                                                        <span style="font-size: 20px"><i
                                                                class="text-red-700 fab fa-youtube"></i>
                                                        </span>
                                                        <span class="hover:underline">{{ $institucion->youtube }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($institucion->twitter != null)
                                            <div class="flex items-center justify-between p-2 space-x-2 border-b-2 rounded">
                                                <div class="items-center space-x-2 truncate">
                                                    <a href="{{ $institucion->twitter }}" target="_blank"
                                                        class="text-blue-700">
                                                        <span style="font-size: 20px"><i
                                                                class="text-blue-800 fab fa-twitter"></i>
                                                        </span>
                                                        <span class="hover:underline">{{ $institucion->twitter }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                </div>

            </div>
        </div>
    @endcan


</x-app-layout>
