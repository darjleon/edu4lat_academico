<x-app-layout>

    <div class="flex justify-end">
        @can('Editar_curso')
            <a href="{{ route('course.edit', $curso->id) }}">
                <x-button-end class="text-white bg-blue-600 hover:bg-blue-700">
                    Editar curso {{ $curso->nombre }}
                </x-button-end>
            </a>
        @endcan

        @can('Ver_libro')
            <a href="{{ route('book.index', $curso->id) }}">
                <x-button-end class="text-white bg-blue-600 hover:bg-blue-700">
                    Ver libros del curso
                </x-button-end>
            </a>
        @endcan

    </div>
</x-app-layout>
