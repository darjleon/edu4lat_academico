@php
use App\Models\Course;
$curso = Course::find($curso_id);
@endphp

<x-app-layout>
    <x-header-title>
        <div class="flex justify-between">

            <a href="{{ route('book.create', $curso_id) }}"
                class="flex items-center justify-center w-1/2 px-4 py-3 text-white transform bg-blue-400 rounded-md hover:bg-blue-600 focus:outline-none">
                @if ($curso_id == null)
                    Aqui crea un libro
                @else
                    Crea un libro para el curso {{ $curso->nombre }}
                @endif

            </a>
            @if ($curso_id != null)
                <a href="{{ route('course.show', $curso_id) }}"
                    class="flex items-center justify-center w-1/2 px-4 py-3 text-white transform bg-red-400 rounded-md hover:bg-red-600 focus:outline-none">
                    Volver al curso {{ $curso->nombre }}
                </a>
            @endif
        </div>
    </x-header-title>

    <x-container>
        <section class="text-gray-700 body-font">
            <div class="flex flex-wrap text-left">
                @forelse ($libros as $libro)
                    <div class="px-8 py-6 lg:w-1/3 md:w-full">
                        <div class="p-6 bg-gray-200 rounded-md">
                            <h2 class="text-lg font-semibold text-gray-700 lg:text-2xl title-font"> Libro:
                                {{ $libro->titulo }}
                            </h2>
                            <div class="items-center justify-center w-full py-4 font-sans bg-blue-darker">
                                <div
                                    class="flex flex-row w-full max-w-lg overflow-hidden leading-normal bg-white rounded shadow-lg">
                                    <a href="{{ route('quiz.index', $libro->id) }}"
                                        class="flex-1 block p-4 border-b hover:bg-gray-400 focus:outline-none">
                                        <p class="mb-1 text-lg font-bold text-black">Pruebas</p>
                                        <img src="{{ asset('images/language.png') }}" alt="">
                                    </a>
                                    <a href="#" class="flex-1 block p-4 hover:bg-gray-400 focus:outline-none">
                                        <p class="mb-1 text-lg font-bold text-black">Actividades</p>
                                        <img src="{{ asset('images/social.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <p class="mb-4 text-base leading-relaxed"> {{ $libro->descripcion }}
                            </p>
                            <a href="{{ route('book.edit', $libro->id) }}"
                                class="inline-flex items-center font-semibold text-blue-700 md:mb-2 lg:mb-0 hover:text-blue-400 ">
                                Editar
                                <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="20" height="20" fill="currentColor">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <h2 class="m-8 text-lg font-semibold text-gray-700 lg:text-2xl title-font"> No hay libros creados o
                        asignados
                    </h2>

                @endforelse
    </x-container>
</x-app-layout>
