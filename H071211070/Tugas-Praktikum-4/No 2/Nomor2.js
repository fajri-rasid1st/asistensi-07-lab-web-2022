const kali = prompt("Masukkan Angka");
if (kali) {
	if (isNaN(kali) || kali.trim() == "") {
		console.log("Masukkan Angka");
	} else {
		const kali = prompt("Dikali sampai berapa?");

		if (isNaN(kali) || kali.trim() == "") {
			console.log("Bukan Angka");
		} else {
			if (kali) {
				let total = 0;

				for (let i = 1; i <= kali; i++) {
					hasil = kali * i;
					total += hasil;
					console.log(`${i} X ${kali}  =  ${hasil}`);
				}
				console.log(`Jumlah Semua Perkalian ${total}`);
			}
		}
	}
}
