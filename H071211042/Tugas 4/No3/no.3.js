const input = prompt("Masukkan kalimat");
let chars = input.split("");

while (true) {
	if (chars.length == 0) {
		break;
	}
	const findItem = chars[0];
	let jumlah = 0;

	for (const item of chars) {
		if (item == findItem) {
			jumlah++;
		}
	}
	console.log(`"${findItem}" = ${jumlah}`);
	chars = chars.filter((element, index) => element != findItem);
}
let count = {};
for (let i = 0; i < chars.length; i++) {
	if (count[chars[i]] == undefined) count[chars[i]] = 0;
	count[chars[i]]++;
}
// for (let i in count) {
// 	console.log(`"${i}" = ${count[i]}`);
// }
