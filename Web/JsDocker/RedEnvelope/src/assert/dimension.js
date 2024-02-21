const title = document.getElementById("title");
const text = title.textContent;
title.textContent = "";

for (let i = 0; i < text.length; i++) {
    let letter = text[i];
    let span = document.createElement("span");
    span.textContent = letter;
    span.style.animationDelay = `${i / 10}s`;
    title.append(span);
}


for (let i = 0; i < 100; i++) {
    let flake = document.createElement("div");
    flake.className = "flake";
    flake.style.left = `${Math.random() * 100}vw`;
    flake.style.animationDuration = `${Math.random() * 3 + 2}s`;
    flake.style.animationDelay = `${Math.random() * 2}s`;
    document.body.append(flake);
}