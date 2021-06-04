<x-app-layout>
    @can('Asignar_estudiante')
        <x-modal-basic action="{{ route('student.store') }}">
            <x-slot name="id">
                estudiante_asignar
            </x-slot>

            <x-slot name="boton">
                <div class="flex justify-end">
                    <a href="#">
                        <x-button-end class="text-white bg-blue-600 hover:bg-blue-700" @click="estudiante_asignar = true">
                            Asignar un estudiante a un curso
                        </x-button-end>
                    </a>
                </div>
            </x-slot>

            <x-slot name="titulo">
                Inscribe un estudiante a un curso.
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
                            {{ $cursos->find(old('curso'))->nombre ?? '' }}</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col">
                    <div class="input-group-prepend">
                        <label class="leading-loose input-group-text" for="estudiante">Estudiante:</label>
                    </div>
                    <select id="estudiante"
                        class="w-full py-2 text-gray-600 border border-gray-300 rounded-md form-multiselect focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                        name="estudiante" required>
                        <option value="{{ old('estudiante') }}">Estudiante:
                            {{ $estudiantes->find(old('estudiante'))->name ?? '' }}</option>
                        @foreach ($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}">{{ $estudiante->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-modal-basic>

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
                                            Estudiante
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                            Cursos
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                            Registro
                                        </th>
                                        <th colspan="1" class="relative px-3 py-3">
                                            <span class="sr-only">Accion</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($estudiantes as $estudiante)
                                        <tr>
                                            <td class="px-3 py-4 text-center align-top whitespace-nowrap ">
                                                <div class="flex flex-col justify-center item-center">
                                                    <div
                                                        class="pr-4 font-mono text-base font-bold tracking-widest text-gray-900">
                                                        {{ $estudiante->name }}
                                                    </div>
                                                    @can('Asignar_estudiante')
                                                        <x-modal-basic action="{{ route('student.store') }}">
                                                            <x-slot name="id">
                                                                editar_relacion_est
                                                            </x-slot>

                                                            <x-slot name="boton">
                                                                <div
                                                                    class="text-green-600 transform hover:text-purple-500 hover:scale-110">
                                                                    <a href="#" class="flex justify-center item-center"
                                                                        @click="editar_relacion_est = true"><span
                                                                            class="text-base font-bold">Inscribir</span><svg
                                                                            class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                        </svg></a>
                                                                </div>
                                                            </x-slot>

                                                            <x-slot name="titulo">
                                                                Registra al estudiante en un curso
                                                            </x-slot>

                                                            <div
                                                                class="py-8 space-y-4 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7">
                                                                <div class="flex flex-col">
                                                                    <div class="input-group-prepend">
                                                                        <label class="leading-loose input-group-text"
                                                                            for="estudiante">Estudiante: </label>
                                                                    </div>
                                                                    <select id="estudiante"
                                                                        class="w-full py-2 text-base text-gray-600 border border-gray-300 rounded-md form-multiselect focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                                        name="estudiante" required>
                                                                        <option value="{{ $estudiante->id }}">Estudiante:
                                                                            {{ $estudiante->name }}
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="flex flex-col">
                                                                    <div class="input-group-prepend">
                                                                        <label class="leading-loose input-group-text"
                                                                            for="curso">Curso:</label>
                                                                    </div>
                                                                    <select id="curso"
                                                                        class="w-full py-2 text-base text-gray-600 border border-gray-300 rounded-md form-multiselect focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                                                        name="curso" required>
                                                                        <option value="{{ old('curso') }}">Curso:
                                                                            {{ $cursos->find(old('curso'))->nombre ?? '' }}
                                                                        </option>
                                                                        @foreach ($cursos as $curso)
                                                                            <option value="{{ $curso->id }}">
                                                                                {{ $curso->nombre }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </x-modal-basic>
                                                    @endcan
                                                </div>
                                            </td>

                                            <td
                                                class="px-3 py-4 text-sm font-medium tracking-wider text-center text-gray-900 whitespace-nowrap">
                                                @forelse ( $estudiante->cursos as $curso )
                                                    <span
                                                        class="inline-flex px-3 py-1 my-1 text-sm font-semibold leading-5 bg-green-200 rounded-full">
                                                        {{ $curso->nombre }}
                                                    </span>
                                                    <br>
                                                @empty
                                                    <span
                                                        class="inline-flex px-3 py-1 font-semibold leading-5 text-red-500 bg-yellow-200 rounded-full">
                                                        Sin cursos
                                                    </span>
                                                @endforelse
                                            </td>
                                            <td
                                                class="px-3 py-4 text-sm font-medium text-center text-gray-900 whitespace-nowrap">
                                                @forelse ( $estudiante->cursos as $curso )
                                                    <span
                                                        class="inline-flex px-3 py-1 my-1 text-sm font-semibold leading-5 bg-green-200 rounded-full">
                                                        {{ \Carbon\Carbon::parse($curso->pivot->updated_at)->diffForHumans() }}
                                                    </span>
                                                    <br>
                                                @empty
                                                    <span
                                                        class="inline-flex px-3 py-1 font-semibold leading-5 bg-yellow-200 rounded-full">
                                                        -------
                                                    </span>
                                                @endforelse
                                            </td>
                                            <td class="px-4 py-2 text-center whitespace-nowrap">
                                                @forelse ( $estudiante->cursos as $curso )
                                                    <div class="inline-flex my-1 text-sm font-semibold leading-5">
                                                        @can('Asignar_estudiante')
                                                            <div class=" hover:scale-110">
                                                                <form class="usuario-curso-eliminar"
                                                                    action="{{ route('student.destroy', $curso->pivot->id) }}"
                                                                    method="post">
                                                                    <input name="_method" type="hidden" value="DELETE">
                                                                    <input type="hidden" name="_token"
                                                                        value="{{ csrf_token() }}">
                                                                    <button type="submit">
                                                                        <div
                                                                            class="transform hover:text-purple-500 hover:scale-110">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                class="w-6 h-6" viewBox="0 0 24 24"
                                                                                stroke="currentColor">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round" stroke-width="2"
                                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                            </svg>
                                                                        </div>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        @endcan
                                                    </div>
                                                    <br>
                                                @empty
                                                    <span class="inline-flex px-3 py-1 font-semibold">
                                                        -------
                                                    </span>
                                                @endforelse

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {!! $estudiantes->links() !!}
                    </div>
                </div>
            </div><br>
        </x-container>
    @endcan

    @section('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            $(document).ready(function() {
                $('.usuario-curso-eliminar').submit(function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Desea eliminar estas relacion?',
                        text: "El estudiante ya no será del curso.",
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
