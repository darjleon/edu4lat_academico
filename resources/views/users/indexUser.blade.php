<x-app-layout>
    @can('Crear_usuario')
        <x-modal-basic action="{{ route('usuario.store') }}">
            <x-slot name="id">
                nuevo_usuario
            </x-slot>

            <x-slot name="boton">
                <div class="flex justify-end">
                    <a href="#">
                        <x-button-end class="text-white bg-blue-600 hover:bg-blue-700" @click="nuevo_usuario = true">
                            Agregar usuario
                        </x-button-end>
                    </a>
                </div>
            </x-slot>

            <x-slot name="titulo">
                Crea un nuevo usuario y asignale un rol
            </x-slot>
            <x-slot name="guardar">
                Crear
            </x-slot>

            <x-slot name="icono">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </x-slot>

            <div>
                <x-label for="name" :value="__('nombre')" />

                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contraseña')" />

                <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

                <x-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation"
                    required />
            </div>

            <div class="flex flex-col">
                <div class="input-group-prepend">
                    <label class="leading-loose input-group-text" for="rol">Roles:</label>
                </div>
                <select id="rol"
                    class="w-full py-2 text-gray-600 border border-gray-300 rounded-md form-multiselect focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                    name="rol">
                    <option value="{{ old('rol') }}">
                        Roles: {{ old('rol') }}
                    </option>
                    @foreach ($roles as $rol)
                        <option value="{{ $rol }}">
                            {{ $rol }}</option>
                    @endforeach
                </select>
            </div>
        </x-modal-basic>
    @endcan

    @can('Ver_usuario')
        <x-container>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full ">
                                <thead class="bg-gray-50">
                                    <tr>

                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Usuario
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Roles
                                        </th>
                                        <th colspan="1" class="relative px-3 py-3">
                                            <span class="sr-only">Accion</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td class="px-3 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="ml-4 text-sm">
                                                        <div class="font-medium text-gray-900 ">
                                                            {{ $usuario->name }}
                                                        </div>
                                                        <div class="text-gray-500 ">
                                                            {{ $usuario->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-3 py-4 text-sm text-gray-800 whitespace-nowrap">
                                                @if (empty($usuario->getRoleNames()->First()))
                                                    <span
                                                        class="inline-flex px-2 text-base font-semibold leading-5 text-red-500 bg-yellow-200 rounded-full">
                                                        Sin roles
                                                    </span>
                                                @else
                                                    {{ $usuario->getRoleNames() }}
                                                @endif
                                            </td>
                                            <td class="px-4 py-2 text-center whitespace-nowrap">
                                                <div class="flex justify-center item-center">
                                                    @can('Ver_usuario')
                                                        <div class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <a href="{{ route('usuario.show', $usuario->id) }}"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                </svg></a>
                                                        </div>
                                                    @endcan
                                                    @can('Editar_usuario')
                                                        <div class="w-6 mr-2 hover:scale-110">
                                                            <x-modal-basic
                                                                action="{{ route('usuario.update', $usuario->id) }}">
                                                                <x-slot name="id">
                                                                    editar_usuario
                                                                </x-slot>

                                                                <x-slot name="boton">
                                                                    <div
                                                                        class="w-6 transform hover:text-purple-500 hover:scale-110">
                                                                        <a href="#" @click="editar_usuario = true"><svg
                                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round" stroke-width="2"
                                                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                            </svg></a>
                                                                    </div>
                                                                </x-slot>

                                                                <x-slot name="titulo">
                                                                    Edición de usuario
                                                                </x-slot>
                                                                <x-slot name="icono">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                                                    </path>
                                                                </x-slot>
                                                                <div class="mt-4">
                                                                    <x-label for="name" :value="__('Name')" />

                                                                    <x-input id="name" class="block w-full mt-1" type="text"
                                                                        name="name" :value="$usuario->name" autofocus />
                                                                </div>

                                                                <!-- Email Address -->
                                                                <div class="mt-4">
                                                                    <x-label for="email" :value="__('Email')" />

                                                                    <x-input id="email" class="block w-full mt-1" type="email"
                                                                        name="email" :value="$usuario->email" />
                                                                </div>

                                                                <!-- Password -->
                                                                <div class="mt-4">
                                                                    <x-label for="password" :value="__('Password')" />

                                                                    <x-input id="password" class="block w-full mt-1"
                                                                        type="password" name="password"
                                                                        autocomplete="new-password" />
                                                                </div>

                                                                <!-- Confirm Password -->
                                                                <div class="mt-4">
                                                                    <x-label for="password_confirmation"
                                                                        :value="__('Confirm Password')" />

                                                                    <x-input id="password_confirmation"
                                                                        class="block w-full mt-1" type="password"
                                                                        name="password_confirmation" />
                                                                </div>

                                                                <div class="flex flex-col">
                                                                    <div class="input-group-prepend">
                                                                        <label class="leading-loose input-group-text"
                                                                            for="rol">Roles:</label>
                                                                    </div>
                                                                    <select id="rol"
                                                                        class="w-full py-2 text-gray-600 border border-gray-300 rounded-md form-multiselect focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                                        name="rol">
                                                                        <option
                                                                            value="{{ $usuario->getRoleNames()[0] ?? '' }}">
                                                                            Roles:
                                                                            {{ $usuario->getRoleNames()[0] ?? '' }}</option>
                                                                        @foreach ($roles as $rol)
                                                                            <option value="{{ $rol }}">
                                                                                {{ $rol }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                            </x-modal-basic>
                                                        </div>

                                                    @endcan
                                                    @can('Eliminar_usuario')
                                                        <div class="w-6 mr-2 hover:scale-110">
                                                            <form class="usuario-eliminar"
                                                                action="{{ route('usuario.destroy', $usuario->id) }}"
                                                                method="post">
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}">
                                                                <button type="submit">
                                                                    <div
                                                                        class="w-6 transform hover:text-purple-500 hover:scale-110">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                        </svg>
                                                                    </div>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @endcan

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {!! $usuarios->links() !!}
                    </div>
                </div>
            </div>
        </x-container>
    @endcan


    @section('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            $(document).ready(function() {
                $('.usuario-eliminar').submit(function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Está segur@ de eliminar el usuario ?',
                        text: "Recuerde que al eliminar el usuario también eliminará los datos que le pertenecen.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'si, Eliminar!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    })
                });
            });

        </script>
    @endsection
</x-app-layout>
