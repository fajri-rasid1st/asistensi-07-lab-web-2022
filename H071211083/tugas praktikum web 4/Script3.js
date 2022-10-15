const kalimat = prompt("ketik suatu kalimat");
if (kalimat) {
    let chars = kalimat.split("")

    while (true) {
        if (chars.length == 0) {
            break;
        }
        const findItem = chars[0];
        let jumlah = 0
        for (const item of chars) {
            if (item == findItem) {
                jumlah++
            }
        }
        console.log(`"${findItem}" = ${jumlah}`);
        chars = chars.filter((element, index) => element != findItem);
    }
}


//   var let_count = {};

//   for (var i = 0; i < chars.length; i++) {
//     if(let_count[chars[i]] == undefined)
//         let_count[chars[i]] = 0;
//         let_count[chars[i]] ++;
//   }

//   for (var i in let_count) {
//     console.log(i + ' = ' + let_count[[i]]);
//   }