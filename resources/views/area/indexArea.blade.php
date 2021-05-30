<x-app-layout>
    @can('Crear_area')
        <x-modal-basic action="{{ route('area.store') }}">
            <x-slot name="id">
                nueva_area
            </x-slot>

            <x-slot name="boton">
                <a href="#">
                    <x-button-end class="text-white bg-blue-600 hover:bg-blue-700" @click="nueva_area = true">
                        Agregar área
                    </x-button-end>
                </a>
            </x-slot>

            <x-slot name="titulo">
                Crea una nueva área para pruebas y actividades
            </x-slot>

            <div class="py-8 space-y-4 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7">
                <div class="flex flex-col">
                    <label class="leading-loose" for="nombre">Nombre del area</label>
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"
                        class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                        placeholder="Nombre del area" required>
                </div>
                <div class="flex flex-col">
                    <label class="leading-loose" for="descripcion">Descripcion</label>
                    <textarea id="descripcion" name="descripcion"
                        class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                        placeholder="Opcional">{{ old('descripcion') }}</textarea>
                </div>
            </div>
        </x-modal-basic>
    @endcan

    @can('Ver_area')
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
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Nombre del área
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
                                    @foreach ($areas as $area)
                                        <tr>
                                            <td class="px-5 py-4 whitespace-normal">
                                                <div class="text-sm text-gray-900">
                                                    {{ \Carbon\Carbon::parse($area->created_at)->diffForHumans() }}
                                                </div>
                                            </td>
                                            <td class="px-3 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ $area->nombre }}
                                                </div>
                                            </td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                {{ $area->descripcion }}
                                            </td>
                                            <td class="px-4 py-2 text-center whitespace-nowrap">
                                                <div class="flex justify-center item-center">
                                                    @can('Editar_area')
                                                        <x-modal-basic action="{{ route('area.update', $area->id) }}">
                                                            <x-slot name="id">
                                                                editar_area
                                                            </x-slot>

                                                            <x-slot name="boton">
                                                                <div
                                                                    class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                                    <a href="#" @click="editar_area = true"><svg
                                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                        </svg></a>
                                                                </div>
                                                            </x-slot>

                                                            <x-slot name="titulo">
                                                                Edita el área seleccionada
                                                            </x-slot>

                                                            <div
                                                                class="py-8 space-y-4 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7">
                                                                <div class="flex flex-col">
                                                                    <label class="leading-loose" for="nombre">Nombre del
                                                                        area</label>
                                                                    <input type="text" id="nombre" name="nombre"
                                                                        value="{{ $area->nombre }}"
                                                                        class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                                                        placeholder="Nombre del curso" required>
                                                                </div>
                                                                <div class="flex flex-col">
                                                                    <label class="leading-loose"
                                                                        for="descripcion">Descripcion</label>
                                                                    <textarea id="descripcion" name="descripcion"
                                                                        class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                                                        placeholder="Opcional">{{ $area->descripcion }}</textarea>
                                                                </div>
                                                            </div>
                                                        </x-modal-basic>

                                                    @endcan
                                                    @can('Eliminar_area')
                                                        <div class="w-6 mr-2 hover:scale-110">
                                                            <form class="area-eliminar"
                                                                action="{{ route('area.destroy', $area->id) }}" method="post">
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
            {{ $areas->links() }}
        </x-container>
    @endcan


    @section('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            $(document).ready(function() {
                $('.area-eliminar').submit(function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Desea eliminar esta área?',
                        text: "No se tendrá esta area como opción para libros, pruebas y actividades.",
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
