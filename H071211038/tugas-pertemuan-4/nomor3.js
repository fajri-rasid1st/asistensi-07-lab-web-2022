const str = prompt("Input text");
let counts = {};

for (let i = 0; i < str.length; i++) {
    let ch = str.charAt(i);
    let count = counts[ch];
    count == undefined ? count = 1 : count++;
}
for (ch in counts) {
    console.log(`"${ch}" = ${counts[ch]}`);
}