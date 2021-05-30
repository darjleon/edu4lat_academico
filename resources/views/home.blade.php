@php
use App\Models\Course;
@endphp
<x-app-layout>

    <x-dropdown>
        <x-slot name="align">
            top
        </x-slot>
        <x-slot name="trigger">
            <x-header-title>
                Áreas
                @role('Estudiante')
                Bienvenido Estudiante
                @endrole
                @role('Docente')
                Bienvenido Docente
                @endrole
                @role('Coordinador')
                Bienvenido Coordinador
                @endrole
                @role('Administrador')
                Bienvenido Admin
                @endrole
            </x-header-title>
        </x-slot>
        <x-slot name="content">
            Te la creiste wey
        </x-slot>
    </x-dropdown>




    <x-container>
        <div class="container">
            <div class="items-center justify-center w-full py-8 font-sans bg-blue-darker">
                <div class="flex flex-row w-full max-w-lg overflow-hidden leading-normal bg-white rounded shadow-lg">
                    <a href="#" class="flex-1 block p-4 border-b hover:bg-gray-200 focus:outline-none">
                        <p class="mb-1 text-lg font-bold text-black">Lengua y Literatura</p>
                        <img src="{{ asset('images/language.png') }}" alt="">
                    </a>
                    <a href="#" class="flex-1 block p-4 hover:bg-gray-200 focus:outline-none">
                        <p class="mb-1 text-lg font-bold text-black">Matemáticas</p>
                        <img src="{{ asset('images/math.png') }}" alt="">
                    </a>
                    <a href="#" class="flex-1 block p-4 border-b hover:bg-gray-200 focus:outline-none">
                        <p class="mb-1 text-lg font-bold text-black">Ciencias Naturales</p>
                        <img src="{{ asset('images/science.png') }}" alt="">
                    </a>
                    <a href="#" class="flex-1 block p-4 hover:bg-gray-200 focus:outline-none">
                        <p class="mb-1 text-lg font-bold text-black">Ciencias Sociales</p>
                        <img src="{{ asset('images/social.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </x-container>


    <section class="text-gray-700 body-font">
        <div class="flex flex-wrap text-left">
            @can('Ver_curso')
                @foreach (Course::all() as $curso)
                    <div class="px-8 py-6 lg:w-1/3 md:w-full">
                        <div class="p-6 bg-gray-200 rounded-md">
                            <h2 class="text-lg font-semibold text-gray-700 lg:text-2xl title-font">
                                {{ $curso->nombre }}
                            </h2>
                            <div class="items-center justify-center w-full py-4 font-sans bg-blue-darker">
                                <div
                                    class="flex flex-row w-full max-w-lg overflow-hidden leading-normal bg-white rounded shadow-lg">
                                    @can('Ver_libro')
                                        <a href="{{ route('book.index', $curso->id) }}"
                                            class="flex-1 block p-4 border-b hover:bg-gray-400 focus:outline-none">
                                            <p class="mb-1 text-lg font-bold text-black">Libros</p>
                                            <img src="{{ asset('images/language.png') }}" alt="">
                                        </a>
                                    @endcan

                                    <a href="#" class="flex-1 block p-4 hover:bg-gray-400 focus:outline-none">
                                        <p class="mb-1 text-lg font-bold text-black">Alumnos</p>
                                        <img src="{{ asset('images/social.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <p class="mb-4 text-base leading-relaxed">Fingerstache flexitarian street art 8-bit
                                waistcoat.
                                Distillery
                                hexagon disrupt edison bulbche.</p>
                            @can('Editar_curso')
                                <a href="{{ route('course.edit', $curso->id) }}"
                                    class="inline-flex items-center font-semibold text-blue-700 md:mb-2 lg:mb-0 hover:text-blue-400 ">
                                    editar
                                    <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                        height="20" fill="currentColor">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" />
                                    </svg>
                                </a>
                            @endcan
                        </div>
                    </div>
                @endforeach
            @endcan
        </div>
    </section>





</x-app-layout>
