@props([
    'title',
    'subtitle',
    'description',
    'category',
    'color' => 'indigo', // Default theme color
    'tags' => [],
    'link' => null,      // Live Link
    'demo' => null,      // Demo Link
    'github' => null,    // Source Code
    'badge' => null,     // Manual Text Override
    'type' => 'website'  // options: website, saas, package, system, private
])

@php
    // --- 1. Color Themes (For Card Glow & Text) ---
    $colors = [
        'orange' => ['bg' => 'bg-orange-600', 'text' => 'text-orange-500', 'glow' => 'group-hover:shadow-orange-500/20'],
        'sky'    => ['bg' => 'bg-sky-600',    'text' => 'text-sky-500',    'glow' => 'group-hover:shadow-sky-500/20'],
        'emerald'=> ['bg' => 'bg-emerald-600','text' => 'text-emerald-500','glow' => 'group-hover:shadow-emerald-500/20'],
        'slate'  => ['bg' => 'bg-slate-600',  'text' => 'text-slate-400',  'glow' => 'group-hover:shadow-slate-500/20'],
        'indigo' => ['bg' => 'bg-indigo-600', 'text' => 'text-indigo-500', 'glow' => 'group-hover:shadow-indigo-500/20'],
        'pink'   => ['bg' => 'bg-pink-600',   'text' => 'text-pink-500',   'glow' => 'group-hover:shadow-pink-500/20'],
        'cyan'   => ['bg' => 'bg-cyan-600',   'text' => 'text-cyan-500',   'glow' => 'group-hover:shadow-cyan-500/20'],
    ];
    $theme = $colors[$color] ?? $colors['indigo'];

    // --- 2. Badge Logic (Strict Categories) ---
    $badgeConfig = [
        // 1. WEBSITES (Emerald/Green)
        'website' => [
            'label' => 'Website',
            'classes' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20',
            'dot' => 'bg-emerald-500',
            'pulse' => true
        ],
        // 2. SAAS (Indigo)
        'saas' => [
            'label' => 'SaaS',
            'classes' => 'bg-indigo-500/10 text-indigo-400 border-indigo-500/20',
            'dot' => 'bg-indigo-500',
            'pulse' => true
        ],
        // 3. PACKAGES (Pink)
        'package' => [
            'label' => 'Package',
            'classes' => 'bg-pink-500/10 text-pink-400 border-pink-500/20',
            'dot' => 'bg-pink-500',
            'pulse' => true
        ],
        // 4. SYSTEMS (Sky Blue - For Demos/Public)
        'system' => [
            'label' => 'System',
            'classes' => 'bg-sky-500/10 text-sky-400 border-sky-500/20',
            'dot' => 'bg-sky-500',
            'pulse' => true
        ],
        // 5. PRIVATE/INTERNAL (Slate/Grey - No Pulse)
        'private' => [
            'label' => 'Internal',
            'classes' => 'bg-slate-500/10 text-slate-400 border-slate-500/20',
            'dot' => 'bg-slate-500',
            'pulse' => false // Static dot for locked items
        ]
    ];

    $bConfig = $badgeConfig[$type] ?? $badgeConfig['website'];
    $finalLabel = $badge ?: $bConfig['label'];
@endphp

<article
    x-show="activeTab === 'all' || activeTab === '{{ $category }}'"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    class="group relative flex flex-col h-full rounded-3xl bg-[#0e0e11] border border-white/5 overflow-hidden hover:border-white/10 transition-all duration-500 hover:-translate-y-1 {{ $theme['glow'] }} hover:shadow-2xl"
