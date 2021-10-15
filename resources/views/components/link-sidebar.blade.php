<a {{ $attributes->merge(['href']) }}
    class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
    <svg class="w-6 h-6 mr-3 text-gray-300" x-description="Heroicon name: outline/home"
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icono }}">
        </path>
    </svg>
    {{ $slot }}
</a>
