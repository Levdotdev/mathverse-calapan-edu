/**
 * MATHVERSE PORTAL ENGINE
 * Handles Boot, Module Swapping, Feedback, and Particles
 */

window.onload = () => {
    const bar = document.getElementById('bootProgress');
    const txt = document.getElementById('bootText');
    const loader = document.getElementById('bootLoader');
    const steps = ["INITIALIZING_MODULES...", "SYNCING_REGION_DATA...", "SESSION_READY!"];
    let p = 0;
    
    const int = setInterval(() => {
        p += 2;
        bar.style.width = p + '%';
        if (p % 33 === 0) txt.innerText = steps[Math.floor(p / 34)];
        if (p >= 100) {
            clearInterval(int);
            setTimeout(() => {
                loader.style.opacity = '0';
                setTimeout(() => loader.remove(), 800);
            }, 400);
        }
    }, 10);
};

/** Swaps from Start Module to Login */
function startGame() {
    const startMod = document.getElementById('startMod');
    const loginMod = document.getElementById('loginMod');
    startMod.classList.remove('module-active');
    setTimeout(() => {
        startMod.style.display = 'none';
        loginMod.style.display = 'block';
        setTimeout(() => loginMod.classList.add('module-active'), 50);
    }, 400);
}

/** Updates registration placeholder based on role */
function updatePlaceholder(role) {
    const input = document.getElementById('regLRN');
    if (role === 's') {
        input.placeholder = "Student LRN (12 Digits)";
    } else {
        input.placeholder = "Teacher License ID";
    }
}

/** Switches between UI modules (Login, Reg, Forgot) */
function swMod(mode) {
    const mods = {
        login: document.getElementById('loginMod'),
        reg: document.getElementById('regMod'),
        forgot: document.getElementById('forgotMod')
    };
    
    // Find currently active module
    let activeMod = null;
    Object.values(mods).forEach(m => {
        if (m.style.display === 'block' || m.classList.contains('module-active')) {
            activeMod = m;
        }
    });

    if (activeMod) {
        activeMod.classList.remove('module-active');
        setTimeout(() => {
            activeMod.style.display = 'none';
            const target = mods[mode];
            target.style.display = 'block';
            setTimeout(() => target.classList.add('module-active'), 50);
        }, 300);
    }
}

/** Toggles password visibility */
function tglPass(id, icoId) {
    const inp = document.getElementById(id);
    const ico = document.getElementById(icoId);
    if (inp.type === 'password') {
        inp.type = 'text';
        ico.className = 'fas fa-eye';
    } else {
        inp.type = 'password';
        ico.className = 'fas fa-eye-slash';
    }
}

/** Triggers cyber-styled toast notifications */
function showToast(title, content) {
    const t = document.getElementById('toast');
    document.getElementById('tTitle').innerText = title;
    document.getElementById('tContent').innerText = content;
    t.classList.remove('translate-y-[-150%]');
    t.classList.add('translate-y-0');
    setTimeout(() => {
        t.classList.remove('translate-y-0');
        t.classList.add('translate-y-[-150%]');
    }, 3000);
}

// --- FORM HANDLERS ---

document.getElementById('loginForm').onsubmit = (e) => {
    e.preventDefault();
    showToast("ACCESS_GRANTED", "Welcome back to MathVerse.");
};

document.getElementById('forgotForm').onsubmit = (e) => {
    e.preventDefault();
    const email = document.getElementById('fEmail').value;
    showToast("DISPATCH_SUCCESS", "Reset sequence sent to " + email);
    setTimeout(() => swMod('login'), 2000);
};

document.getElementById('regForm').onsubmit = (e) => {
    e.preventDefault();
    const pass = document.getElementById('rPass').value;
    const cpass = document.getElementById('rcPass').value;
    if (pass !== cpass) {
        showToast("INPUT_ERROR", "Password keys do not match!");
        return;
    }
    showToast("PROFILE_CREATED", "Your account has been successfully created.");
    setTimeout(() => swMod('login'), 2000);
};

// --- BACKGROUND PARTICLE SYSTEM ---

const pCont = document.getElementById('particle-container');
const symbols = ['+', '−', '×', '÷', '=', 'π', '∑', '√', 'Δ', '∞', '∫', 'f(x)', 'y²', 'x³'];
const colors = ['#00f2ff', '#bc13fe', '#ffffff'];

function spawn() {
    if (pCont.children.length > 15) return;
    const p = document.createElement('div');
    p.className = 'particle font-orbitron';
    p.innerText = symbols[Math.floor(Math.random() * symbols.length)];
    p.style.left = Math.random() * 100 + 'vw';
    p.style.color = colors[Math.floor(Math.random() * colors.length)];
    p.style.animationDuration = (Math.random() * 8 + 6) + 's';
    p.style.fontSize = (Math.random() * 10 + 16) + 'px';
    pCont.appendChild(p);
    setTimeout(() => p.remove(), 10000);
}

setInterval(spawn, 1000);