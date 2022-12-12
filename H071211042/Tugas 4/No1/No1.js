const nama = prompt("Masukkan Nama Anda");

if (!nama) {
	console.log("Masukkan nama dulu banh");
} else {
	const a = prompt("Sudah kerja tugasnya? YES/yes or NO/no");
	if (a == "yes" || a == "YES") {
		const b = prompt("Sudah ikut Asistensi? YES or NO");
		switch (b) {
			case "YES":
				const b = prompt("Sudah berapa kali asistensi? 1 atau 2");
				switch (b) {
					case "1":
						console.log("Sekali lagi");
						break;
					case "2":
						console.log("Mantap");
						break;
					default:
						console.log("Masukkan 1 atau 2");
				}
				break;
			case "NO":
				console.log("Asistensi dulu lah");
				break;
			default:
				console.log("Masukkan YES atau NO");
		}
	} else if (a == "no" || a == "NO") {
		console.log("Kerja Dulu Tugasnya Banh");
	} else {
		console.log("Masukkan YES/yes or NO/no");
	}
}
