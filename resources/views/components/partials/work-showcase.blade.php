<x-partials.portfolio-grid>

    <!-- 1. LIVE PROJECT (Standard) -->
    <x-partials.portfolio-item
        title="Nexa SaaS"
        subtitle="SaaS Product"
        category="saas"
        color="#6366f1"
        description="A production-ready multi-tenant architecture."
        link="https://nexa.com"
        :tags="['Laravel', 'Filament']"
    >
        <h3 class="text-4xl font-black text-white tracking-tighter">
            NEXA<span class="text-current">.</span>
        </h3>
    </x-partials.portfolio-item>

    <!-- 2. OPEN SOURCE (Live Link + Github) -->
    <x-partials.portfolio-item
        title="Tripoli Market"
        subtitle="E-Commerce"
        category="web"
        color="orange"
        description="Open source storefront with local payment gateway integration."
        link="https://tripoli-market.ly"
        github="https://github.com/myuser/tripoli-market"
        :tags="['Vue', 'Stripe']"
    >
        <div class="size-20 rounded-xl bg-orange-500 flex items-center justify-center text-black font-bold text-3xl shadow-lg shadow-orange-500/20 rotate-3 group-hover:rotate-6 transition">
            TM
        </div>
    </x-partials.portfolio-item>

    <!-- 3. PRIVATE INTERNAL TOOL (Locked) -->
    <x-partials.portfolio-item
        title="EstateAdmin"
        subtitle="Internal System"
        category="internal"
        color="sky"
        type="private"
        description="Dashboard for tracking 200+ rental properties. Access is restricted to staff."
        :tags="['Laravel', 'Tailwind']"
    >
        <svg class="w-16 h-16 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
        </svg>
    </x-partials.portfolio-item>

    <!-- 4. CONTACT FOR ACCESS (Mailto) -->
    <x-partials.portfolio-item
        title="Custom Brand"
        subtitle="Client Work"
        category="web"
        color="#D946EF"
        type="contact"
        description="High profile client work. Contact me for a case study walk-through."
        :tags="['Vue', 'Design']"
    >
        <svg class="w-16 h-16 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
        </svg>
    </x-partials.portfolio-item>

</x-partials.portfolio-grid>
