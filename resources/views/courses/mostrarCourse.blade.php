<x-app-layout>

    <div class="flex justify-end">
        @can('Editar_curso')
            <div class="flex flex-col flex-wrap">
                <a href="{{ route('course.edit', $curso->id) }}">
                    <x-button-end class="text-white bg-blue-600 hover:bg-blue-700">
                        Editar curso {{ $curso->nombre }}
                    </x-button-end>
                </a>
            </div>
        @endcan

        @can('Ver_libro')
            <div class="flex flex-col flex-wrap">
                <a href="{{ route('book.index', $curso->id) }}">
                    <x-button-end class="text-white bg-blue-600 hover:bg-blue-700">
                        Ver libros del curso
                    </x-button-end>
                </a>
            </div>
        @endcan
    </div>
</x-app-layout>
