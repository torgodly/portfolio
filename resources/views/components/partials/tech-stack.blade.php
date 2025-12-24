<section class="py-24 relative border-t border-white/5">
    <!-- Put this inside the <section class="relative ..."> tags -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-1/3 h-[1px] bg-gradient-to-r from-transparent via-indigo-500/50 to-transparent shadow-[0_0_15px_rgba(99,102,241,0.5)]"></div>
    <div class="max-w-6xl mx-auto px-6">
        <div class="mb-12 md:flex md:items-end md:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="w-1 h-6 bg-pink-500 rounded-full"></span>
                    The Toolkit
                </h2>
                <p class="mt-2 text-slate-400 max-w-md text-sm">
                    I don't rely on guesswork. I build on top of a battle-tested, modern stack designed for speed, security, and scalability.
                </p>
            </div>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            {{-- 1. LARAVEL --}}
            <div class="group p-4 rounded-xl bg-[#18181b] border border-white/5 hover:border-red-500/30 transition-all hover:-translate-y-1">
                <div class="h-10 w-10 bg-red-500/10 rounded-lg flex items-center justify-center text-red-500 mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M11.96 1.81a.502.502 0 0 0-.46.28l-5.6 11.8a.5.5 0 0 0 .66.64l2.5-1.07-1.34 5.91a.498.498 0 0 0 .78.52l9.04-10.8a.5.5 0 0 0-.6-.8l-3.3 1.86 1.39-6.96a.5.5 0 0 0-.81-.46l-2.26 1.08Z"/></svg>
                </div>
                <h3 class="text-white font-bold text-sm">Laravel</h3>
                <p class="text-xs text-slate-500 mt-1">The Framework of choice.</p>
            </div>

            {{-- 2. FILAMENT --}}
            <div class="group p-4 rounded-xl bg-[#18181b] border border-white/5 hover:border-amber-500/30 transition-all hover:-translate-y-1">
                <div class="h-10 w-10 bg-amber-500/10 rounded-lg flex items-center justify-center text-amber-500 mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-white font-bold text-sm">Filament</h3>
                <p class="text-xs text-slate-500 mt-1">Rapid Admin Panels.</p>
            </div>

            {{-- 3. LIVEWIRE --}}
            <div class="group p-4 rounded-xl bg-[#18181b] border border-white/5 hover:border-pink-500/30 transition-all hover:-translate-y-1">
                <div class="h-10 w-10 bg-pink-500/10 rounded-lg flex items-center justify-center text-pink-500 mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                </div>
                <h3 class="text-white font-bold text-sm">Livewire</h3>
                <p class="text-xs text-slate-500 mt-1">Dynamic UI without JS.</p>
            </div>

            {{-- 4. TAILWIND --}}
            <div class="group p-4 rounded-xl bg-[#18181b] border border-white/5 hover:border-sky-500/30 transition-all hover:-translate-y-1">
                <div class="h-10 w-10 bg-sky-500/10 rounded-lg flex items-center justify-center text-sky-500 mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M12.001 4.8c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624C13.666 10.618 15.027 12 18.001 12c3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C16.337 6.182 14.976 4.8 12.001 4.8zm-6 7.2c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624 1.177 1.194 2.538 2.576 5.512 2.576 3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C10.337 13.382 8.976 12 6.001 12z"/></svg>
                </div>
                <h3 class="text-white font-bold text-sm">Tailwind CSS</h3>
                <p class="text-xs text-slate-500 mt-1">Modern Styling.</p>
            </div>

            {{-- 5. NEXT JS (Replaces Vue) --}}
            <div class="group p-4 rounded-xl bg-[#18181b] border border-white/5 hover:border-white/30 transition-all hover:-translate-y-1">
                <div class="h-10 w-10 bg-white/10 rounded-lg flex items-center justify-center text-white mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M18.665 21.978C16.756 22.637 14.717 23 12.5 23 6.701 23 2 18.299 2 12.5 2 6.701 6.701 2 12.5 2c5.799 0 10.5 4.701 10.5 10.5 0 2.217-.363 4.256-1.022 6.165l-2.001-2.423.001-9.742h-2v12.164l-9-10.904v-1.26h-2v13h2v-11.4l9.788 11.863z"/></svg>
                </div>
                <h3 class="text-white font-bold text-sm">Next.js</h3>
                <p class="text-xs text-slate-500 mt-1">React Framework.</p>
            </div>

            {{-- 6. ALPINE --}}
            <div class="group p-4 rounded-xl bg-[#18181b] border border-white/5 hover:border-blue-400/30 transition-all hover:-translate-y-1">
                <div class="h-10 w-10 bg-blue-400/10 rounded-lg flex items-center justify-center text-blue-400 mb-3 group-hover:scale-110 transition-transform">
                    <span class="font-bold text-xs">&lt;/&gt;</span>
                </div>
                <h3 class="text-white font-bold text-sm">Alpine.js</h3>
                <p class="text-xs text-slate-500 mt-1">Lightweight Interaction.</p>
            </div>

            {{-- 7. MYSQL / DB --}}
            <div class="group p-4 rounded-xl bg-[#18181b] border border-white/5 hover:border-indigo-500/30 transition-all hover:-translate-y-1">
                <div class="h-10 w-10 bg-indigo-500/10 rounded-lg flex items-center justify-center text-indigo-500 mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
                </div>
                <h3 class="text-white font-bold text-sm">MySQL / Redis</h3>
                <p class="text-xs text-slate-500 mt-1">Data Management.</p>
            </div>

            {{-- 8. GIT / DEVOPS --}}
            <div class="group p-4 rounded-xl bg-[#18181b] border border-white/5 hover:border-slate-400/30 transition-all hover:-translate-y-1">
                <div class="h-10 w-10 bg-slate-500/10 rounded-lg flex items-center justify-center text-slate-400 mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>
                </div>
                <h3 class="text-white font-bold text-sm">DevOps</h3>
                <p class="text-xs text-slate-500 mt-1">CI/CD & Server Mgmt.</p>
            </div>

        </div>
    </div>
</section>
