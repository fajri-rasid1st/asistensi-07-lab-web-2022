const mod = parseInt(prompt("Modulo berapa?"));
if (isNaN(mod)) {
    let total = 0;
    const num = parseInt(prompt("Ingin dimodulo sampai angka berapa?"));
    if (Number.isInteger(num)) {
        for (let i = 1; i <= num; i++){
            console.log(`${i} mod ${mod} = ${i%mod}`);
            total += i%mod;
        }
        console.log(`Hasil keseluruhannya adalah ${total}`);
    } else {
        console.log("Inputan bukan Angka!");
    }
} else {
    console.log("Inputan bukan Angka!");
}