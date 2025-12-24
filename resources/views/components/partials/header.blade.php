<header id="app-header" class="mb-12 animate-fade-in relative z-20 transition-transform duration-700">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 mb-12">
        <!-- LEFT: Profile & Status -->
        <div class="flex items-center gap-6">
            <!-- Matrix Mode Trigger -->
            <div class="relative size-20 group cursor-pointer shrink-0" onclick="toggleMatrixMode()" title="Click to enter the Matrix">
                <div class="absolute inset-0 bg-sky-500 rounded-full blur opacity-20 group-hover:opacity-50 transition duration-500 animate-pulse-slow"></div>
                <img src="{{asset('img/me.png')}}" class="relative rounded-full border border-white/10 shadow-2xl transition duration-500 group-hover:scale-105" alt="Abdullah">
                <div class="absolute bottom-1 right-1 size-4 bg-emerald-500 border-4 border-[#050505] rounded-full"></div>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-white font-mono cursor-default tracking-tight" data-value="Abdullah Alhajj" onmouseover="hackEffect(event)">Abdullah Alhajj</h2>
                <div class="flex items-center gap-2 text-sm font-mono mt-1 text-slate-400">
                    <span>Tripoli, LY</span>
                    <span class="text-slate-600">•</span>
                    <span class="text-emerald-400 flex items-center gap-1">
                        <span class="relative flex h-2 w-2">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        Online
                    </span>
                </div>
            </div>
        </div>

        <!-- RIGHT: Social Modules (User: torgodly) -->
        <div class="flex items-center gap-3">
            <!-- GitHub -->
            <a href="https://github.com/torgodly" target="_blank" class="group relative flex items-center gap-3 px-4 py-2 bg-white/5 border border-white/10 rounded-lg overflow-hidden hover:border-white/20 transition-all">
                <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/5 to-white/0 translate-x-[-100%] group-hover:animate-scan"></div>
                <svg class="size-5 text-slate-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                <div class="flex flex-col">
                    <span class="text-[10px] uppercase text-slate-500 font-bold leading-none">Github</span>
                    <span class="text-xs font-mono text-slate-300 group-hover:text-white">torgodly</span>
                </div>
            </a>

            <!-- X / Twitter -->
            <a href="https://x.com/torgodly" target="_blank" class="group relative flex items-center gap-3 px-4 py-2 bg-white/5 border border-white/10 rounded-lg overflow-hidden hover:border-white/20 transition-all">
                <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/5 to-white/0 translate-x-[-100%] group-hover:animate-scan"></div>
                <svg class="size-4 text-slate-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M13.6823 10.6218L20.2391 3H18.6854L12.9921 9.61788L8.44486 3H3.2002L10.0765 13.0074L3.2002 21H4.75404L10.7663 14.0113L15.5685 21H20.8131L13.6819 10.6218H13.6823ZM11.5541 13.0956L10.8574 12.0991L5.31391 4.16971H7.70053L12.1742 10.5689L12.8709 11.5655L18.6861 19.8835H16.2995L11.5541 13.096V13.0956Z" /></svg>
                <div class="flex flex-col">
                    <span class="text-[10px] uppercase text-slate-500 font-bold leading-none">Follow</span>
                    <span class="text-xs font-mono text-slate-300 group-hover:text-white">@torgodly</span>
                </div>
            </a>
        </div>
    </div>

    <!-- Main Title -->
    <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-white mb-8 leading-[1.1]" >
        Architecting <span class="relative inline-block">
            <span class="absolute -inset-1 bg-gradient-to-r from-sky-500 to-indigo-500 opacity-20 blur-lg"></span>
            <span class="relative text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-indigo-400 to-purple-400">Scalable SaaS</span>
        </span> <br>
        & Digital Experiences.
    </h1>

    <p class="text-lg text-slate-400 max-w-2xl leading-relaxed mb-10" >
        I don't just write code; I engineer resilient systems. From complex
        <span class="text-slate-200 font-medium decoration-sky-500/30 underline underline-offset-4 decoration-2">Laravel backends</span> to pixel-perfect
        <span class="text-slate-200 font-medium decoration-indigo-500/30 underline underline-offset-4 decoration-2">Front-end interfaces</span>.
        Helping founders ship production-grade software.
    </p>

    <!-- REPLACEMENT FOR PILLS: A Primary Action -->
    <div class="flex flex-wrap gap-4">
        <button onclick="scrollToWork()     " class="group relative px-6 py-3 bg-white text-black font-bold rounded-full transition-all hover:bg-slate-200 flex items-center gap-2">
            View Selected Work
            <svg class="w-4 h-4 transition-transform group-hover:translate-y-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
        </button>

        <a href="mailto:torgodly@gmail.com" class="px-6 py-3 rounded-full border border-white/10 text-white font-medium hover:bg-white/5 transition-colors">
            Contact Me
        </a>
    </div>
</header>
