@props(['categories' => [
    'all' => 'All',
    'saas' => 'SaaS',
    'internal' => 'Systems',
    'web' => 'Web'
]])

<main id="app-grid" x-data="{ activeTab: 'all' }" class="min-h-[600px] relative z-20">

    <!-- Controls -->
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-10 gap-4 border-b border-white/5 pb-6">
        <h2 class="text-2xl font-bold text-white flex items-center gap-3">
            <span class="w-1 h-6 bg-sky-500 rounded-full"></span>
            Selected Works
        </h2>

        <div class="flex p-1 bg-surface/50 rounded-lg border border-white/5 backdrop-blur-sm self-start sm:self-auto">
            @foreach($categories as $key => $label)
                <button
                    @click="activeTab = '{{ $key }}'"
                    :class="activeTab === '{{ $key }}' ? 'bg-white/10 text-white shadow' : 'text-slate-500 hover:text-slate-300'"
                    class="px-4 py-2 text-sm font-medium rounded-md transition-all"
                >
                    {{ $label }}
                </button>
            @endforeach
        </div>
    </div>

    <!-- GRID Container -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="card-container">
        {{ $slot }}
    </div>
</main>
