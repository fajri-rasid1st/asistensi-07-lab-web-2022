const str = prompt("Masukkan Kalimat");
const freq = {};
for (const char of str) {
	freq[char] == undefined ? (freq[char] = 1) : freq[char]++;
}
for (const key in freq) {
	console.log(`"${key}" = ${freq[key]} `);
}
