const str = prompt("Input text");
let counts = {};

for (let i = 0; i < str.length; i++) {
    let ch = str.charAt(i);
    counts[ch] == undefined ? counts[ch] = 1 : counts[ch]++;
}
for (ch in counts) {
    console.log(`"${ch}" = ${counts[ch]}`);
}