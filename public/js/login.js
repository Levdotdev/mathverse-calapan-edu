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


function updatePlaceholder(role) {
    const input = document.getElementById('uid');
    if (role === 's') {
        input.placeholder = "Student LRN";
    } else {
        input.placeholder = "Teacher ID";
    }
}