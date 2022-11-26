const nama = prompt("Masukkan nama anda!");

if (nama ? (nama.trim().length == 0 ? null : nama) : null) {
    const jawaban = prompt("Sudah mengumpulkan tugas praktikum? YES atau NO")
    if (jawaban == "YES"){
        const jawaban_yes = prompt("Sudah ikut asistensi belum? YES atau NO")
        if (jawaban_yes == "YES"){
            const jawaban_asistensi = prompt("Sudah berapa kali asistensi? 1 atau 2")
            if (jawaban_asistensi == 1){
                alert("Asistensi lagi ya ")
            }
            else if (jawaban_asistensi == 2){
                alert("Hebat!")
            } else {
                alert("Input hanya 1 dan 2!")
            }
        } 
        else if (jawaban_yes == "NO") {
            alert("Asistensi Dulu ya " + nama)
        } else {
            alert("Input hanya bisa YES atau NO")
        }
    }
    else if (jawaban == "NO"){
        alert("Jangan lupa dikerjakan tugas praktikumnya " + nama)
    } else {
        alert("Input hanya bisa YES atau NO")
    }
}
else {
    alert("Masukkan nama anda terlebih dahulu!")
}
