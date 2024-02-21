const container = document.getElementById('matrix-rain');
const canvas = document.createElement('canvas');
const ctx = canvas.getContext('2d');
canvas.width = container.clientWidth;
canvas.height = container.clientHeight;
container.appendChild(canvas);

let letters = 'CSSECTEAMYYDS';
letters = letters.split('');

const fontSize = 10,
    columns = canvas.width / fontSize;

const drops = [];
for (let i = 0; i < columns; i++) {
    drops[i] = 1;
}

function draw() {
    ctx.fillStyle = 'rgba(4, 12, 31, .1)';  // 修改这里
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    for (let i = 0; i < drops.length; i++) {
        const text = letters[Math.floor(Math.random() * letters.length)];
        ctx.fillStyle = 'rgb(7,72,7)';
        ctx.fillText(text, i * fontSize, drops[i] * fontSize);
        drops[i]++;
        if (drops[i] * fontSize > canvas.height && Math.random() > .95) {
            drops[i] = 0;
        }
    }
}

setInterval(draw, 33);