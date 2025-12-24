<script>
    // 1. SPOTLIGHT EFFECT & MOUSE TRACKING
    const container = document.getElementById('card-container');
    const cards = document.querySelectorAll('.spotlight-card');
    const batmanGroup = document.getElementById('bat-shape');
    const batmanGlare = document.getElementById('batman-glare');

    let mouseX = 0;
    let mouseY = 0;

    // 3D Control Variables
    let is3DActive = false;
    let isDragging = false;
    let startX = 0, startY = 0;
    let rotateX = 20, rotateY = 0;

    document.addEventListener('mousemove', e => {
        mouseX = e.clientX;
        mouseY = e.clientY;

        // Standard Card Spotlight
        for(const card of cards) {
            const rect = card.getBoundingClientRect();
            card.style.setProperty("--mouse-x", `${mouseX - rect.left}px`);
            card.style.setProperty("--mouse-y", `${mouseY - rect.top}px`);
        }

        // Batman Move
        if(document.body.classList.contains('batman-active')) {
            // Move the SVG Mask Shape (Centered on cursor)
            // Note: The shape path is offset, so we adjust translation.
            // Scale is 1.5 to make it big as requested
            batmanGroup.setAttribute('transform', `translate(${mouseX - 363}, ${mouseY - 126}) scale(1)`);

            // Move the glare
            batmanGlare.style.setProperty("--spot-x", `${mouseX}px`);
            batmanGlare.style.setProperty("--spot-y", `${mouseY}px`);
        }

        // 3D Drag
        if(is3DActive && isDragging) {
            let deltaX = e.clientX - startX;
            let deltaY = e.clientY - startY;
            rotateY += deltaX * 0.1;
            rotateX -= deltaY * 0.1;
            document.getElementById('app-container').style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
            startX = e.clientX;
            startY = e.clientY;
        } else if (is3DActive) {
            // Gentle tilt on mouse move if not dragging
            let tiltX = (window.innerHeight/2 - mouseY) / 50;
            let tiltY = (mouseX - window.innerWidth/2) / 50;
            // document.getElementById('app-container').style.transform = `rotateX(${20 + tiltX}deg) rotateY(${tiltY}deg)`;
        }
    });

    // 3D Mouse Controls (Drag to spin)
    document.addEventListener('mousedown', e => {
        // Check for Batman Click
        if(document.body.classList.contains('batman-active')) {
            triggerLightning();
        }

        if(is3DActive) {
            isDragging = true;
            startX = e.clientX;
            startY = e.clientY;
            document.body.style.cursor = 'grabbing';
        }
    });

    document.addEventListener('mouseup', () => {
        isDragging = false;
        if(is3DActive) document.body.style.cursor = 'grab';
    });

    document.addEventListener('dblclick', () => {
        if(is3DActive) {
            document.body.classList.toggle('exploded');
        }
    });

    // 2. HACKER TEXT EFFECT
    const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    function hackEffect(event) {
        let iteration = 0;
        const target = event.target;
        const originalText = target.dataset.value;
        clearInterval(target.interval);
        target.interval = setInterval(() => {
            target.innerText = originalText.split("").map((letter, index) => {
                if(index < iteration) return originalText[index];
                return letters[Math.floor(Math.random() * 26)]
            }).join("");
            if(iteration >= originalText.length) clearInterval(target.interval);
            iteration += 1 / 3;
        }, 30);
    }

    // 3. MATRIX EASTER EGG
    let matrixActive = false;
    function toggleMatrixMode() {
        const body = document.body;
        matrixActive = !matrixActive;
        if (matrixActive) {
            body.classList.add('matrix-mode');
            initMatrix();
        } else {
            body.classList.remove('matrix-mode');
            const canvas = document.getElementById('matrix-canvas');
            const ctx = canvas.getContext('2d');
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }
    }
    function initMatrix() {
        const canvas = document.getElementById('matrix-canvas');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        const alphabet = '01';
        const fontSize = 16;
        const columns = canvas.width/fontSize;
        const rainDrops = [];
        for( let x = 0; x < columns; x++ ) { rainDrops[x] = 1; }
        const draw = () => {
            if (!matrixActive) return;
            ctx.fillStyle = 'rgba(0, 0, 0, 0.05)';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            ctx.fillStyle = '#0F0';
            ctx.font = fontSize + 'px monospace';
            for(let i = 0; i < rainDrops.length; i++) {
                const text = alphabet.charAt(Math.floor(Math.random() * alphabet.length));
                ctx.fillText(text, i*fontSize, rainDrops[i]*fontSize);
                if(rainDrops[i]*fontSize > canvas.height && Math.random() > 0.975){ rainDrops[i] = 0; }
                rainDrops[i]++;
            }
        };
        setInterval(draw, 30);
    }

    // 4. KONAMI CODE & BATMAN
    const konamiCode = ['ArrowUp','ArrowUp','ArrowDown','ArrowDown','ArrowLeft','ArrowLeft','ArrowRight','ArrowRight'];
    let konamiIndex = 0;
    let batmanString = "";

    document.addEventListener('keydown', (e) => {
        if (e.key.toLowerCase() === konamiCode[konamiIndex].toLowerCase()) {
            konamiIndex++;
            if (konamiIndex === konamiCode.length) {
                toggle3DMode();
                konamiIndex = 0;
            }
        } else {
            konamiIndex = 0;
        }

        batmanString += e.key.toLowerCase();
        if (batmanString.includes("batman")) {
            activateBatman();
            batmanString = "";
        }
        if (batmanString.length > 10) batmanString = batmanString.slice(-10);
    });

    function toggle3DMode() {
        document.body.classList.toggle('debug-mode');
        is3DActive = document.body.classList.contains('debug-mode');
        const container = document.getElementById('app-container');

        if(is3DActive) {
            container.style.transform = `rotateX(20deg) rotateY(0deg)`;
        } else {
            container.style.transform = 'none';
            document.body.classList.remove('exploded');
        }
    }

    function activateBatman() {
        document.body.classList.add('batman-active');
        setTimeout(() => {
            document.body.classList.remove('batman-active');
        }, 10000);
    }

    function triggerLightning() {
        const flash = document.getElementById('lightning-flash');
        flash.classList.add('flash-active');
        setTimeout(() => {
            flash.classList.remove('flash-active');
        }, 400); // 0.4s matches CSS animation
    }

    // 5. GOD TIER VISUAL CONSOLE (IMAGE RENDER)
    // Note: We use SVG data URI to render a complex badge in the console
    // --------------------------------------------------
    //  THE BATMAN CONSOLE SIGNAL
    // --------------------------------------------------
    console.clear();

    // 1. The Setup
    // We convert your SVG into a Data URI so it can render in the console
    const batLogoURI = `data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA3MjYgMjUyLjE3Ij48cGF0aCBmaWxsPSIjRkZENzAwIiBkPSJNNDgzLjkyIDBTNDgxLjM4IDI0LjcxIDQ2NiA0MC4xMWMtMTEuNzQgMTEuNzQtMjQuMDkgMTIuNjYtNDAuMjYgMTUuMDctOS40MiAxLjQxLTI5LjcgMy43Ny0zNC44MS0uNzktMi4zNy0yLjExLTMtMjEtMy4yMi0yNy42Mi0uMjEtNi45Mi0xLjM2LTE2LjUyLTIuODItMTgtLjc1IDMuMDYtMi40OSAxMS41My0zLjA5IDEzLjYxUzM3OC40OSAzNC4zIDM3OCAzNmE4NS4xMyA4NS4xMyAwIDAgMC0zMC4wOSAwYy0uNDYtMS42Ny0zLjE3LTExLjQ4LTMuNzctMTMuNTZzLTIuMzQtMTAuNTUtMy4wOS0xMy42MWMtMS40NSAxLjQ1LTIuNjEgMTEuMDUtMi44MiAxOC0uMjEgNi42Ny0uODQgMjUuNTEtMy4yMiAyNy42Mi01LjExIDQuNTYtMjUuMzggMi4yLTM0LjguNzktMTYuMTYtMi40Ny0yOC41MS0zLjM5LTQwLjIxLTE1LjEzQzI0NC41NyAyNC43MSAyNDIgMCAyNDIgMEgwczY5LjUyIDIyLjc0IDk3LjUyIDY4LjU5YzE2LjU2IDI3LjExIDE0LjE0IDU4LjQ5IDkuOTIgNzQuNzNDMTcwIDE0MCAyMjEuNDYgMTQwIDI3MyAxNTguNTdjNjkuMjMgMjQuOTMgODMuMiA3Ni4xOSA5MCA5My42IDYuNzctMTcuNDEgMjAuNzUtNjguNjcgOTAtOTMuNiA1MS41NC0xOC41NiAxMDMtMTguNTkgMTY1LjU2LTE1LjI1LTQuMjEtMTYuMjQtNi42My00Ny42MiA5LjkzLTc0LjczQzY1Ni40MyAyMi43NCA3MjYgMCA3MjYgMHoiLz48L3N2Zz4=`;

    // 2. The Visual Style
    // We use padding to create "space" for the background image to show
    const visualStyle = `
        font-size: 1px;
        padding: 80px 150px;
        background-image: url('${batLogoURI}');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        color: transparent;
    `;

    // 3. The Text Style (Modern & Clean)
    const textStyle = `
        font-family: 'Arial Black', sans-serif;
        font-weight: 900;
        font-size: 18px;
        color: #e2e8f0;
        text-shadow: 0 0 5px rgba(255,255,255,0.5);
    `;

    const subStyle = `
        font-family: monospace;
        font-size: 12px;
        color: #94a3b8;
    `;

    // 4. The Render
    console.log("%c ", visualStyle); // Renders the Logo
    console.log("%cBUILT IN THE DARK.", textStyle);
    console.log("%cPROVEN IN THE LIGHT.", textStyle);
    console.log(
        "%c                        ألخَيْـلُ وَاللّيْـلُ وَالبَيْـداءُ تَعرِفُنـي\nوَالسّيفُ وَالرّمحُ والقرْطاسُ وَالقَلَـمُ",
        textStyle
    );

    console.log("%c✉️ torgodly@gmail.com", "color: #facc15; font-weight: 600; font-size: 13px;");
    // Back to Top Visibility
    window.addEventListener('scroll', () => {
        const btn = document.getElementById('back-to-top');
        if (window.scrollY > 500) {
            btn.classList.remove('translate-y-20', 'opacity-0');
        } else {
            btn.classList.add('translate-y-20', 'opacity-0');
        }
    });
    function scrollToWork() {
        const element = document.getElementById('app-grid');
        const offset = 80; // Space for breathing room
        const bodyRect = document.body.getBoundingClientRect().top;
        const elementRect = element.getBoundingClientRect().top;
        const elementPosition = elementRect - bodyRect;
        const offsetPosition = elementPosition - offset;

        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    }
</script>
