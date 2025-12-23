<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Abdullah Alhajj | Full-Stack Architect</title>
    <meta name="theme-color" content="#09090b">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    colors: {
                        background: '#09090b',
                        surface: '#121214',
                    },
                    animation: {
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'scan': 'scan 8s linear infinite',
                        'marquee': 'marquee 40s linear infinite', // Smoother speed
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        scan: {
                            '0%': { transform: 'translateX(-100%)' },
                            '50%': { transform: 'translateX(200%)' },
                            '100%': { transform: 'translateX(200%)' },
                        },
                        marquee: {
                            '0%': { transform: 'translateX(0)' },
                            '100%': { transform: 'translateX(-50%)' }, // Moves exactly 50% (the width of one set)
                        }
                    }
                }
            }
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        /* 1. MATRIX BACKGROUND */
        #matrix-canvas {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: 0;
            opacity: 0;
            pointer-events: none;
            transition: opacity 1s ease;
        }
        .matrix-mode #matrix-canvas { opacity: 0.15; }
        .matrix-mode body { color: #22c55e !important; }
        .matrix-mode .spotlight-card { border-color: #22c55e; }
        .matrix-mode .text-slate-400 { color: #86efac !important; }

        /* 2. BATMAN SYSTEM */
        #batman-layer {
            position: fixed;
            inset: 0;
            z-index: 9999;
            pointer-events: none;
            opacity: 0;
            transition: opacity 1s ease;
        }
        .batman-active #batman-layer { opacity: 1; }
        .batman-active body { cursor: none; background: #000; }

        #bat-glare {
            filter: drop-shadow(0 0 20px #FFD700);
            opacity: 0.6;
            mix-blend-mode: screen;
        }

        #lightning {
            position: fixed;
            inset: 0;
            background: white;
            z-index: 10000;
            opacity: 0;
            pointer-events: none;
        }
        .flash-now { animation: flash 0.3s ease-out; }
        @keyframes flash { 0% { opacity: 0; } 10% { opacity: 1; } 100% { opacity: 0; } }

        /* 3. 3D ARCHITECT MODE */
        .debug-mode {
            background: #050505;
            overflow-x: hidden;
            perspective: 1000px;
        }
        .debug-mode #world {
            transform-style: preserve-3d;
            transition: transform 0.1s ease-out;
        }

        /* Explode Animation */
        .exploded header { transform: translateZ(150px); }
        .exploded #trust-bar { transform: translateZ(80px); } /* Reduced height z-index */
        .exploded #work-grid { transform: translateZ(50px); }
        .exploded footer { transform: translateZ(200px); }
        .exploded .spotlight-card {
            border: 1px solid rgba(255,255,255,0.3);
            box-shadow: 0 0 30px rgba(56, 189, 248, 0.2);
        }

        /* 4. CARD STYLING */
        .spotlight-card {
            background-color: #121214;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
            transform-style: preserve-3d;
        }
        .spotlight-card:hover { transform: translateY(-5px); }

        .card-border {
            position: absolute; inset: 0; border-radius: inherit; padding: 1px;
            background: radial-gradient(800px circle at var(--mouse-x) var(--mouse-y), var(--spot-color, #38bdf8), transparent 40%);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }

        /* 5. HOLOGRAPHIC TRUST BAR */
        .trust-logo {
            opacity: 0.4;
            filter: grayscale(100%);
            transition: all 0.4s ease;
        }
        .trust-logo:hover {
            opacity: 1;
            filter: grayscale(0%);
            transform: scale(1.1);
            text-shadow: 0 0 15px rgba(255,255,255,0.5);
        }

    </style>
</head>

<body class="bg-background text-slate-300 antialiased selection:bg-sky-500/30 selection:text-sky-200 relative">

<!-- EASTER EGG 1: Matrix Canvas -->
<canvas id="matrix-canvas"></canvas>

<!-- EASTER EGG 3: Batman Overlay -->
<div id="lightning"></div>
<svg id="batman-layer" width="100%" height="100%">
    <defs>
        <mask id="bat-mask">
            <rect width="100%" height="100%" fill="white"/>
            <g id="bat-shape">
                <path fill="black" d="M483.92 0S481.38 24.71 466 40.11c-11.74 11.74-24.09 12.66-40.26 15.07-9.42 1.41-29.7 3.77-34.81-.79-2.37-2.11-3-21-3.22-27.62-.21-6.92-1.36-16.52-2.82-18-.75 3.06-2.49 11.53-3.09 13.61S378.49 34.3 378 36a85.13 85.13 0 0 0-30.09 0c-.46-1.67-3.17-11.48-3.77-13.56s-2.34-10.55-3.09-13.61c-1.45 1.45-2.61 11.05-2.82 18-.21 6.67-.84 25.51-3.22 27.62-5.11 4.56-25.38 2.2-34.8.79-16.16-2.47-28.51-3.39-40.21-15.13C244.57 24.71 242 0 242 0H0s69.52 22.74 97.52 68.59c16.56 27.11 14.14 58.49 9.92 74.73C170 140 221.46 140 273 158.57c69.23 24.93 83.2 76.19 90 93.6 6.77-17.41 20.75-68.67 90-93.6 51.54-18.56 103-18.59 165.56-15.25-4.21-16.24-6.63-47.62 9.93-74.73C656.43 22.74 726 0 726 0z"/>
            </g>
        </mask>
    </defs>
    <rect width="100%" height="100%" fill="black" mask="url(#bat-mask)" opacity="0.98"/>
    <g id="bat-glare">
        <path fill="none" stroke="#FFD700" stroke-width="5" stroke-opacity="0.5" d="M483.92 0S481.38 24.71 466 40.11c-11.74 11.74-24.09 12.66-40.26 15.07-9.42 1.41-29.7 3.77-34.81-.79-2.37-2.11-3-21-3.22-27.62-.21-6.92-1.36-16.52-2.82-18-.75 3.06-2.49 11.53-3.09 13.61S378.49 34.3 378 36a85.13 85.13 0 0 0-30.09 0c-.46-1.67-3.17-11.48-3.77-13.56s-2.34-10.55-3.09-13.61c-1.45 1.45-2.61 11.05-2.82 18-.21 6.67-.84 25.51-3.22 27.62-5.11 4.56-25.38 2.2-34.8.79-16.16-2.47-28.51-3.39-40.21-15.13C244.57 24.71 242 0 242 0H0s69.52 22.74 97.52 68.59c16.56 27.11 14.14 58.49 9.92 74.73C170 140 221.46 140 273 158.57c69.23 24.93 83.2 76.19 90 93.6 6.77-17.41 20.75-68.67 90-93.6 51.54-18.56 103-18.59 165.56-15.25-4.21-16.24-6.63-47.62 9.93-74.73C656.43 22.74 726 0 726 0z"/>
    </g>
</svg>

<!-- MAIN WORLD CONTAINER -->
<div id="world">

    <!-- Ambient Background -->
    <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#8080800a_1px,transparent_1px),linear-gradient(to_bottom,#8080800a_1px,transparent_1px)] bg-[size:24px_24px]"></div>
        <div class="absolute top-0 -left-4 w-72 h-72 bg-sky-500/10 rounded-full mix-blend-screen filter blur-3xl opacity-30 animate-float"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-500/10 rounded-full mix-blend-screen filter blur-3xl opacity-30 animate-float" style="animation-delay: 2s;"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-24 relative z-10">

        <!-- HEADER -->
        <header class="mb-16 animate-fade-in transition-transform duration-500">
            <div class="flex items-center gap-6 mb-8">
                <!-- MATRIX TRIGGER -->
                <div class="relative size-20 group cursor-pointer" onclick="toggleMatrixMode()" title="Click to enter the Matrix">
                    <div class="absolute inset-0 bg-sky-500 rounded-full blur opacity-20 group-hover:opacity-50 transition duration-500 animate-pulse-slow"></div>
                    <img src="https://nunoguerra.com/imgs/nuno_guerra.jpg" class="relative rounded-full border border-white/10 shadow-2xl transition duration-500 group-hover:scale-105" alt="Abdullah">
                    <div class="absolute bottom-1 right-1 size-4 bg-emerald-500 border-4 border-[#050505] rounded-full"></div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white font-mono cursor-default" data-value="Abdullah Alhajj" onmouseover="hackEffect(event)">Abdullah Alhajj</h2>
                    <p class="text-sm text-slate-400 font-mono mt-1">Libya, Tripoli • <span class="text-emerald-400">Available Q1 2026</span></p>
                </div>
            </div>

            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-white mb-8 leading-[1.1]">
                Architecting <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-indigo-400 to-purple-400">Scalable SaaS</span> <br>
                & Digital Experiences.
            </h1>

            <p class="text-lg text-slate-400 max-w-2xl leading-relaxed">
                I don't just write code; I engineer resilient systems. From complex
                <span class="text-slate-200 font-medium border-b border-white/10">Laravel backends</span> to pixel-perfect
                <span class="text-slate-200 font-medium border-b border-white/10">Front-end interfaces</span>.
                Helping founders and businesses ship production-grade software.
            </p>

            <div class="mt-10 flex flex-wrap gap-3">
                <div class="px-3 py-1 rounded-full border border-white/10 bg-white/5 text-xs font-mono text-sky-300">Laravel</div>
                <div class="px-3 py-1 rounded-full border border-white/10 bg-white/5 text-xs font-mono text-amber-300">Filament</div>
                <div class="px-3 py-1 rounded-full border border-white/10 bg-white/5 text-xs font-mono text-pink-300">Livewire</div>
                <div class="px-3 py-1 rounded-full border border-white/10 bg-white/5 text-xs font-mono text-emerald-300">Vue.js</div>
                <div class="px-3 py-1 rounded-full border border-white/10 bg-white/5 text-xs font-mono text-blue-300">Docker</div>
            </div>
        </header>

        <!-- THE HOLOGRAPHIC TRUST BAR (New & Sleek) -->
        <!-- TRUSTED BY (The Infinite Stream) -->
        <section id="trust-bar" class="mb-24 py-10 border-y border-white/5 bg-slate-900/40 relative overflow-hidden transition-transform duration-500">

            <!-- 1. The Scanner Beam (Subtle light passing over) -->
            <div class="absolute inset-y-0 left-0 w-1/3 bg-gradient-to-r from-transparent via-sky-500/10 to-transparent -skew-x-12 animate-scan pointer-events-none z-10"></div>

            <!-- 2. The Fade Masks (Left & Right edges) -->
            <div class="absolute inset-y-0 left-0 w-24 bg-gradient-to-r from-[#09090b] to-transparent z-20"></div>
            <div class="absolute inset-y-0 right-0 w-24 bg-gradient-to-l from-[#09090b] to-transparent z-20"></div>

            <div class="max-w-7xl mx-auto px-6">
                <p class="text-center text-xs font-bold font-mono text-slate-500 mb-8 uppercase tracking-[0.2em] opacity-80">Powering Next-Gen Systems For</p>

                <!-- 3. The Scrolling Track -->
                <div class="flex overflow-hidden relative select-none">
                    <div class="flex whitespace-nowrap animate-marquee gap-20 items-center hover:[animation-play-state:paused]">

                        <!-- --- ORIGINAL SET --- -->

                        <!-- LOGO 1: Al-Madina -->
                        <div class="trust-logo flex items-center gap-4 cursor-pointer group opacity-70 hover:opacity-100 transition-all duration-300">
                            <div class="w-10 h-10 rounded-lg bg-sky-500/10 text-sky-400 flex items-center justify-center border border-sky-500/20 group-hover:bg-sky-500 group-hover:text-white group-hover:shadow-[0_0_15px_rgba(14,165,233,0.5)] transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <span class="text-lg font-bold tracking-widest text-slate-400 group-hover:text-white transition-colors">AL-MADINA</span>
                        </div>

                        <!-- LOGO 2: Orbit -->
                        <div class="trust-logo flex items-center gap-4 cursor-pointer group opacity-70 hover:opacity-100 transition-all duration-300">
                            <div class="w-10 h-10 rounded-full bg-purple-500/10 text-purple-400 flex items-center justify-center border border-purple-500/20 group-hover:bg-purple-500 group-hover:text-white group-hover:shadow-[0_0_15px_rgba(168,85,247,0.5)] transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <span class="text-lg font-bold tracking-widest text-slate-400 group-hover:text-white transition-colors">ORBIT TECH</span>
                        </div>

                        <!-- LOGO 3: Nexus -->
                        <div class="trust-logo flex items-center gap-4 cursor-pointer group opacity-70 hover:opacity-100 transition-all duration-300">
                            <div class="w-10 h-10 rounded bg-emerald-500/10 text-emerald-400 flex items-center justify-center border border-emerald-500/20 group-hover:bg-emerald-500 group-hover:text-white group-hover:shadow-[0_0_15px_rgba(16,185,129,0.5)] transition-all transform rotate-45 group-hover:rotate-0">
                                <svg class="w-6 h-6 transform -rotate-45 group-hover:rotate-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <span class="text-lg font-bold tracking-widest text-slate-400 group-hover:text-white transition-colors">NEXUS LIBYA</span>
                        </div>

                        <!-- LOGO 4: Estate -->
                        <div class="trust-logo flex items-center gap-4 cursor-pointer group opacity-70 hover:opacity-100 transition-all duration-300">
                            <div class="w-10 h-10 rounded-lg bg-amber-500/10 text-amber-400 flex items-center justify-center border border-amber-500/20 group-hover:bg-amber-500 group-hover:text-white group-hover:shadow-[0_0_15px_rgba(245,158,11,0.5)] transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <span class="text-lg font-bold tracking-widest text-slate-400 group-hover:text-white transition-colors">ESTATE.IO</span>
                        </div>

                        <!-- --- DUPLICATE SET (For smooth looping) --- -->

                        <div class="trust-logo flex items-center gap-4 cursor-pointer group opacity-70 hover:opacity-100 transition-all duration-300">
                            <div class="w-10 h-10 rounded-lg bg-sky-500/10 text-sky-400 flex items-center justify-center border border-sky-500/20 group-hover:bg-sky-500 group-hover:text-white group-hover:shadow-[0_0_15px_rgba(14,165,233,0.5)] transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <span class="text-lg font-bold tracking-widest text-slate-400 group-hover:text-white transition-colors">AL-MADINA</span>
                        </div>

                        <div class="trust-logo flex items-center gap-4 cursor-pointer group opacity-70 hover:opacity-100 transition-all duration-300">
                            <div class="w-10 h-10 rounded-full bg-purple-500/10 text-purple-400 flex items-center justify-center border border-purple-500/20 group-hover:bg-purple-500 group-hover:text-white group-hover:shadow-[0_0_15px_rgba(168,85,247,0.5)] transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <span class="text-lg font-bold tracking-widest text-slate-400 group-hover:text-white transition-colors">ORBIT TECH</span>
                        </div>

                        <div class="trust-logo flex items-center gap-4 cursor-pointer group opacity-70 hover:opacity-100 transition-all duration-300">
                            <div class="w-10 h-10 rounded bg-emerald-500/10 text-emerald-400 flex items-center justify-center border border-emerald-500/20 group-hover:bg-emerald-500 group-hover:text-white group-hover:shadow-[0_0_15px_rgba(16,185,129,0.5)] transition-all transform rotate-45 group-hover:rotate-0">
                                <svg class="w-6 h-6 transform -rotate-45 group-hover:rotate-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <span class="text-lg font-bold tracking-widest text-slate-400 group-hover:text-white transition-colors">NEXUS LIBYA</span>
                        </div>

                        <div class="trust-logo flex items-center gap-4 cursor-pointer group opacity-70 hover:opacity-100 transition-all duration-300">
                            <div class="w-10 h-10 rounded-lg bg-amber-500/10 text-amber-400 flex items-center justify-center border border-amber-500/20 group-hover:bg-amber-500 group-hover:text-white group-hover:shadow-[0_0_15px_rgba(245,158,11,0.5)] transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <span class="text-lg font-bold tracking-widest text-slate-400 group-hover:text-white transition-colors">ESTATE.IO</span>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- WORKS SECTION -->
        <main id="work-grid" x-data="{ activeTab: 'all' }" class="min-h-[600px] relative z-20 transition-transform duration-500">

            <!-- Controls -->
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-10 gap-4 border-b border-white/5 pb-6">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="w-1 h-6 bg-sky-500 rounded-full"></span>
                    Selected Works
                </h2>

                <div class="flex p-1 bg-surface/50 rounded-lg border border-white/5 backdrop-blur-sm">
                    <button @click="activeTab = 'all'" :class="activeTab === 'all' ? 'bg-white/10 text-white shadow' : 'text-slate-500 hover:text-slate-300'" class="px-4 py-2 text-sm font-medium rounded-md transition-all">All</button>
                    <button @click="activeTab = 'saas'" :class="activeTab === 'saas' ? 'bg-white/10 text-white shadow' : 'text-slate-500 hover:text-slate-300'" class="px-4 py-2 text-sm font-medium rounded-md transition-all">SaaS</button>
                    <button @click="activeTab = 'internal'" :class="activeTab === 'internal' ? 'bg-white/10 text-white shadow' : 'text-slate-500 hover:text-slate-300'" class="px-4 py-2 text-sm font-medium rounded-md transition-all">Systems</button>
                    <button @click="activeTab = 'web'" :class="activeTab === 'web' ? 'bg-white/10 text-white shadow' : 'text-slate-500 hover:text-slate-300'" class="px-4 py-2 text-sm font-medium rounded-md transition-all">Web</button>
                </div>
            </div>

            <!-- GRID -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="card-container">

                <!-- CARD 1: SaaS (Flagship) -->
                <article x-show="activeTab === 'all' || activeTab === 'saas'" class="spotlight-card group rounded-2xl border border-white/5 flex flex-col h-full lg:col-span-2" style="--spot-color: rgba(99, 102, 241, 0.5);">
                    <div class="card-border"></div>
                    <div class="h-64 w-full bg-gradient-to-br from-[#1e1e24] to-[#0f0f12] relative overflow-hidden flex items-center justify-center group-hover:from-indigo-900/20 transition-colors duration-500">
                        <div class="absolute inset-0 opacity-20 bg-[linear-gradient(45deg,transparent_25%,rgba(99,102,241,.1)_50%,transparent_75%,transparent_100%)] bg-[length:20px_20px]"></div>
                        <h3 class="relative z-10 text-4xl font-black text-white tracking-tighter group-hover:scale-110 transition duration-500">NEXA<span class="text-indigo-500">.</span></h3>
                    </div>
                    <div class="p-8 flex flex-col flex-1">
                        <h3 class="text-xl font-bold text-white mb-2">Nexa SaaS Boilerplate</h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6">Production-ready multi-tenant architecture handling subscriptions, teams, and API keys.</p>
                        <div class="mt-auto pt-6 border-t border-white/5 flex flex-wrap gap-2">
                            <span class="px-2 py-1 text-[10px] font-mono rounded bg-white/5 text-indigo-300 border border-white/5">#Laravel</span>
                            <span class="px-2 py-1 text-[10px] font-mono rounded bg-white/5 text-slate-400 border border-white/5">#Filament</span>
                        </div>
                    </div>
                </article>

                <!-- CARD 2: System -->
                <article x-show="activeTab === 'all' || activeTab === 'internal'" class="spotlight-card group rounded-2xl border border-white/5 flex flex-col h-full" style="--spot-color: rgba(16, 185, 129, 0.5);">
                    <div class="card-border"></div>
                    <div class="h-64 w-full bg-gradient-to-br from-[#1e1e24] to-[#0f0f12] relative flex items-center justify-center group-hover:from-emerald-900/20 transition-colors duration-500">
                        <svg class="w-16 h-16 text-emerald-500 drop-shadow-lg group-hover:scale-110 transition duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="p-8 flex flex-col flex-1">
                        <h3 class="text-xl font-bold text-white mb-2">Libya Oil CRM</h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6">Digitized 5,000+ daily paper records into a real-time Livewire app.</p>
                        <div class="mt-auto pt-6 border-t border-white/5 flex flex-wrap gap-2">
                            <span class="px-2 py-1 text-[10px] font-mono rounded bg-white/5 text-emerald-300 border border-white/5">#Livewire</span>
                        </div>
                    </div>
                </article>

                <!-- CARD 3: Web -->
                <article x-show="activeTab === 'all' || activeTab === 'web'" class="spotlight-card group rounded-2xl border border-white/5 flex flex-col h-full" style="--spot-color: rgba(249, 115, 22, 0.5);">
                    <div class="card-border"></div>
                    <div class="h-64 w-full bg-gradient-to-br from-[#1e1e24] to-[#0f0f12] relative flex items-center justify-center group-hover:from-orange-900/20 transition-colors duration-500">
                        <div class="size-20 rounded-xl bg-orange-500 flex items-center justify-center text-black font-bold text-3xl shadow-lg rotate-3 group-hover:rotate-6 transition">TM</div>
                    </div>
                    <div class="p-8 flex flex-col flex-1">
                        <h3 class="text-xl font-bold text-white mb-2">Tripoli Market</h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6">High-performance storefront with SMS notifications and local payments.</p>
                        <div class="mt-auto pt-6 border-t border-white/5 flex flex-wrap gap-2">
                            <span class="px-2 py-1 text-[10px] font-mono rounded bg-white/5 text-orange-300 border border-white/5">#Vue</span>
                        </div>
                    </div>
                </article>

                <!-- CARD 4: System -->
                <article x-show="activeTab === 'all' || activeTab === 'internal'" class="spotlight-card group rounded-2xl border border-white/5 flex flex-col h-full" style="--spot-color: rgba(56, 189, 248, 0.5);">
                    <div class="card-border"></div>
                    <div class="h-64 w-full bg-gradient-to-br from-[#1e1e24] to-[#0f0f12] relative flex items-center justify-center group-hover:from-sky-900/20 transition-colors duration-500">
                        <svg class="w-16 h-16 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <div class="p-8 flex flex-col flex-1">
                        <h3 class="text-xl font-bold text-white mb-2">EstateAdmin</h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6">Dashboard for tracking 200+ rental properties and tenant contracts.</p>
                        <div class="mt-auto pt-6 border-t border-white/5 flex flex-wrap gap-2">
                            <span class="px-2 py-1 text-[10px] font-mono rounded bg-white/5 text-sky-300 border border-white/5">#Laravel</span>
                        </div>
                    </div>
                </article>

            </div>
        </main>

        <footer class="mt-32 border-t border-white/5 pt-16 pb-12 text-center relative z-20 transition-transform duration-500">
            <h3 class="text-2xl font-bold text-white mb-6">Ready to build something legendary?</h3>
            <a href="mailto:torgodly@gmail.com" class="inline-flex h-12 items-center justify-center rounded-full bg-white px-8 font-bold text-slate-900 transition hover:bg-slate-200">
                Let's Chat
            </a>
            <p class="mt-12 text-xs text-slate-600 font-mono">&copy; 2025 Abdullah Alhajj. Tripoli, Libya.</p>
        </footer>

    </div>
</div>

<!-- SCRIPTS -->
<script>

    const cards = document.querySelectorAll('.spotlight-card');
    const batShape = document.getElementById('bat-shape');
    const batGlare = document.getElementById('bat-glare');

    // MOUSE MOVEMENT
    document.addEventListener('mousemove', e => {
        const x = e.clientX;
        const y = e.clientY;

        // Cards Spotlight
        for(const card of cards) {
            const rect = card.getBoundingClientRect();
            card.style.setProperty("--mouse-x", `${x - rect.left}px`);
            card.style.setProperty("--mouse-y", `${y - rect.top}px`);
        }

        // Batman Light Move (Centered on cursor)
        if(document.body.classList.contains('batman-active')) {
            const transform = `translate(${x - (363*2.5)}, ${y - (126*2.5)}) scale(2.5)`;
            batShape.setAttribute('transform', transform);
            batGlare.setAttribute('transform', transform);
        }

        // 3D Tilt Logic
        if(document.body.classList.contains('debug-mode')) {
            const centerX = window.innerWidth / 2;
            const centerY = window.innerHeight / 2;
            const tiltX = (y - centerY) / 50;
            const tiltY = (centerX - x) / 50;
            document.getElementById('world').style.transform = `rotateX(${tiltX}deg) rotateY(${tiltY}deg)`;
        }
    });

    // CLICKS
    document.addEventListener('mousedown', () => {
        if(document.body.classList.contains('batman-active')) {
            const flash = document.getElementById('lightning');
            flash.classList.add('flash-now');
            setTimeout(() => flash.classList.remove('flash-now'), 300);
        }
    });

    document.addEventListener('dblclick', () => {
        if(document.body.classList.contains('debug-mode')) {
            document.body.classList.toggle('exploded');
        }
    });

    // KEYS
    const konami = ['ArrowUp','ArrowUp','ArrowDown','ArrowDown','ArrowLeft','ArrowRight','ArrowLeft','ArrowRight','b','a'];
    let kIdx = 0;
    let bStr = "";

    document.addEventListener('keydown', e => {
        if (e.key.toLowerCase() === konami[kIdx].toLowerCase()) {
            kIdx++;
            if (kIdx === konami.length) { toggle3D(); kIdx = 0; }
        } else { kIdx = 0; }

        bStr += e.key.toLowerCase();
        if(bStr.includes("batman")) { toggleBatman(); bStr = ""; }
        if(bStr.length > 10) bStr = bStr.slice(-10);
    });

    function toggle3D() {
        document.body.classList.toggle('debug-mode');
        if(!document.body.classList.contains('debug-mode')) {
            document.getElementById('world').style.transform = 'none';
            document.body.classList.remove('exploded');
        }
    }

    function toggleBatman() {
        document.body.classList.add('batman-active');
        setTimeout(() => document.body.classList.remove('batman-active'), 10000);
    }

    // HACKER TEXT
    function hackEffect(event) {
        const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        let iter = 0;
        const el = event.target;
        const original = el.dataset.value;
        clearInterval(el.interval);
        el.interval = setInterval(() => {
            el.innerText = original.split("").map((l, i) => {
                if(i < iter) return original[i];
                return chars[Math.floor(Math.random() * 26)];
            }).join("");
            if(iter >= original.length) clearInterval(el.interval);
            iter += 1/3;
        }, 30);
    }

    // MATRIX
    let matrixOn = false;
    function toggleMatrixMode() {
        matrixOn = !matrixOn;
        document.body.classList.toggle('matrix-mode');
        if(matrixOn) initMatrix();
        else {
            const ctx = document.getElementById('matrix-canvas').getContext('2d');
            ctx.clearRect(0,0,window.innerWidth, window.innerHeight);
        }
    }
    function initMatrix() {
        const c = document.getElementById('matrix-canvas');
        const ctx = c.getContext('2d');
        c.width = window.innerWidth; c.height = window.innerHeight;
        const cols = c.width/16;
        const drops = Array(Math.floor(cols)).fill(1);
        const draw = () => {
            if(!matrixOn) return;
            ctx.fillStyle = 'rgba(0,0,0,0.05)';
            ctx.fillRect(0,0,c.width,c.height);
            ctx.fillStyle = '#0F0';
            ctx.font = '16px monospace';
            drops.forEach((y, i) => {
                ctx.fillText(Math.random() > 0.5 ? '1' : '0', i*16, y*16);
                if(y*16 > c.height && Math.random() > 0.975) drops[i] = 0;
                drops[i]++;
            });
        };
        setInterval(draw, 33);
    }

    // --- CONSOLE ART (VISUAL MASTERPIECE) ---
    console.clear();

    // 1. The Giant Yellow Batman Logo
    const batLogoYellow = `data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA3MjYgMjUyLjE3Ij48cGF0aCBmaWxsPSIjRkZENzAwIiBkPSJNNDgzLjkyIDBTNDgxLjM4IDI0LjcxIDQ2NiA0MC4xMWMtMTEuNzQgMTEuNzQtMjQuMDkgMTIuNjYtNDAuMjYgMTUuMDctOS40MiAxLjQxLTI5LjcgMy43Ny0zNC44MS0uNzktMi4zNy0yLjExLTMtMjEtMy4yMi0yNy42Mi0uMjEtNi45Mi0xLjM2LTE2LjUyLTIuODItMTgtLjc1IDMuMDYtMi40OSAxMS41My0zLjA5IDEzLjYxUzM3OC40OSAzNC4zIDM3OCAzNmE4NS4xMyA4NS4xMyAwIDAgMC0zMC4wOSAwYy0uNDYtMS42Ny0zLjE3LTExLjQ4LTMuNzctMTMuNTZzLTIuMzQtMTAuNTUtMy4wOS0xMy42MWMtMS40NSAxLjQ1LTIuNjEgMTEuMDUtMi44MiAxOC0uMjEgNi42Ny0uODQgMjUuNTEtMy4yMiAyNy42Mi01LjExIDQuNTYtMjUuMzggMi4yLTM0LjguNzktMTYuMTYtMi40Ny0yOC41MS0zLjM5LTQwLjIxLTE1LjEzQzI0NC41NyAyNC43MSAyNDIgMCAyNDIgMEgwczY5LjUyIDIyLjc0IDk3LjUyIDY4LjU5YzE2LjU2IDI3LjExIDE0LjE0IDU4LjQ5IDkuOTIgNzQuNzNDMTcwIDE0MCAyMjEuNDYgMTQwIDI3MyAxNTguNTdjNjkuMjMgMjQuOTMgODMuMiA3Ni4xOSA5MCA5My42IDYuNzctMTcuNDEgMjAuNzUtNjguNjcgOTAtOTMuNiA1MS41NC0xOC41NiAxMDMtMTguNTkgMTY1LjU2LTE1LjI1LTQuMjEtMTYuMjQtNi42My00Ny42MiA5LjkzLTc0LjczQzY1Ni40MyAyMi43NCA3MjYgMCA3MjYgMHoiLz48L3N2Zz4=`;

    const logoStyle = `
            font-size: 1px;
            padding: 50px 125px;
            background-image: url('${batLogoYellow}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        `;

    // 2. The Neon Text (Visual)
    console.log("%c ", logoStyle);
    console.log(
        "%cABDULLAH ALHAJJ",
        "font-weight: 900; font-size: 50px; color: transparent; -webkit-text-stroke: 1px #FFD700; text-shadow: 0 0 10px rgba(255, 215, 0, 0.5); font-family: 'Segoe UI', sans-serif;"
    );
    console.log("%cFULL-STACK ARCHITECT", "font-family: monospace; font-size: 14px; color: #fff; background: #333; padding: 4px 8px;");
</script>
</body>
</html>
