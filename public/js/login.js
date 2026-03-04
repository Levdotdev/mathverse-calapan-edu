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
    const input = document.getElementById('regLRN');
    if (role === 's') {
        input.placeholder = "Student LRN (12 Digits)";
    } else {
        input.placeholder = "Teacher License ID";
    }
}