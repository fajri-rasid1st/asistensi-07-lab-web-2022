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
	chars = chars.filter((element, _) => element != findItem);
}
