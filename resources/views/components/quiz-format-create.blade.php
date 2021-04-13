<div class="relative py-3 sm:max-w-xl sm:mx-auto">
    <div class="relative px-4 py-10 mx-8 bg-white shadow md:mx-0 rounded-3xl sm:p-10">
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
            <div class="self-start block pl-2 text-xl font-semibold text-gray-700">
                <h2 class="leading-relaxed">Encabezado</h2>
                <p class="text-sm font-normal leading-relaxed text-gray-500">Indica los datos e
                    intrucciones necesarios para programar y realizar la prueba</p>
            </div>
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
