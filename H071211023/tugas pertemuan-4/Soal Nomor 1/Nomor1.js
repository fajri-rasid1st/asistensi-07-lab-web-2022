const nama = prompt("Masukkan Nama Anda");

if (nama ? nama.trim() : nama) {
	const pertanyaan = prompt("Sudah Mengumpulkan Tugas Praktikum?").toUpperCase();

	if (pertanyaan ? pertanyaan.toUpperCase() : pertanyaan) {
		if (pertanyaan == "YES") {
			const pertanyaan2 = prompt("Ikut Asistensi? YES atau NO").toUpperCase();

			if (pertanyaan2 ? pertanyaan2.toUpperCase() : pertanyaan2) {
				if (pertanyaan2 == "YES") {
					const pertanyaan3 = prompt("Sudah Berapa Kali Asistensi? 1 atau 2");

					if (pertanyaan3 == "1") {
						console.log("Asistensi Sekali Lagi Ya " + nama);
					} else if (pertanyaan3 == "2") {
						console.log("Kamu Hebat " + nama);
					} else {
						console.log("Masukkan input yang benar yaitu 1 atau 2");
					}
				} else if (pertanyaan2 == "NO") {
					console.log("Asistensi Dulu ya " + nama);
				} else {
					console.log("Masukkan input yang benar yaitu YES atau NO");
				}
			} else {
				console.log("Masukkan input yang benar yaitu YES atau NO");
			}
		} else if (pertanyaan == "NO") {
			console.log("jangan lupa dikerja tugas praktikumnya " + nama);
		} else {
			console.log("Masukkan input yang benar yaitu YES atau NO");
		}
	} else {
		console.log("Masukkan input yang benar yaitu YES atau NO");
	}
} else {
	console.log("Masukkan Nama Anda terlebih dahulu");
}
