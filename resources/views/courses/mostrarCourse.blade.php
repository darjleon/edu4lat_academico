<x-app-layout>
    <x-header-title>

        <div class="flex justify-between">
            <a href="{{ route('course.edit', $curso->id) }}"
                class="flex items-center justify-center w-1/2 px-4 py-3 text-white transform bg-blue-400 rounded-md hover:bg-blue-600 focus:outline-none">
                Editar curso {{ $curso->nombre }}
            </a>
            <a href="{{ route('book.index', $curso->id) }}"
                class="flex items-center justify-center w-1/2 px-4 py-3 text-white transform bg-green-400 rounded-md hover:bg-green-600 focus:outline-none">
                Ver libros asignados al curso
            </a>
        </div>
    </x-header-title>
</x-app-layout>
