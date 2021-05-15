<x-app-layout>

    <x-quiz-preview>
        <x-slot name="titulo">
            {{ $prueba->titulo }}
        </x-slot>
        <x-slot name="libro">
            <span class="px-2 text-gray-900 underline bg-green-100 rounded-full">{{ $prueba->libro_id }}</span>
        </x-slot>
        <x-slot name="area">
            {{ $prueba->area }}
        </x-slot>
        <x-slot name="nivel">
            {{ $prueba->nivel }}
        </x-slot>
        <x-slot name="fecha">
            {{ $prueba->fecha }}
        </x-slot>
        <x-slot name="horaInicio">
            {{ $prueba->inicio }}
        </x-slot>
        <x-slot name="horaFin">
            {{ $prueba->fin }}
        </x-slot>
        <x-slot name="descripcion">
            @if (empty($prueba->descripcion))
                Sin instrucciones
            @else
                {{ $prueba->descripcion }}
            @endif
        </x-slot>
        @foreach ($actividades->shuffle() as $actividad)

            @if ($actividad->activity_type_id == 1)

                <div class="px-4 justify-self-center">
                    <p class="my-2 text-2xl font-semibold text-center text-red-800">Actividad: Verdadero o Falso</p>
                    <div class="flex flex-col px-4 pt-3 pb-4 my-2 bg-white rounded shadow-md">
                        <div class="mb-3 -mx-3 md:flex">
                            <div class="px-3 md:w-full">
                                <label class="block mb-6 text-lg font-bold tracking-wide uppercase text-grey-darker"
                                    for="respuesta">
                                    {{ $actividad->enunciado }}
                                </label>
                                <div class="inline ml-2">
                                    <input type="radio" name="respuesta{{ $actividad->id }}"
                                        id="{{ $actividad->id }}" class="w-5 h-5 text-green-500 form-radio"
                                        value="true">
                                    <span class="ml-2">Verdadera</span>
                                    <input type="radio" name="respuesta{{ $actividad->id }}"
                                        id="{{ $actividad->id }}" class="w-5 h-5 ml-4 text-red-500 form-radio"
                                        value="false">
                                    <span class="ml-2">Falsa</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @elseif ($actividad->activity_type_id == 2)

                <div class="px-4 justify-self-center">
                    <p class="my-2 text-2xl font-semibold text-center text-red-800">Actividad: Respuesta única
                    </p>

                    <div class="flex flex-col px-4 pt-3 pb-4 my-2 bg-white rounded shadow-md">
                        <div class="mb-3 -mx-3 md:flex">
                            <div class="px-3 md:w-full">
                                <label class="block mb-6 text-lg font-bold tracking-wide uppercase text-grey-darker"
                                    for="respuesta">
                                    {{ $actividad->enunciado }}
                                </label>

                                <div class="flex justify-center h-full">
                                    <div class="w-full">
                                        <fieldset class="border rounded shadow-sm">

                                            @php
                                                $opcionN = 1;
                                                $opciones = Arr::collapse([json_decode($actividad->opciones), json_decode($actividad->respuesta)]);
                                            @endphp

                                            @foreach (Arr::shuffle($opciones) as $opcion)

                                                <div class="relative flex items-center border-b last:border-b-0">
                                                    <input class="absolute w-5 h-5 text-green-600 cursor-pointer left-3"
                                                        type="radio" name="opcion"
                                                        id="opcion{{ $opcionN }}{{ $actividad->id }}"
                                                        value="{{ $opcion }}">
                                                    <label class="flex-1 block py-2 pl-10 pr-2 cursor-pointer"
                                                        for="opcion{{ $opcionN }}{{ $actividad->id }}">{{ $opcion }}</label>
                                                </div>

                                                @php
                                                    $opcionN += 1;
                                                @endphp
                                            @endforeach

                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            @elseif ($actividad->activity_type_id == 3)

                <div class="px-4 justify-self-center">
                    <p class="my-2 text-2xl font-semibold text-center text-red-800">Actividad: Respuesta múltiple</p>
                    <div class="flex flex-col px-4 pt-3 pb-4 my-2 bg-white rounded shadow-md">
                        <div class="mb-3 -mx-3 md:flex">
                            <div class="px-3 md:w-full">
                                <label class="block mb-6 text-lg font-bold tracking-wide uppercase text-grey-darker"
                                    for="respuesta">
                                    {{ $actividad->enunciado }}
                                </label>
                                <div class="flex justify-center h-full">
                                    <div class="w-full">
                                        <fieldset class="border rounded shadow-sm">

                                            @php
                                                $opcionN = 1;
                                                $opciones = Arr::collapse([json_decode($actividad->opciones), json_decode($actividad->respuesta)]);
                                            @endphp

                                            @foreach (Arr::shuffle($opciones) as $opcion)

                                                <div class="relative flex items-center border-b last:border-b-0">
                                                    <input
                                                        class="absolute w-5 h-5 text-green-600 border border-gray-300 rounded-md cursor-pointer left-3"
                                                        type="checkbox" name="opcion"
                                                        id="opcion{{ $opcionN }}{{ $actividad->id }}"
                                                        value="{{ $opcion }}">
                                                    <label class="flex-1 block py-2 pl-10 pr-2 cursor-pointer"
                                                        for="opcion{{ $opcionN }}{{ $actividad->id }}">{{ $opcion }}</label>
                                                </div>

                                                @php
                                                    $opcionN += 1;
                                                @endphp
                                            @endforeach

                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @elseif ($actividad->activity_type_id == 4)

                <div class="px-4 justify-self-center">
                    <p class="my-2 text-2xl font-semibold text-center text-red-800">Actividad: Dar respuesta</p>
                    <div class="flex flex-col px-4 pt-3 pb-4 my-2 bg-white rounded shadow-md">
                        <div class="mb-3 -mx-3 md:flex">
                            <div class="px-3 md:w-full">
                                <label class="block mb-6 text-lg font-bold tracking-wide uppercase text-grey-darker"
                                    for="respuesta">
                                    {{ $actividad->enunciado }}
                                </label>
                                @php
                                    $opciones = json_decode($actividad->opciones);
                                @endphp
                                <div class="form-group">
                                    <label for="respuestaPregunta{{ $actividad->id }}"
                                        class="w-full text-lg font-bold leading-tight">Pregunta:
                                        {{ $opciones[0] }}</label>
                                    <textarea name="respuestaPregunta{{ $actividad->id }}"
                                        id="respuestaPregunta{{ $actividad->id }}"
                                        class="w-full px-2 py-1 pt-4 mr-3 leading-tight text-gray-700 bg-transparent border-gray-300 border-none rounded-md appearance-none order focus:outline-none"
                                        placeholder="Responda aquí"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            @elseif ($actividad->activity_type_id == 5)

                <div class="px-4 justify-self-center">
                    <p class="my-2 text-2xl font-semibold text-center text-red-800">Actividad: Relación única
                    </p>
                    <div class="flex flex-col px-4 pt-3 pb-4 my-2 bg-white rounded shadow-md">
                        <div class="mb-3 -mx-3 md:flex">
                            <div class="px-3 md:w-full">
                                <label class="block mb-6 text-lg font-bold tracking-wide uppercase text-grey-darker"
                                    for="respuesta">
                                    {{ $actividad->enunciado }}
                                </label>
                                @php
                                    $opcionN = 1;
                                    $alternativas = json_decode($actividad->respuesta);
                                    $opciones = json_decode($actividad->opciones);
                                @endphp

                                @foreach (Arr::shuffle($opciones) as $opcion)
                                    <div class="relative flex flex-col items-center border-b last:border-b-3">
                                        <div class="input-group-prepend">
                                            <label class="leading-loose input-group-text"
                                                for="alternativa{{ $opcionN }}{{ $actividad->id }}">{{ $opcion }}</label>
                                        </div>
                                        <select id="alternativa{{ $opcionN }}{{ $actividad->id }}"
                                            class="w-full py-2 text-gray-600 border border-gray-300 rounded-md form-multiselect focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none custom-select"
                                            name="alternativa{{ $opcionN }}">
                                            <option value="">
                                                Escoga:
                                            </option>
                                            @foreach ($alternativas as $alternativa)
                                                <option value="{{ $alternativa }}">{{ $alternativa }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @php
                                        $opcionN += 1;
                                    @endphp
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            @elseif ($actividad->activity_type_id == 6)

                <div class="px-4 justify-self-center">
                    <p class="my-2 text-2xl font-semibold text-center text-red-800">Actividad: Completar</p>
                    <div class="flex flex-col px-4 pt-3 pb-4 my-2 bg-white rounded shadow-md">
                        <div class="mb-3 -mx-3 md:flex">
                            <div class="px-3 md:w-full">
                                <label class="block mb-6 text-lg font-bold tracking-wide uppercase text-grey-darker"
                                    for="respuesta">
                                    {{ $actividad->enunciado }}
                                </label>
                                @php
                                    $opciones = Arr::collapse([json_decode($actividad->opciones), json_decode($actividad->respuesta)]);
                                @endphp
                                <div class="flex items-stretch py-1 overflow-x-auto whitespace-nowrap">
                                    <div
                                        class="self-center text-2xl font-medium leading-loose text-justify align-middle ">
                                        {{ $opciones[0] }}
                                        <textarea name="respuestaPregunta{{ $actividad->id }}"
                                            id="respuestaPregunta{{ $actividad->id }}"
                                            class="px-2 py-1 pt-2 leading-tight text-gray-800 bg-transparent border-gray-300 border-none rounded-md appearance-none whitespace-nowrap order focus:outline-none"
                                            placeholder="Ingrese su respuesta"></textarea> {{ $opciones[1] }}
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            @endif

            {{-- <div class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4 bg-white rounded shadow-md">
                <div class="mb-6 -mx-3 md:flex">
                    <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                            for="grid-first-name">
                            First Name
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                            id="grid-first-name" type="text" placeholder="Jane">
                        <p class="text-xs italic text-red">Please fill out this field.</p>
                    </div>
                    <div class="px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                            for="grid-last-name">
                            Last Name
                        </label>
                        <input
                            class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            id="grid-last-name" type="text" placeholder="Doe">
                    </div>
                </div>
                <div class="mb-6 -mx-3 md:flex">
                    <div class="px-3 md:w-full">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                            for="grid-password">
                            Password
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            id="grid-password" type="password" placeholder="******************">
                        <p class="text-xs italic text-grey-dark">Make it as long and as crazy as you'd like</p>
                    </div>
                </div>
                <div class="mb-2 -mx-3 md:flex">
                    <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                            for="grid-city">
                            City
                        </label>
                        <input
                            class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            id="grid-city" type="text" placeholder="Albuquerque">
                    </div>
                    <div class="px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                            for="grid-state">
                            State
                        </label>
                        <div class="relative">
                            <select
                                class="block w-full px-4 py-3 pr-8 border rounded appearance-none bg-grey-lighter border-grey-lighter text-grey-darker"
                                id="grid-state">
                                <option>New Mexico</option>
                                <option>Missouri</option>
                                <option>Texas</option>
                            </select>
                        </div>
                    </div>
                    <div class="px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                            for="grid-zip">
                            Zip
                        </label>
                        <input
                            class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            id="grid-zip" type="text" placeholder="90210">
                    </div>
                </div>
            </div> --}}
        @endforeach

        <div class="flex justify-center pt-4 space-x-4">
            <a href="#" onclick="history.back()"
                class="flex items-center justify-center w-full px-4 py-3 text-xl font-extrabold text-gray-800 bg-blue-300 rounded-md hover:bg-blue-600 focus:outline-none">
                <svg class="w-12 h-12 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z">
                    </path>
                </svg>Volver
            </a>
            <button type="submit"
                class="flex items-center justify-center w-full px-4 py-3 text-xl font-extrabold text-gray-800 bg-green-300 rounded-md hover:bg-green-600 focus:outline-none">Realizar
                <svg class="w-12 h-12 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                    </path>
                </svg>
            </button>
            <a href="{{ route('quiz.edit', $prueba->id) }}"
                class="flex items-center justify-center w-full px-4 py-3 text-xl font-extrabold text-gray-800 bg-blue-300 rounded-md hover:bg-blue-600 focus:outline-none">Editar
                <svg class="w-12 h-12 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </a>
        </div>
    </x-quiz-preview>


    {{-- <x-quiz-format-create>
        <div class="divide-y divide-gray-200">
            <form>
                @csrf
                <div class="py-8 space-y-4 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7">
                    <div class="flex flex-col">
                        <label class="leading-loose" for="titulo">Titulo</label>
                        <input type="text" value="{{ $prueba->titulo }}"
                            class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                            readonly>
                    </div>
                    <div class="flex flex-col">
                        <label class="leading-loose" for="descripcion">Descripcion/Instrucciones</label>
                        <textarea id="descripcion" name="descripcion"
                            class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                            placeholder="{{ $prueba->descripcion }}" readonly></textarea>
                    </div>
                    <div class="flex justify-around space-x-4">
                        <div class="flex flex-col">
                            <div class="input-group-prepend">
                                <label class="leading-loose input-group-text" for="curso">Curso:</label>
                            </div>
                            <input type="text" id="curso" name="curso" value="{{ $prueba->curso }}"
                                class="w-full py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                readonly>
                        </div>
                        <div class="flex flex-col">
                            <div class="input-group-prepend">
                                <label class="leading-loose input-group-text" for="area">Area:</label>
                            </div>
                            <input type="text" id="area" name="area" value="{{ $prueba->area }}"
                                class="w-full py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                readonly>
                        </div>
                        <div class="flex flex-col">
                            <div class="leading-loose input-group-prepend">
                                <label class="input-group-text" for="nivel">Nivel:</label>
                            </div>
                            <input type="text" id="nivel" name="nivel" value="{{ $prueba->nivel }}"
                                class="w-full py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                readonly>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <label class="leading-loose" for="fecha">Fecha de la
                            prueba</label>
                        <input value="{{ $prueba->fecha }}"
                            class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                            name="fecha" id="fecha" type="date" readonly>
                    </div>
                    <div class="flex justify-around space-x-4">
                        <div class="flex flex-col">
                            <label class="leading-loose">Hora de inicio</label>
                            <div class="flex flex-col text-gray-400 focus-within:text-gray-600">
                                <input value="{{ $prueba->inicio }}"
                                    class="w-full px-8 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                    name="hora_de_inicio" id="hora_de_inicio" type="time" readonly>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label class="leading-loose">Hora de cierre</label>
                            <div class="flex flex-col text-gray-400 focus-within:text-gray-600">
                                <input value="{{ $prueba->fin }}"
                                    class="w-full px-8 py-2 text-gray-600 border border-gray-300 rounded-md focus:ring-gray-500 focus:border-gray-900 sm:text-sm focus:outline-none"
                                    name="hora_de_cierre" id="hora_de_cierre" type="time" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center pt-4 space-x-4">
                    <a href="#" onclick="history.back()"
                        class="flex items-center justify-center w-full px-4 py-3 text-gray-900 bg-blue-300 rounded-md focus:outline-none">
                        <svg class="w-12 h-12 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z">
                            </path>
                        </svg>Volver
                    </a>
                    <a href="{{ route('quiz.edit', $prueba->id) }}"
                        class="flex items-center justify-center w-full px-4 py-3 text-white bg-blue-500 rounded-md focus:outline-none">Editar
                        <svg class="w-12 h-12 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </a>
                </div>
            </form>
        </div>
    </x-quiz-format-create> --}}

</x-app-layout>
