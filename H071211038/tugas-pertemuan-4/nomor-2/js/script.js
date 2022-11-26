const mod = parseInt(prompt("Modulo berapa?"));
if (isNaN(mod)) {
    console.log("Inputan bukan Angka!");
} else {
    let total = 0;
    let start = parseInt(prompt("Ingin dimodulo mulai angka berapa?"));
    if (isNaN(start)) {
        console.log("Inputan bukan Angka!");
    } else {
        const end = parseInt(prompt("Ingin dimodulo sampai angka berapa?"));
        if (start > end) {
            console.log("Angka mulai harus lebih kecil ya!");
        } else if (Number.isInteger(end)) {
            while (start <= end){
                let result = ((start % mod) + mod) % mod;
                console.log(`${start} mod ${mod} = ${result}`);
                total += result;
                start++;
            }
            console.log(`Hasil keseluruhannya adalah ${total}`);
        } else {
            console.log("Inputan bukan Angka!");
        }
    }
}