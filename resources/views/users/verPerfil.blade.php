<x-app-layout>
    @can('Ver_usuario')
        <div class="bg-white ">

            <div class="relative w-full overflow-hidden rounded ">
                <div class="relative w-full h-full overflow-hidden bg-blue-600 top">
                    <img src="https://images.unsplash.com/photo-1503264116251-35a269479413?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                        alt="" class="absolute object-center w-full h-full ">
                    <div
                        class="relative flex flex-col items-center justify-center h-full p-4 text-white bg-black bg-opacity-50">
                        <img src="" class="object-cover w-24 h-24 rounded-full"
                            onerror="this.onerror=null; this.src='{{ asset('images/defecto.jpg') }}';">
                        <h1 class="text-2xl font-semibold">{{ $user_ver->name }}</h1>
                        <h4 class="text-sm font-semibold">{{ $user_ver->getRoleNames()->First() }}</h4>
                    </div>
                </div>

                @if ($editar)
                    <div class="flex justify-end">
                        <a href="#">
                            <x-button-end class="text-white bg-blue-600 hover:bg-blue-700">
                                Editar perfil
                            </x-button-end>
                        </a>
                    </div>
                @endif

                <div class="relative flex flex-col items-center justify-center ">
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
                                    {{ $user_ver->name }}
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Correo:
                                </p>
                                <p>
                                    {{ $user_ver->email }}
                                </p>
                            </div>
                            <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                                <p class="font-semibold text-gray-600">
                                    Rol:
                                </p>
                                <p>
                                    {{ $user_ver->getRoleNames()->First() }}
                                </p>
                            </div>
                        </div>
                        <div class="p-4 border-b-4">
                            <h2 class="text-2xl font-semibold">
                                @if ($user_ver->hasRole('Estudiante'))
                                    Cursos asignados:
                                @elseif ($user_ver->hasRole('Docente'))
                                    Libros asignados:
                                @elseif ($user_ver->hasRole('Coordinador'))
                                    Encargado de los cursos:
                                @elseif ($user_ver->hasRole('Administrador'))
                                    todo:
                                @endif
                            </h2>
                        </div>
                        <div class="flex flex-col ">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                        <table class="min-w-full ">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    @if ($user_ver->hasRole('Docente'))
                                                        <th scope="col"
                                                            class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                            Libro
                                                        </th>
                                                    @endif
                                                    <th scope="col"
                                                        class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Curso
                                                    </th>
                                                    <th scope="col"
                                                        class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Descripción
                                                    </th>
                                                    <th colspan="1" class="relative px-3 py-3">
                                                        <span class="sr-only">Accion</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach ($cursos as $curso)
                                                    <tr>
                                                        @if ($user_ver->hasRole('Docente'))
                                                            <td class="px-3 py-4 whitespace-nowrap">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $libros->where('id', $curso->libro_id)->First()->titulo }}
                                                                </div>
                                                            </td>
                                                        @endif
                                                        <td class="px-3 py-4 whitespace-nowrap">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $curso->nombre }}
                                                            </div>
                                                        </td>
                                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                            {{ $curso->descripcion }}
                                                        </td>
                                                        <td class="px-4 py-2 text-center whitespace-nowrap">
                                                            <div class="flex justify-center item-center">
                                                                @can('Ver_curso')
                                                                    <div
                                                                        class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                                        <a href=" {{ route('course.show', $curso->id) }}"><svg
                                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round" stroke-width="2"
                                                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round" stroke-width="2"
                                                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                            </svg></a>
                                                                    </div>
                                                                @endcan
                                                                @can('Editar_curso')
                                                                    <div
                                                                        class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                                        <a href="{{ route('course.edit', $curso->id) }}"><svg
                                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round" stroke-width="2"
                                                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                            </svg></a>
                                                                    </div>
                                                                @endcan
                                                                @can('Eliminar_curso')
                                                                    <div class="w-6 mr-2 hover:scale-110">
                                                                        <form class="curso-eliminar"
                                                                            action="{{ route('course.destroy', $curso->id) }}"
                                                                            method="post">
                                                                            <input name="_method" type="hidden" value="DELETE">
                                                                            <input type="hidden" name="_token"
                                                                                value="{{ csrf_token() }}">
                                                                            <button type="submit">
                                                                                <div
                                                                                    class="w-6 transform hover:text-purple-500 hover:scale-110">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none" viewBox="0 0 24 24"
                                                                                        stroke="currentColor">
                                                                                        <path stroke-linecap="round"
                                                                                            stroke-linejoin="round"
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-full py-4 bg-white">

        </div>
    @endcan
    @section('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            $(document).ready(function() {
                $('.curso-eliminar').submit(function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Desea eliminar este curso?',
                        text: "Se eliminará toda la información relacionda al curso",
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
