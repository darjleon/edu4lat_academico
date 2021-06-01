@php
use App\Models\Course;
$escojerCurso = Course::all();
@endphp
<x-app-layout>
    @can('Asignar_libro')
        <x-modal-basic action="{{ route('curso.libro.guardar', $libro->id) }}">
            <x-slot name="id">
                libro_asignar
            </x-slot>

            <x-slot name="boton">
                <div class="flex justify-end">
                    <a href="#">
                        <x-button-end class="text-white bg-blue-600 hover:bg-blue-700" @click="libro_asignar = true">
                            Asignar a un curso
                        </x-button-end>
                    </a>
                </div>
            </x-slot>

            <x-slot name="titulo">
                Escoje un curso y su encargado
            </x-slot>

            <div class="py-8 space-y-4 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7">
                <div class="flex flex-col">
                    <div class="input-group-prepend">
                        <label class="leading-loose input-group-text" for="curso">Curso:</label>
                    </div>
                    <select id="curso"
                        class="w-full py-2 text-gray-600 border border-gray-300 rounded-md form-multiselect focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                        name="curso" required>
                        <option value="{{ old('curso') }}">Curso:
                            {{ $escojerCurso->find(old('curso'))->nombre ?? '' }}</option>
                        @foreach ($escojerCurso as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col">
                    <div class="input-group-prepend">
                        <label class="leading-loose input-group-text" for="docente">Docente encargado:</label>
                    </div>
                    <select id="docente"
                        class="w-full py-2 text-gray-600 border border-gray-300 rounded-md form-multiselect focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                        name="docente">
                        <option value="{{ old('docente') }}">Docente:
                            {{ $docentes->find(old('docente'))->name ?? '' }}</option>
                        @foreach ($docentes as $docente)
                            <option value="{{ $docente->id }}">{{ $docente->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-modal-basic>
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
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                            Creado
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                            Curso
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                            Docente encargado
                                        </th>
                                        <th colspan="1" class="relative px-3 py-3">
                                            <span class="sr-only">Accion</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($cursos as $curso)
                                        <tr>
                                            <td class="px-5 py-4 text-center whitespace-normal">
                                                <div class="text-sm text-gray-900">
                                                    {{ \Carbon\Carbon::parse($curso->pivot->updated_at)->diffForHumans() }}
                                                </div>
                                            </td>
                                            <td class="px-3 py-4 text-center whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ $curso->nombre }}
                                                </div>
                                            </td>
                                            <td
                                                class="px-3 py-4 text-sm font-medium text-center text-gray-900 whitespace-nowrap">
                                                @if ($curso->pivot->docente_id == null)
                                                    <span
                                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-red-500 bg-yellow-200 rounded-full">
                                                        Sin encargado
                                                    </span>
                                                @else
                                                    {{ $docentes->where('id', $curso->pivot->docente_id)->first()->name ?? 'Sin encargado' }}
                                                @endif
                                            </td>
                                            <td class="px-4 py-2 text-center whitespace-nowrap">
                                                <div class="flex justify-center item-center">
                                                    @can('Asignar_libro')
                                                        <x-modal-basic
                                                            action="{{ route('curso.libro.guardar', $libro->id) }}">
                                                            <x-slot name="id">
                                                                editar_relacion
                                                            </x-slot>

                                                            <x-slot name="boton">
                                                                <div
                                                                    class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                                    <a href="#" @click="editar_relacion = true"><svg
                                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                        </svg></a>
                                                                </div>
                                                            </x-slot>

                                                            <x-slot name="titulo">
                                                                Cambia al docente encargado de este curso
                                                            </x-slot>

                                                            <div
                                                                class="py-8 space-y-4 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7">
                                                                <div class="flex flex-col">
                                                                    <div class="input-group-prepend">
                                                                        <label class="leading-loose input-group-text"
                                                                            for="curso">Curso:</label>
                                                                    </div>
                                                                    <select id="curso"
                                                                        class="w-full py-2 text-gray-600 border border-gray-300 rounded-md form-multiselect focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                                        name="curso" required>
                                                                        <option value="{{ $curso->id }}">Curso:
                                                                            {{ $curso->nombre }}</option>

                                                                    </select>
                                                                </div>
                                                                <div class="flex flex-col">
                                                                    <div class="input-group-prepend">
                                                                        <label class="leading-loose input-group-text"
                                                                            for="docente">Docente encargado:</label>
                                                                    </div>
                                                                    <select id="docente"
                                                                        class="w-full py-2 text-gray-600 border border-gray-300 rounded-md form-multiselect focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                                        name="docente">
                                                                        <option
                                                                            value="{{ $curso->pivot->docente_id ?? '' }}">
                                                                            Docente:
                                                                            {{ $docentes->where('id', $curso->pivot->docente_id)->first()->name ?? '' }}
                                                                        </option>
                                                                        @foreach ($docentes as $docente)
                                                                            <option value="{{ $docente->id }}">
                                                                                {{ $docente->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </x-modal-basic>
                                                    @endcan

                                                    @can('Asignar_libro')
                                                        <div class="w-6 mr-2 hover:scale-110">
                                                            <form class="libro-curso-eliminar"
                                                                action="{{ route('curso.libro.borrar', ['curso_id' => $curso->id, 'libro_id' => $libro->id]) }}"
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
        </x-container>
    @endcan
    <div class="flex justify-end">
        <a href="{{ route('book.index', $curso_id) }}">
            <x-button-end class="text-black bg-white hover:bg-gray-200">
                Volver
            </x-button-end>
        </a>
    </div>

    @section('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            $(document).ready(function() {
                $('.libro-curso-eliminar').submit(function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Desea eliminar esta relación?',
                        text: "Libro no se encontrará en el curso.",
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
