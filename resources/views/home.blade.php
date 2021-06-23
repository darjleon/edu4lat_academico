<x-app-layout>
    <div class="w-full pb-2 bg-white border-b-4 rounded-lg shadow-xl">
        <x-header-title>
            Notificaciones
        </x-header-title>
    </div>

    <div class="relative flex flex-col items-center justify-center h-full">

        <div class="w-full bg-white rounded-lg shadow-xl">
            <div class="items-center px-4 pt-2 space-y-1 md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                <h2 class="text-xl font-semibold">
                    Categorias:
                </h2>
            </div>
            <div class="py-3 pl-5 overflow-hidden rounded-t-xl bg-gradient-to-r from-light-blue-50 to-light-blue-100">
                <div class="flex flex-wrap -m-2">
                    <div class="flex items-center font-medium rounded-md group">
                        <svg class="w-6 h-6 mr-1 text-gray-900" x-description="Heroicon name: outline/home"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3
                                    0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0
                                    11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        Cursos
                    </div>
                    <div class="flex items-center font-medium rounded-md group">
                        <svg class="w-6 h-6 ml-3 mr-1 text-gray-900" x-description="Heroicon name: outline/home"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        Libros
                    </div>
                    <div class="flex items-center font-medium rounded-md group">
                        <svg class="w-6 h-6 ml-3 mr-1 text-gray-900" x-description="Heroicon name: outline/home"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Pruebas
                    </div>
                    <div class="flex items-center font-medium rounded-md group">
                        <svg class="w-6 h-6 ml-3 mr-1 text-gray-900" x-description="Heroicon name: outline/home"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Actividades
                    </div>
                    <div class="flex items-center font-medium rounded-md group">
                        <svg class="w-6 h-6 ml-3 mr-1 text-gray-900" x-description="Heroicon name: outline/home"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3
                                    0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0
                                    11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        Estudiantes
                    </div>
                    <div class="flex items-center font-medium rounded-md group">
                        <svg class="w-6 h-6 ml-3 mr-1 text-gray-900" x-description="Heroicon name: outline/home"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                        Areas
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col justify-start md:flex-row">
        <div class="flex flex-wrap md:flex-col">
            <a href="#">
                <x-button-end class="text-white bg-blue-600 hover:bg-blue-700">
                    <p class="flex items-center font-medium rounded-md group">Sin leer
                        <svg class="w-6 h-6 ml-3 text-white" x-description="Heroicon name: outline/home"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                            </path>
                        </svg>
                    </p>
                </x-button-end>
            </a>
        </div>
        <div class="flex flex-wrap md:flex-col">
            <a href="#">
                <x-button-end class="text-white bg-blue-600 hover:bg-blue-700">
                    <p class="flex items-center font-medium rounded-md group">
                        Leido<svg class="w-6 h-6 ml-3 text-white" x-description="Heroicon name: outline/home"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </p>
                </x-button-end>
            </a>
        </div>
    </div>

    <x-container>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full ">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th colspan="1" class="relative px-3 py-3">
                                        <span class="sr-only">Accion</span>
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                        De:
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                        Asunto:
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                        recibido:
                                    </th>
                                    <th colspan="1" class="relative px-3 py-3">
                                        <span class="sr-only">Accion</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-container>

    {{-- <x-dropdown>
        <x-slot name="align">
            top
        </x-slot>
        <x-slot name="trigger">
            <div class="flex px-4 pt-3">
                <x-button>
                    Categorias
                </x-button>
            </div>
        </x-slot>
        <x-slot name="content">
            @hasanyrole('Estudiante')
            <x-link-sidebar href="#">
                <x-slot name="icono">
                    M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0
                    002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01
                </x-slot>
                Clases
            </x-link-sidebar>
            @endhasanyrole

            @hasanyrole('Administrador|Coordinador')
            <x-link-sidebar href="{{ route('student.index') }}">
                <x-slot name="icono">
                    M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0
                    11-8 0 4 4 0 018 0z
                </x-slot>
                Estudiantes
            </x-link-sidebar>
            @endhasanyrole

            @hasanyrole('Administrador')
            <x-link-sidebar href="{{ route('usuario.index') }}">
                <x-slot name="icono">
                    M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3
                    0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0
                    11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z
                </x-slot>
                Usuarios
            </x-link-sidebar>
            @endhasanyrole

            @hasanyrole('Administrador')
            <x-link-sidebar href="#">
                <x-slot name="icono">
                    M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6
                    6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4
                </x-slot>
                Configuración
            </x-link-sidebar>
            @endhasanyrole

            @hasanyrole('Administrador|Docente|Estudiante')
            <x-link-sidebar href="#">
                <x-slot name="icono">
                    M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z
                </x-slot>
                Ayuda
            </x-link-sidebar>
            @endhasanyrole
        </x-slot>
    </x-dropdown> --}}
</x-app-layout>
