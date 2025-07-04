@props(['links' => [], 'title' => '', 'description' => '', 'logo' => '','id' => 1])
<li :class="intersect ? 'animate-fade-up animate-delay-[{{$id}}00ms] animate-ease-out':'opacity-0'"
    class="opacity-0 flex flex-col items-start">
    <a href="{{ count($links) ? reset($links) : '/' }}" target="_blank" class="flex items-center h-10 w-full">
        <img src="{{ asset($logo) }}" alt="logo" class="h-8 object-contain"/>
    </a>

    <h3 class="mt-5 text-base font-semibold text-slate-100">{{$title}}</h3>
    <p class="relative z-10 mt-2 text-slate-300 text-sm">{{$description}}</p>
    <div class="flex items-center space-x-4">
        @foreach($links as $title => $url)
            <a href="{{$url}}" target="_blank"
               class="mt-6 flex h-9.5 px-4.5 items-center text-sm justify-center rounded-full text-white bg-white/5 hover:bg-white/10 transition z-50 border border-slate-700/20 shadow-2xl">
                <div class="flex items-center">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="size-6 flex-none -ml-1 text-sky-300">
                        <path
                            d="M15.712 11.823a.75.75 0 1 0 1.06 1.06l-1.06-1.06Zm-4.95 1.768a.75.75 0 0 0 1.06-1.06l-1.06 1.06Zm-2.475-1.414a.75.75 0 1 0-1.06-1.06l1.06 1.06Zm4.95-1.768a.75.75 0 1 0-1.06 1.06l1.06-1.06Zm3.359.53-.884.884 1.06 1.06.885-.883-1.061-1.06Zm-4.95-2.12 1.414-1.415L12 6.344l-1.415 1.413 1.061 1.061Zm0 3.535a2.5 2.5 0 0 1 0-3.536l-1.06-1.06a4 4 0 0 0 0 5.656l1.06-1.06Zm4.95-4.95a2.5 2.5 0 0 1 0 3.535L17.656 12a4 4 0 0 0 0-5.657l-1.06 1.06Zm1.06-1.06a4 4 0 0 0-5.656 0l1.06 1.06a2.5 2.5 0 0 1 3.536 0l1.06-1.06Zm-7.07 7.07.176.177 1.06-1.06-.176-.177-1.06 1.06Zm-3.183-.353.884-.884-1.06-1.06-.884.883 1.06 1.06Zm4.95 2.121-1.414 1.414 1.06 1.06 1.415-1.413-1.06-1.061Zm0-3.536a2.5 2.5 0 0 1 0 3.536l1.06 1.06a4 4 0 0 0 0-5.656l-1.06 1.06Zm-4.95 4.95a2.5 2.5 0 0 1 0-3.535L6.344 12a4 4 0 0 0 0 5.656l1.06-1.06Zm-1.06 1.06a4 4 0 0 0 5.657 0l-1.061-1.06a2.5 2.5 0 0 1-3.535 0l-1.061 1.06Zm7.07-7.07-.176-.177-1.06 1.06.176.178 1.06-1.061Z"
                            fill="currentColor"></path>
                    </svg>
                    <span class="ml-1">{{$title}}</span>
                </div>
            </a>
        @endforeach
    </div>
</li>
