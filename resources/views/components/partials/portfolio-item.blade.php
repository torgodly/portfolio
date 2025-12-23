@props([
    'title',
    'subtitle',
    'description',
    'category',
    'color' => '#6366f1',
    'tags' => [],
    'link' => null,
    'github' => null,
    'type' => 'website' // Options: website, private, internal, contact, concept
])

@php
    // --- 1. Robust Color Logic ---
    // This ensures 'orange', 'sky', or invalid hexes don't crash the page.
    // It maps common Tailwind names to Hex for the glow effect.
    $tailwindColors = [
        'orange' => 'f97316', 'sky' => '0ea5e9', 'emerald' => '10b981',
        'red' => 'ef4444', 'blue' => '3b82f6', 'indigo' => '6366f1',
        'purple' => 'a855f7', 'pink' => 'ec4899', 'yellow' => 'eab308'
    ];

    $cleanColor = ltrim($color, '#');

    if (array_key_exists($color, $tailwindColors)) {
        $hex = $tailwindColors[$color];
    } elseif (ctype_xdigit($cleanColor) && (strlen($cleanColor) == 3 || strlen($cleanColor) == 6)) {
        $hex = $cleanColor;
    } else {
        $hex = '6366f1'; // Fallback to Indigo if input is weird
    }

    // Convert to RGB
    if (strlen($hex) == 3) {
        $r = hexdec(str_repeat(substr($hex, 0, 1), 2));
        $g = hexdec(str_repeat(substr($hex, 1, 1), 2));
        $b = hexdec(str_repeat(substr($hex, 2, 1), 2));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }
    $rgb = "$r, $g, $b";

    // --- 2. Action Logic ---
    $isPrivate = in_array($type, ['private', 'internal']);
    $finalLink = $isPrivate ? null : $link;

    if ($type === 'contact' && !$link) {
        // Auto-generate mailto if specific link missing
        $finalLink = "mailto:me@example.com?subject=Inquiry about $title";
    }
@endphp

<article
    x-show="activeTab === 'all' || activeTab === '{{ $category }}'"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    class="spotlight-card group rounded-2xl border border-white/5 flex flex-col h-full relative overflow-hidden bg-[#131316]"
    style="
        --primary-color: #{{ $hex }};
        --primary-rgb: {{ $rgb }};
    "
>
    <!-- Border Glow -->
    <div class="absolute inset-0 z-0 border border-white/5 rounded-2xl group-hover:border-[rgba(var(--primary-rgb),0.5)] transition-colors duration-500"></div>

    <!-- Visual Area -->
    <div class="h-64 w-full bg-gradient-to-br from-[#1e1e24] to-[#0f0f12] relative overflow-hidden flex items-center justify-center group-hover:from-[rgba(var(--primary-rgb),0.1)] transition-colors duration-500">

        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-20 bg-[linear-gradient(45deg,transparent_25%,rgba(255,255,255,.05)_50%,transparent_75%,transparent_100%)] bg-[length:20px_20px]"></div>

        <!-- The Slot (Logo/Icon) -->
        <div class="relative z-10 transition duration-500 group-hover:scale-110 group-hover:-rotate-3 text-[var(--primary-color)] drop-shadow-2xl">
            {{ $slot }}
        </div>

        <!-- Status Badge (Top Left) -->
        @if($isPrivate)
            <div class="absolute top-4 left-4 px-2 py-1 bg-black/50 backdrop-blur border border-white/10 rounded text-[10px] uppercase font-bold tracking-widest text-slate-400 flex items-center gap-1.5">
                <div class="w-1.5 h-1.5 rounded-full bg-red-500"></div>
                Private
            </div>
        @elseif($type === 'concept')
            <div class="absolute top-4 left-4 px-2 py-1 bg-black/50 backdrop-blur border border-white/10 rounded text-[10px] uppercase font-bold tracking-widest text-slate-400 flex items-center gap-1.5">
                <div class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-pulse"></div>
                Concept
            </div>
        @endif
    </div>

    <!-- Content Area -->
    <div class="p-8 flex flex-col flex-1 relative z-10">

        <!-- Header & Actions -->
        <div class="flex justify-between items-start mb-4 gap-4">
            <div>
                <h3 class="text-xl font-bold text-white leading-tight">{{ $title }}</h3>
                <p class="text-xs font-mono mt-1 text-[var(--primary-color)] opacity-90">{{ $subtitle }}</p>
            </div>

            <!-- Action Buttons Area -->
            <div class="flex items-center gap-2">

                {{-- Github Link (Optional) --}}
                @if($github)
                    <a href="{{ $github }}" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/5 text-slate-400 hover:bg-white/10 hover:text-white transition" title="View Source Code">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                @endif

                {{-- Main Action Button --}}
                @if($isPrivate)
                    {{-- Private/Locked --}}
                    <div class="cursor-not-allowed group/lock relative">
                        <div class="w-8 h-8 flex items-center justify-center rounded-full bg-white/5 text-slate-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <span class="absolute top-full right-0 mt-2 w-max px-2 py-1 bg-black text-xs text-white rounded opacity-0 group-hover/lock:opacity-100 transition">Access Restricted</span>
                    </div>

                @elseif($type === 'contact')
                    {{-- Contact --}}
                    <a href="{{ $finalLink }}" class="w-8 h-8 flex items-center justify-center rounded-full bg-[rgba(var(--primary-rgb),0.1)] text-[var(--primary-color)] hover:scale-110 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </a>

                @else
                    {{-- Standard Link --}}
                    <a href="{{ $finalLink }}" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full border border-white/10 text-white hover:bg-white hover:text-black hover:border-white transition duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                @endif
            </div>
        </div>

        <p class="text-slate-400 text-sm leading-relaxed mb-6">
            {{ $description }}
        </p>

        <!-- Tags -->
        <div class="mt-auto pt-6 border-t border-white/5 flex flex-wrap gap-2">
            @foreach($tags as $tag)
                <span class="px-2 py-1 text-[10px] font-mono rounded bg-[rgba(var(--primary-rgb),0.05)] border border-[rgba(var(--primary-rgb),0.15)] text-[var(--primary-color)]">
                    #{{ $tag }}
                </span>
            @endforeach
        </div>
    </div>
</article>
