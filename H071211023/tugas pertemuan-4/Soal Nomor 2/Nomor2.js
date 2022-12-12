const bagi = parseInt(prompt("Pembagian Berapa?"));
if (bagi != "0") {
	if (Number.isInteger(bagi)) {
		let total = 0;
		const angka = parseInt(prompt("ingin dibagi sampai berapa?"));
		if (Number.isInteger(angka)) {
			for (let i = 1; i <= angka; i++) {
				const hasil = i / bagi;
				total += hasil;
				console.log(i + " : " + bagi + " = " + hasil);
			}
			console.log("Hasil Seluruh Pembagian = " + total);
		} else {
			console.log("Inputan Bukan Angka");
		}
	} else {
		console.log("Inputan Bukan Angka");
	}
} else {
	console.log("pembagian tidak boleh nol");
}
