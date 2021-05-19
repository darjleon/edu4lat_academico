<div class="p-2">
    <div class="flex justify-end">
        <div
            {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 text-sm font-medium  border border-transparent rounded-md shadow-sm  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ']) }}>
            {{ $slot }}
        </div>
    </div>
</div>
