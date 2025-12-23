<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Abdullah Alhajj | Full-Stack Architect' }}</title>
    <meta name="theme-color" content="#09090b">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Libraries -->
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
                            '0%, 100%': {transform: 'translateY(0)'},
                            '50%': {transform: 'translateY(-20px)'},
                        },
                        scan: {
                            '0%': {transform: 'translateX(-100%)'},
                            '50%': {transform: 'translateX(200%)'},
                            '100%': {transform: 'translateX(200%)'},
                        },
                        marquee: {
                            '0%': {transform: 'translateX(0)'},
                            '100%': {transform: 'translateX(-50%)'}, // Moves exactly 50% (the width of one set)
                        }
                    }
                }
            }
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Custom CSS -->
    <x-partials.styles/>
</head>

<body class="bg-background text-slate-300 antialiased selection:bg-sky-500/30 selection:text-sky-200 relative">

<!-- EASTER EGGS -->
<canvas id="matrix-canvas"></canvas>
<x-partials.batman-overlay/>

<!-- 3D WRAPPER -->
<div id="viewport">
    <div id="app-container" class="transition-all duration-500 ease-out">

        <!-- Ambient Background -->
        <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
            <div
                class="absolute inset-0 bg-[linear-gradient(to_right,#8080800a_1px,transparent_1px),linear-gradient(to_bottom,#8080800a_1px,transparent_1px)] bg-[size:24px_24px]"></div>
            <div
                class="absolute top-0 -left-4 w-72 h-72 bg-sky-500/10 rounded-full mix-blend-screen filter blur-3xl opacity-30 animate-float"></div>
            <div
                class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-500/10 rounded-full mix-blend-screen filter blur-3xl opacity-30 animate-float"
                style="animation-delay: 2s;"></div>
        </div>

        <div class="max-w-6xl mx-auto px-6 py-24 relative z-10">
            {{ $slot }}
        </div>

    </div>
</div>

<!-- MAIN LOGIC SCRIPTS -->
<x-partials.scripts/>
</body>
</html>
