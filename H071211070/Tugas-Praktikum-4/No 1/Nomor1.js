const nama = prompt("Masukkan Nama Anda");

if (!nama) {
	console.log("Masukkan Nama Broo!!");
} else {
	const a = prompt("Sudah kerja tugasnya? YES/yes or NO/no");
	if (a == "yes" || a == "YES") {
		const b = prompt("Sudah ikut Asistensi? YES/yes or NO/no");
		// switch >> if else + YES || yes
		if (b == "yes" || b == "YES") {
			const c = prompt("Asistensi 1 atau 2");
			if (c == "1") {
				console.log("One More!!");
			} else if (c == "2") {
				console.log("Nice Bro!!");
			}
		} else if (b == "no" || b == "NO") {
			console.log("Asistensi dulu bro");
		} else {
			console.log("Masukkan Yes or NO");
		}
	} else if (a == "no" || a == "NO") {
		console.log("Kerjakan Terlebih Dahulu");
	} else {
		console.log("Masukkan YES/yes or NO/no");
	}
}
