@php
use App\Models\Course;
use App\Models\User;

$curso = Course::find($curso_id);
$users = User::role('Docente')->get();
@endphp

<x-app-layout>
    {{ Breadcrumbs::render('Libros', $curso_id) }}

    @can('Crear_libro')
        <div class="flex justify-end">
            <a href="{{ route('book.create', $curso_id) }}">
                <x-button-end class="text-white bg-blue-600 hover:bg-blue-700">
                    @if ($curso_id == null)
                        Crear un libro
                    @else
                        Crear un libro para Curso: {{ $curso->nombre }}
                    @endif
                </x-button-end>
            </a>
        </div>
    @endcan

    @can('Ver_libro')
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
                                            Titulo
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Descripción
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Area
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Grado
                                        </th>
                                        @if ($curso_id != null)
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Encargado
                                            </th>
                                        @endif
                                        <th colspan="1" class="relative px-3 py-3">
                                            <span class="sr-only">Accion</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($libros as $libro)
                                        <tr>
                                            <td class="px-5 py-4 whitespace-normal">
                                                <div class="text-sm text-gray-900">
                                                    {{ \Carbon\Carbon::parse($libro->created_at)->diffForHumans() }}
                                                </div>
                                            </td>
                                            <td class="px-3 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ $libro->titulo }}
                                                </div>
                                            </td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                {{ $libro->descripcion }}
                                            </td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                {{ $libro->area }}
                                            </td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                {{ $libro->nivel }}
                                            </td>
                                            @if ($curso_id != null)
                                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                    @forelse ($users->where('id', $libro->pivot->docente_id) as $user)
                                                        @if ($user->id == $libro->pivot->docente_id)
                                                            {{ $user->name }}
                                                        @endif
                                                    @empty
                                                        Sin encargado
                                                    @endforelse
                                                </td>
                                            @endif
                                            <td class="px-4 py-2 text-center whitespace-nowrap">
                                                <div class="flex justify-center item-center">
                                                    @can('Ver_libro')
                                                        <div class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <a
                                                                href="{{ route('book.show', ['libro_id' => $libro->id, 'curso_id' => $curso_id]) }}"><svg
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
                                                    @can('Editar_libro')
                                                        <div class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <a
                                                                href="{{ route('book.edit', ['libro_id' => $libro->id, 'curso_id' => $curso_id]) }}"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg></a>
                                                        </div>
                                                    @endcan
                                                    @can('Eliminar_libro')
                                                        <div class="w-6 mr-2 hover:scale-110">
                                                            <form class="libro-eliminar"
                                                                action="{{ route('book.destroy', $libro->id) }}"
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
            </div>
        </x-container>
    @endcan
    {{-- <x-container>
        <section class="text-gray-700 body-font">
            <div class="flex flex-wrap text-left">
                @forelse ($libros as $libro)
                    <div class="px-8 py-6 lg:w-1/3 md:w-full">
                        <div class="p-6 bg-gray-200 rounded-md">
                            <a href="{{ route('book.show', ['libro_id' => $libro->id, 'curso_id' => $curso_id]) }}">
                                <h2 class="text-lg font-semibold text-gray-700 lg:text-2xl title-font">
                                    {{ $libro->titulo }}
                                </h2>
                            </a>
                            <div class="items-center justify-center w-full py-4 font-sans bg-blue-darker">
                                <div
                                    class="flex flex-row w-full max-w-lg overflow-hidden leading-normal bg-white rounded shadow-lg">
                                    @can('Ver_prueba')
                                        <a href="{{ route('quiz.index', $libro->id) }}"
                                            class="flex-1 block p-4 border-b hover:bg-gray-400 focus:outline-none">
                                            <p class="mb-1 text-lg font-bold text-black">Pruebas</p>
                                            <img src="{{ asset('images/language.png') }}" alt="">
                                        </a>
                                    @endcan
                                    @can('Ver_actividad')
                                        <a href="#" class="flex-1 block p-4 hover:bg-gray-400 focus:outline-none">
                                            <p class="mb-1 text-lg font-bold text-black">Actividades</p>
                                            <img src="{{ asset('images/social.png') }}" alt="">
                                        </a>
                                    @endcan
                                </div>
                            </div>
                            <p class="mb-4 text-base leading-relaxed"> {{ $libro->descripcion }}
                            </p>
                            @can('Editar_libro')
                                <a href="{{ route('book.edit', ['libro_id' => $libro->id, 'curso_id' => $curso_id]) }}"
                                    class="inline-flex items-center font-semibold text-blue-700 md:mb-2 lg:mb-0 hover:text-blue-400 ">
                                    Editar
                                    <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        width="20" height="20" fill="currentColor">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" />
                                    </svg>
                                </a>
                            @endcan

                        </div>
                    </div>
                @empty
                    <h2 class="m-8 text-lg font-semibold text-gray-700 lg:text-2xl title-font"> No hay libros creados o
                        asignados
                    </h2>

                @endforelse
    </x-container> --}}

    @if ($curso_id != null)
        <div class="flex justify-end">
            <a href="{{ route('course.show', $curso_id) }}">
                <x-button-end class="text-black bg-white hover:bg-gray-200">
                    Volver al curso {{ $curso->nombre }}
                </x-button-end>
            </a>
        </div>
    @else
        <x-container>
            {!! $libros->links() !!}
        </x-container>
    @endif
    @section('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            $(document).ready(function() {
                $('.libro-eliminar').submit(function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Desea eliminar este libro?',
                        text: "Se eliminará toda la información relacionda al libro",
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
