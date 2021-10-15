@unless($breadcrumbs->isEmpty())
    <div class="w-full p-2 bg-white border-b-2 rounded-lg shadow-xl">
        <ol class="flex flex-wrap text-base text-gray-800 ">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <li>
                        <a href="{{ $breadcrumb->url }}"
                            class="text-blue-600 hover:text-blue-900 hover:underline focus:text-blue-900 focus:underline">
                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                @else
                    <li>
                        {{ $breadcrumb->title }}
                    </li>
                @endif

                @unless($loop->last)
                    <li class="text-gray-700 ">
                        /
                    </li>
                @endunless
            @endforeach
        </ol>
    </div>
@endunless
