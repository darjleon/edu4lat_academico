<div class="relative py-3 sm:max-w-5xl sm:mx-auto">
    <div class="relative px-4 py-10 mx-8 bg-white shadow md:mx-0 rounded-3xl sm:p-10 ">
        <div class="flex justify-between">
            <div
                class="flex items-center justify-center w-1/2 px-1 py-1 text-2xl text-white bg-green-500 rounded-md focus:outline-none">
                Vista previa de la prueba.
            </div>
            <div
                class="flex items-center justify-center w-1/2 px-1 py-1 text-2xl text-white bg-green-400 rounded-md focus:outline-none">
                Resultado = ?.
            </div>
        </div>
        <div class="flex items-center space-x-5">
            <div class="flex items-center justify-center flex-shrink-0 w-20 h-20 font-mono text-2xl rounded-full">
                <svg class="h-36 w-36" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                    <path
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                    </path>
                </svg>
            </div>
            <div class="block pl-2 text-3xl font-semibold text-gray-700 justify-self-center">
                <h1 class="leading-relaxed">Titulo: {{ $titulo }} </h1>
            </div>
        </div>
        <div class="mb-6 -mx-3 md:flex">
            <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                <div class="block w-full px-4 py-2 border rounded ">
                    <p class="text-lg font-semibold text-gray-700">Libro: {{ $libro }}</p>
                </div>
                <div class="block w-full px-4 py-2 border rounded ">
                    <p class="text-lg font-semibold text-gray-700 ">Area: {{ $area }}</p>
                </div>
                <div class="block w-full px-4 py-2 border rounded ">
                    <p class="text-lg font-semibold text-gray-700 ">Nivel: {{ $nivel }}</p>
                </div>
            </div>
            <div class="px-3 md:w-1/2 md:mb-0">
                <div class="block w-full px-4 py-2 border rounded ">
                    <p class="text-lg font-semibold text-gray-700 ">Fecha: {{ $fecha }}</p>
                </div>
                <div class="block w-full px-4 py-2 border rounded ">
                    <p class="text-lg font-semibold text-gray-700 ">Hora de inicio: {{ $horaInicio }}</p>
                </div>
                <div class="block w-full px-4 py-2 border rounded ">
                    <p class="text-lg font-semibold text-gray-700 ">Hora de cierre: {{ $horaFin }}</p>
                </div>
            </div>
        </div>

        <div class="px-4 justify-self-center">
            <p class="my-2 text-2xl font-semibold text-gray-800 underline ">Descripcion/Instrucciones:</p>
            <h3 class="text-xl font-normal text-gray-700 ">
                <textarea rows="7" class="w-full px-4 py-2 text-xl border rounded-md resize" readonly>{{ $descripcion }}
                </textarea>
            </h3>
            <p class="my-2 text-2xl font-semibold text-gray-800 underline ">Resuelva las actividades:</p><br>
        </div>


        @if (!empty($errors->all()))
            <div class="notification is-danger">
                <div class="card-header">
                    <h3>Por favor, valida los siguientes errores:</h3>
                </div>
                <ul>
                    @foreach ($errors->all() as $mensaje)
                        <li>
                            <p style="color:red">{{ $mensaje }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ $slot }}
    </div>
</div>
