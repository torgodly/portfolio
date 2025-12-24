<style>
    /* 1. MATRIX CANVAS */
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

    /* 2. SPOTLIGHT CARD */
    .spotlight-card {
        background-color: #121214;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        transform-style: preserve-3d;
    }
    .spotlight-card:hover { transform: translateY(-4px); }
    .spotlight-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: radial-gradient(800px circle at var(--mouse-x) var(--mouse-y), rgba(255,255,255,0.06), transparent 40%);
        z-index: 1;
        opacity: 0;
        transition: opacity 0.5s;
        pointer-events: none;
    }
    .spotlight-card:hover::before { opacity: 1; }
    .card-border {
        position: absolute;
        inset: 0;
        border-radius: inherit;
        padding: 1px;
        background: radial-gradient(600px circle at var(--mouse-x) var(--mouse-y), var(--spotlight-color, #38bdf8), transparent 40%);
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        pointer-events: none;
        z-index: 2;
        opacity: 0;
        transition: opacity 0.5s;
    }
    .spotlight-card:hover .card-border { opacity: 1; }

    /* 3. KONAMI: 3D MODE (Fixed Scrolling) */
    .debug-mode {
        height: 100vh;
        overflow: hidden;
        background: #020408;
        cursor: grab;
    }
    .debug-mode:active { cursor: grabbing; }

    /* The container that actually rotates */
    .debug-mode #viewport {
        perspective: 1200px;
        height: 100%;
        width: 100%;
        overflow-y: scroll; /* Scroll works here */
        overflow-x: hidden;
    }

    .debug-mode #app-container {
        transform-style: preserve-3d;
        transition: transform 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transform-origin: center 20vh; /* Better pivot point */
        padding-bottom: 200px;
    }

    /* EXPLODE EFFECT (Double Click) */
    .exploded #app-header { transform: translateZ(150px); filter: brightness(1.2); }
    .exploded #app-grid { transform: translateZ(50px); }
    .exploded #app-footer { transform: translateZ(100px); filter: brightness(1.2); }

    .exploded .spotlight-card {
        border: 1px solid rgba(255,255,255,0.2);
        box-shadow: 0 20px 50px rgba(0,0,0,0.8);
    }

    /* 4. BATMAN MODE (Advanced Visuals) */
    #batman-overlay {
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        z-index: 9999;
        pointer-events: none;
        opacity: 0;
        transition: opacity 1s ease;
    }
    /* The Glare Effect (Yellow Haze) */
    #batman-glare {
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        z-index: 9998;
        pointer-events: none;
        opacity: 0;
        transition: opacity 1s ease;
        background: radial-gradient(circle 400px at var(--spot-x) var(--spot-y), rgba(255, 230, 0, 0.15), transparent 70%);
        mix-blend-mode: screen;
    }

    /* Thunder Flash */
    #lightning-flash {
        position: fixed;
        inset: 0;
        background: white;
        z-index: 10000;
        opacity: 0;
        pointer-events: none;
    }
    .flash-active {
        animation: lightning 0.4s ease-out;
    }

    @keyframes lightning {
        0% { opacity: 0; }
        10% { opacity: 1; }
        20% { opacity: 0; }
        30% { opacity: 0.8; }
        100% { opacity: 0; }
    }

    .batman-active #batman-overlay { opacity: 0.9; }
    .batman-active #batman-glare { opacity: 1; }
    .batman-active body { background: black !important; }

    [x-cloak] { display: none !important; }
</style>
