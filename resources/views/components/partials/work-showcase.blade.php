<x-partials.portfolio-grid>

    {{-- 1. SAAS (Live Link) --}}
    {{-- Badge: SaaS (Indigo, Pulse) --}}
    <x-partials.portfolio-item
        title="Nexa CRM"
        subtitle="Real Estate Platform"
        category="saas"
        color="indigo"
        type="saas"
        link="https://nexa.com"
        description="Multi-tenant CRM for real estate agents. Features automated billing, email marketing campaigns, and lead pipeline management."
        :tags="['Laravel', 'Vue', 'Stripe']"
    >
        <h3 class="text-5xl font-black text-white tracking-tighter">
            NEXA<span class="text-indigo-500">.</span>
        </h3>
    </x-partials.portfolio-item>

    {{-- 2. PACKAGE (Github Only) --}}
    {{-- Badge: Package (Pink, Pulse) --}}
    <x-partials.portfolio-item
        title="Filament Logger"
        subtitle="Developer Tool"
        category="packages"
        color="pink"
        type="package"
        github="https://github.com/user/repo"
        description="An open-source activity logger for Filament Admin. Tracks model events and displays them in a timeline view."
        :tags="['Composer', 'PHP', 'Open Source']"
    >
        <div class="font-mono text-3xl font-bold text-pink-500 border-2 border-pink-500 rounded-xl p-3 -rotate-6">
            PKG
        </div>
    </x-partials.portfolio-item>

    {{-- 3. WEBSITE (Live Link Only) --}}
    {{-- Badge: Website (Emerald, Pulse) --}}
    <x-partials.portfolio-item
        title="Al-Fajer Audit"
        subtitle="Corporate Website"
        category="web"
        color="emerald"
        type="website"
        link="https://alfajer.ly"
        description="A professional presence for a leading accounting firm. Static site generation ensures 100/100 Lighthouse scores."
        :tags="['Astro', 'Tailwind', 'SEO']"
    >
        <svg class="w-20 h-20 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
    </x-partials.portfolio-item>

    {{-- 4. SYSTEM (Live Link + Demo) --}}
    {{-- Badge: System (Sky, Pulse) --}}
    <x-partials.portfolio-item
        title="Tripoli University"
        subtitle="Educational Portal"
        category="systems"
        color="sky"
        type="system"
        link="https://uni.ly"
        demo="https://demo.uni.ly"
        description="Complete academic management system. Handles student registrations, exam scheduling, and results."
        :tags="['Filament', 'MySQL', 'Redis']"
    >
        <svg class="w-20 h-20 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
    </x-partials.portfolio-item>

    {{-- 5. SYSTEM (Demo Only) --}}
    {{-- Badge: System (Sky, Pulse) --}}
    <x-partials.portfolio-item
        title="Inventory Pro"
        subtitle="Management Dashboard"
        category="systems"
        color="sky"
        type="system"
        demo="https://demo.inventory.com"
        description="Internal warehouse tracking system. Link opens a read-only demo environment for review."
        :tags="['Laravel', 'Livewire', 'Charts']"
    >
        <svg class="w-20 h-20 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
    </x-partials.portfolio-item>

    {{-- 6. PRIVATE SYSTEM (No Links) --}}
    {{-- Badge: Internal (Slate, No Pulse) --}}
    <x-partials.portfolio-item
        title="Ledger Core"
        subtitle="Financial Module"
        category="systems"
        color="slate"
        type="private"
        description="High-precision financial calculation engine integrated into an enterprise ERP. Access is restricted."
        :tags="['Laravel', 'Auditing', 'Security']"
    >
        <svg class="w-20 h-20 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
    </x-partials.portfolio-item>

    {{-- 7. OPEN SOURCE WEBSITE (Link + Github) --}}
    {{-- Badge: Website (Emerald, Pulse) --}}
    <x-partials.portfolio-item
        title="My Portfolio"
        subtitle="Personal Site"
        category="web"
        color="emerald"
        type="website"
        link="https://me.com"
        github="https://github.com/me/portfolio"
        description="The source code for this very website. Built with Laravel Blade components and Tailwind CSS."
        :tags="['Laravel', 'Blade', 'Alpine']"
    >
        <svg class="w-20 h-20 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
    </x-partials.portfolio-item>

</x-partials.portfolio-grid>
