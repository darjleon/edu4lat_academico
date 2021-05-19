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

</x-app-layout>
