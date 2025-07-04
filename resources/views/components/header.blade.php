@props(['profilePicture' => '' , 'socials' => [] ])
<header>
    <a href="/" class="overflow-hidden size-24 rounded-full block animate-fade-up mb-6">
        <img src="{{$profilePicture}}"
             class="size-24 transition duration-300 hover:scale-110" alt="Nuno Guerra">
    </a>

    <h1 class="max-w-3xl text-3xl font-bold tracking-tight sm:text-5xl text-slate-50 animate-fade-up animate-delay-[100ms]">
        Indie Hacker, Laravel Developer,<br> and Relentless Builder<span class="sm:hidden">.</span>
        <span class="hidden sm:inline animate-fade animate-delay-[300ms]">🚀</span>
    </h1>
    <p class="max-w-[700px] mt-6 text-base text-slate-300 animate-fade-up animate-delay-[200ms]">
        I'm Abdullah — an indie hacker and full-stack Laravel developer who loves crafting smart, scalable systems.
        Focused on clean code, fast iterations, and building products with <a href="https://laravel.com/" class="underline hover:no-underline" target="_blank">Laravel</a> and
        <a href="https://filamentphp.com/" class="underline hover:no-underline" target="_blank">Filament</a>.
        Always building, always leveling up.
    </p>

    <div class="mt-6 flex gap-6">
        @foreach($socials as $title => $link)
            <a class="group -m-1 p-1 animate-fade-up animate-delay-[{{ 300 + $loop->index * 50 }}ms]" aria-label="Follow on {{ $title }}"
               href="{{ $link }}" target="_blank">
                <x-dynamic-component :component="'tabler-brand-' . $title" class="size-6 stroke-white/50 transition group-hover:stroke-white/80" />
            </a>
        @endforeach
    </div>

    <div class="flex items-center space-x-5 mt-7 animate-fade-up animate-delay-[550ms]">
        <a class="flex h-9.5 px-4.5 items-center text-sm justify-center rounded-full text-white bg-white/5 hover:bg-white/10 transition z-50 border border-slate-700/20 shadow-2xl transition group"
           href="mailto:torgodly@gmail.com">
            <span>Send email</span>
            <svg class="ml-1.5 fill-current transition-transform group-hover:translate-x-0.5"
                 xmlns="http://www.w3.org/2000/svg" width="11" height="11">
                <path
                    d="M5.977 10.368 4.953 9.354 8.02 6.286H.568V4.805H8.02L4.953 1.742 5.977.723 10.8 5.546z"></path>
            </svg>
        </a>

        <a data-tippy="Message me on Telegram only for project inquiries" data-tippy-pos="up"
           class="flex h-9.5 px-4.5 items-center text-sm justify-center rounded-full text-white bg-white/5 hover:bg-white/10 transition z-50 border border-slate-700/20 shadow-2xl transition group space-x-2"
           href="https://t.me/torgodly" target="_blank">
            <svg viewBox="0 0 70 59" class="size-4 text-sky-300" fill="none">
                <path
                    d="M4.97 25.324c18.66-8.128 31.1-13.487 37.32-16.076C60.07 1.855 63.76.57 66.17.528c.53-.01 1.71.122 2.48.745.64.525.82 1.235.91 1.733.08.498.19 1.633.1 2.519-.96 10.12-5.13 34.678-7.25 46.013-.89 4.796-2.66 6.404-4.37 6.561-3.72.342-6.54-2.456-10.14-4.815-5.63-3.693-8.81-5.991-14.28-9.594-6.32-4.164-2.22-6.453 1.38-10.193.94-.98 17.32-15.874 17.63-17.225.04-.17.08-.8-.3-1.131-.37-.333-.92-.22-1.32-.13-.57.129-9.56 6.077-27 17.844-2.55 1.754-4.86 2.609-6.94 2.564-2.28-.05-6.68-1.292-9.95-2.354-4-1.303-7.19-1.992-6.91-4.205.14-1.152 1.73-2.331 4.76-3.536Z"
                    fill="currentColor"></path>
            </svg>
            <span>Quick chat</span>
        </a>
    </div>
</header>
