<x-app-layout>
    @can('Crear_prueba')
        <a href="{{ route('quiz.create', $libro_id) }}">
            <x-button-end class="text-white bg-blue-600 hover:bg-blue-700">
                Aqui crea tu prueba
            </x-button-end>
        </a>
    @endcan


    @can('Ver_prueba')
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
                                            Creado
                                        </th>
                                        @if (empty($libro_id))
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Libro
                                            </th>
                                        @endif
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Creador
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Titulo
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Area
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Nivel
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Estado
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Fecha
                                        </th>
                                        <th colspan="1" class="relative px-3 py-3">
                                            <span class="sr-only">Accion</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($pruebas as $prueba)
                                        <tr>
                                            <td class="px-5 py-4 whitespace-normal">
                                                <div class="text-sm text-gray-900">
                                                    {{ \Carbon\Carbon::parse($prueba->created_at)->diffForHumans() }}
                                                </div>
                                            </td>
                                            @if (empty($libro_id))
                                                <td class="px-3 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                                    {{ $prueba->libro_id }}
                                                </td>
                                            @endif
                                            <td class="px-3 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $usuario->name }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{ $usuario->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-3 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ $prueba->titulo }}
                                                </div>
                                            </td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                {{ $prueba->area }}
                                            </td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                {{ $prueba->nivel }}
                                            </td>
                                            @if ($prueba->estado == 'Pendiente')
                                                <td class="px-3 py-4 whitespace-nowrap">
                                                    <span
                                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-red-500 bg-yellow-200 rounded-full">
                                                        {{ $prueba->estado }}
                                                    </span>
                                                </td>
                                                <td class="px-3 py-4 whitespace-nowrap">
                                                    <span
                                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-red-500 bg-yellow-200 rounded-full">
                                                        {{ \Carbon\Carbon::parse($prueba->fecha)->toFormattedDateString() }}
                                                    </span>
                                                </td>
                                            @else
                                                <td class="px-3 py-4 whitespace-nowrap">
                                                    <span
                                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                        {{ $prueba->estado }}
                                                    </span>
                                                </td>
                                                <td class="px-3 py-4 whitespace-nowrap">
                                                    <span
                                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                        {{ \Carbon\Carbon::parse($prueba->fecha)->toFormattedDateString() }}
                                                    </span>
                                                </td>
                                            @endif

                                            <td class="px-4 py-2 text-center whitespace-nowrap">
                                                <div class="flex justify-center item-center">
                                                    @can('Ver_prueba')
                                                        <div class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <a href="{{ route('quiz.show', $prueba->id) }}"><svg
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
                                                    @can('Editar_prueba')
                                                        <div class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <a href="{{ route('quiz.edit', $prueba->id) }}"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg></a>
                                                        </div>
                                                    @endcan
                                                    @can('Eliminar_prueba')
                                                        <div class="w-6 mr-2 hover:scale-110">
                                                            <form class="prueba-eliminar"
                                                                action="{{ route('quiz.destroy', $prueba->id) }}"
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
                    </div>
                </div>
            </div><br>
            {{ $pruebas->links() }}
        </x-container>
    @endcan



    @if ($libro_id != null)
        <a href="#" onclick="history.back()">
            <x-button-end class="text-black bg-white hover:bg-gray-200">
                Volver a libros
            </x-button-end>
        </a>
    @endif

    @section('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            $(document).ready(function() {
                $('.prueba-eliminar').submit(function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Desea eliminar esta prueba?',
                        text: "No podra recuperarla, ni los resultados de la misma.",
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
