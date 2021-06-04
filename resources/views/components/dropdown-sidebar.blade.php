<div x-data="{ open: false }">
    <button @click="open = !open"
        class="flex items-center w-full px-2 py-2 text-sm font-medium text-gray-300 rounded-md cursor-pointer focus:outline-none hover:bg-gray-700 hover:text-white group">
        <span class="flex items-center">
            <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="{{ $iconoGeneral }}" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
            {{ $nombre }}
        </span>

        <span>
            <svg class="w-4 h-4 ml-10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" style="display: none;">
                </path>
                <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
        </span>
    </button>

    <div x-show="open">
        {{ $slot }}
    </div>
</div>
