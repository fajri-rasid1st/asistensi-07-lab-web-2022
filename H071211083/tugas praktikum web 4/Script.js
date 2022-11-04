const nama = prompt("Masukkan nama anda");
if (nama == null || nama == " ") {
    console.log("mohon input nama anda");
} else {
    const kumpul = prompt("apakah sudah mengumpulkan Tugas Praktikum? YES atau NO");
    if (kumpul == "YES" || kumpul == "yes") {
        const asistensi = prompt("ikut asistensi? YES atau NO");
        if (asistensi == "YES" || asistensi == "yes") {
            const berapa = prompt("Sudah berapa kali asistensi? 1 atau 2");
            if (berapa == "1") {
                console.log("satu kali lagi ya" + " " + nama);
            } else if (berapa == "2") {
                console.log("kamu hebat" + " " + nama);
            } else {
                console.log("masukan input yang benar");
            }
        } else if (asistensi == "NO" || asistensi == "no") {
            console.log("asistemsi dulu ya" + " " + nama);
        } else {
            console.log("masukan input yang benar");
        }
    } else if (kumpul == "NO" || kumpul == "no") {
        console.log("jangan lupa dikerja tugas praktikumnya" + " " + nama);
    } else {
        console.log("masukan YES/yes atau NO/no");
    }
}
