<section class="py-24 relative">
    <!-- Put this inside the <section class="relative ..."> tags -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-1/3 h-[1px] bg-gradient-to-r from-transparent via-indigo-500/50 to-transparent shadow-[0_0_15px_rgba(99,102,241,0.5)]"></div>
    <div class="max-w-6xl mx-auto px-6">

        <div class="mb-16">
            <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                <span class="w-1 h-6 bg-indigo-500 rounded-full"></span>
                Services
            </h2>
            <p class="mt-2 text-slate-400 max-w-md text-sm">
                I help founders and businesses scale by providing end-to-end technical solutions.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            {{-- SERVICE 1: SaaS Development --}}
            <div class="group relative p-8 rounded-3xl bg-[#0e0e11] border border-white/5 hover:border-indigo-500/30 transition-all duration-500 hover:-translate-y-1">
                <!-- Icon -->
                <div class="w-12 h-12 bg-indigo-500/10 rounded-xl flex items-center justify-center text-indigo-500 mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>

                <h3 class="text-xl font-bold text-white mb-3">SaaS Development</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-6">
                    From "Napkin Sketch" to Production. I build scalable multi-tenant architectures complete with billing, auth, and onboarding.
                </p>

                <ul class="space-y-2">
                    <li class="flex items-center gap-2 text-xs text-slate-300">
                        <div class="w-1 h-1 bg-indigo-500 rounded-full"></div> MVP Development
                    </li>
                    <li class="flex items-center gap-2 text-xs text-slate-300">
                        <div class="w-1 h-1 bg-indigo-500 rounded-full"></div> Stripe/Paddle Integration
                    </li>
                    <li class="flex items-center gap-2 text-xs text-slate-300">
                        <div class="w-1 h-1 bg-indigo-500 rounded-full"></div> Multi-tenancy Setup
                    </li>
                </ul>
            </div>

            {{-- SERVICE 2: Internal Systems --}}
            <div class="group relative p-8 rounded-3xl bg-[#0e0e11] border border-white/5 hover:border-emerald-500/30 transition-all duration-500 hover:-translate-y-1">
                <!-- Icon -->
                <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center text-emerald-500 mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                </div>

                <h3 class="text-xl font-bold text-white mb-3">Custom Dashboards</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-6">
                    Stop using spreadsheets. I create powerful Filament-based admin panels to manage your data, staff, and operations.
                </p>

                <ul class="space-y-2">
                    <li class="flex items-center gap-2 text-xs text-slate-300">
                        <div class="w-1 h-1 bg-emerald-500 rounded-full"></div> CRM & ERP Systems
                    </li>
                    <li class="flex items-center gap-2 text-xs text-slate-300">
                        <div class="w-1 h-1 bg-emerald-500 rounded-full"></div> Data Visualization
                    </li>
                    <li class="flex items-center gap-2 text-xs text-slate-300">
                        <div class="w-1 h-1 bg-emerald-500 rounded-full"></div> Role-Based Access
                    </li>
                </ul>
            </div>

            {{-- SERVICE 3: Performance & API --}}
            <div class="group relative p-8 rounded-3xl bg-[#0e0e11] border border-white/5 hover:border-pink-500/30 transition-all duration-500 hover:-translate-y-1">
                <!-- Icon -->
                <div class="w-12 h-12 bg-pink-500/10 rounded-xl flex items-center justify-center text-pink-500 mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                </div>

                <h3 class="text-xl font-bold text-white mb-3">API & Architecture</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-6">
                    Need to connect your mobile app to a backend? Or optimize a slow Laravel app? I write clean, documented, and fast code.
                </p>

                <ul class="space-y-2">
                    <li class="flex items-center gap-2 text-xs text-slate-300">
                        <div class="w-1 h-1 bg-pink-500 rounded-full"></div> RESTful API Design
                    </li>
                    <li class="flex items-center gap-2 text-xs text-slate-300">
                        <div class="w-1 h-1 bg-pink-500 rounded-full"></div> Database Optimization
                    </li>
                    <li class="flex items-center gap-2 text-xs text-slate-300">
                        <div class="w-1 h-1 bg-pink-500 rounded-full"></div> Legacy Code Refactor
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>
