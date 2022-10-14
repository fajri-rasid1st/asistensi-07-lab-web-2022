alert("Welcome");

const perkalian = prompt("Perkalian berapa?");

if (isNaN(perkalian)) {
    console.log("Input bukan angka!")
} else {
    const perkalian2 = prompt("Ingin dikalikan sampai berapa?");
    if (isNaN(perkalian2)) {
        console.log("Input bukan angka!")
    } else {
    let hasil;
    let hasil_perkalian = 0;
    for (i = 1; i <= perkalian2; i++){
        hasil = perkalian * i;
        hasil_perkalian += hasil;
        console.log(perkalian + " x " + i + " = " + hasil);
    }
    console.log("Hasil seluruh perkalian = " + hasil_perkalian);
    }
}