>
    <!-- 1. Visual Top Area -->
    <div class="h-[220px] w-full relative overflow-hidden bg-[#131316] flex items-center justify-center">
        <!-- Grid Pattern -->
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 20px 20px;"></div>

        <!-- Glow Blob -->
        <div class="absolute w-[300px] h-[300px] rounded-full {{ $theme['bg'] }} opacity-5 blur-[80px] group-hover:opacity-10 transition-opacity duration-500"></div>

        <!-- Slot (Icon) -->
        <div class="relative z-10 transform transition-transform duration-500 group-hover:scale-110 group-hover:-rotate-2 {{ $theme['text'] }} drop-shadow-2xl">
            {{ $slot }}
        </div>

        <!-- BADGE (Top Right) -->
        <div class="absolute top-5 right-5">
            <div class="px-3 py-1.5 rounded-full border backdrop-blur-md flex items-center gap-2 shadow-lg {{ $bConfig['classes'] }}">
                <span class="relative flex h-2 w-2">
                    @if($bConfig['pulse'])
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full opacity-75 {{ $bConfig['dot'] }}"></span>
                    @endif
                    <span class="relative inline-flex rounded-full h-2 w-2 {{ $bConfig['dot'] }}"></span>
                </span>
                <span class="text-[10px] font-bold uppercase tracking-wider leading-none">
                    {{ $finalLabel }}
                </span>
            </div>
        </div>
    </div>

    <!-- 2. Content -->
    <div class="p-6 flex flex-col flex-1 relative z-20 bg-[#0e0e11]">
        <div class="mb-4">
            <h3 class="text-xl font-bold text-white tracking-tight mb-1">{{ $title }}</h3>
            <p class="text-xs font-mono {{ $theme['text'] }} uppercase tracking-wide opacity-90">{{ $subtitle }}</p>
        </div>

        <p class="text-gray-400 text-sm leading-relaxed mb-6 line-clamp-3">
            {{ $description }}
        </p>

        <!-- Tech Tags -->
        <div class="flex flex-wrap gap-2 mb-6 mt-auto">
            @foreach($tags as $tag)
                <span class="px-2.5 py-1 text-[10px] font-medium text-gray-300 bg-white/5 rounded-md border border-white/5 cursor-default">
                    {{ $tag }}
                </span>
            @endforeach
        </div>

        <!-- 3. Actions -->
        <div class="pt-5 border-t border-white/5 flex items-center gap-3">

            {{-- CASE: PRIVATE --}}
            @if($type === 'private')
                <div class="w-full h-10 flex items-center justify-center gap-2 rounded-lg bg-[#1a1a20] border border-white/5 text-gray-500 text-xs font-bold uppercase tracking-wider cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <span>Restricted Access</span>
                </div>

            @else
                {{-- CASE: PUBLIC --}}

                {{-- Main Button --}}
                @if($link)
                    <a href="{{ $link }}" target="_blank" class="flex-1 h-10 flex items-center justify-center gap-2 rounded-lg {{ $theme['bg'] }} hover:brightness-110 text-white text-xs font-bold uppercase tracking-wider transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                        <span>Visit Site</span>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                @elseif($demo)
                    <a href="{{ $demo }}" target="_blank" class="flex-1 h-10 flex items-center justify-center gap-2 rounded-lg {{ $theme['bg'] }} hover:brightness-110 text-white text-xs font-bold uppercase tracking-wider transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                        <span>Live Demo</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </a>
                @elseif($github)
                    <a href="{{ $github }}" target="_blank" class="flex-1 h-10 flex items-center justify-center gap-2 rounded-lg {{ $theme['bg'] }} hover:brightness-110 text-white text-xs font-bold uppercase tracking-wider transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                        <span>View Package</span>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                @endif

                {{-- Secondary Link --}}
                @if($link && $demo)
                    <a href="{{ $demo }}" target="_blank" class="h-10 px-4 flex items-center justify-center gap-2 rounded-lg bg-white/5 hover:bg-white/10 text-white text-xs font-bold uppercase tracking-wider transition-all border border-white/10" title="Try Demo">
                        <span>Demo</span>
                    </a>
                @endif

                {{-- Github Icon --}}
                @if($github && ($link || $demo))
                    <a href="{{ $github }}" target="_blank" class="h-10 w-10 flex items-center justify-center rounded-lg bg-[#1a1a20] hover:bg-white hover:text-black border border-white/5 text-gray-400 transition-all" title="View Source">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                @endif

            @endif
        </div>
    </div>
</article>
