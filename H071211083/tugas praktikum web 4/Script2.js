var n = parseInt(prompt("mau perkalian berapa?"));

if (n) {
    var m = parseInt(prompt("ingin dikalikan sampai berapa?"));
    var sum = 0;

    if (m) {
        for (let i = 1; i <= m; i++) {
            sum += i * n;
            console.log(i + " x " + n + " = " + (i * n));
        }
        console.log("jumlah hasil perkalian:" + sum);
    } else {
        console.log("Input bukan angka");
    }

} else {
    console.log("Input bukan angka");
}




