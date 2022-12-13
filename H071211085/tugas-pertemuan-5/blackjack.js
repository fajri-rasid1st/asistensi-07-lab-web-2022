let uang = 5000;
let sum = 0;
document.getElementById("money").innerHTML = uang;
let arrayKartu = new Array();
let taruhan;


// Function jika mau taruhan
function bet() { 
    taruhan = document.getElementById("your_bet").value;
    
    // Jika input hanya whitespace
    if (taruhan.trim() == "")  {
        alert("Masukkan bet terlebih dahulu!");
    
    // Jika input bukan angka
    } else if (isNaN(taruhan)) {
        alert("Input harus angka!");
    

    // Jika syarat terpenuhi
    } else if (taruhan <=  uang && taruhan > 0) {
        uang = uang - taruhan;
        document.getElementById("money").innerHTML = uang;
        document.getElementById("start_game").innerHTML = "Want To Play Again?";
        document.getElementById("your_bet").value = "";
        document.getElementById("dealer").innerHTML = "Draw a new card?";

        // Reset Array --> Kalo 'Want To Play Again'
        
        arrayKartu = [];
        // Random Card
        let card1 = Math.floor(Math.random() * 11) + 1;
        let card2 = Math.floor(Math.random() * 11) + 1 ;
        arrayKartu[0] = card1;
        arrayKartu[1] = card2;

        console.log(arrayKartu);
        console.log(arrayKartu.length);
        document.getElementById("cards").innerHTML = card1 + "," + card2; 
        document.getElementById("jumlah").innerHTML = card1 + card2; 
        if (document.getElementById("jumlah").innerHTML > 20) {
            condition();
        }

        return uang;
         
    
    // Jika input merupakan bilangan negatif
    } else if (taruhan <= -1) {
        alert("Jumlah taruhan tidak boleh bilangan negatif!")
        

    // Jika input melebihi uang yang dipunyai
    } else if (taruhan == 0) {
        alert("Jumlah taruhan tidak boleh nol!")
     
    
    } else {
        alert("Uang tidak mencukupi!")
    }

}


function takeCard() {
    sum = 0;
    let newCard = Math.floor(Math.random() * 11 ) + 1;
    if ( document.getElementById("jumlah").innerHTML < 21 ) {
        arrayKartu.push(newCard);
        for(i = 0; i < arrayKartu.length; i++) {
            sum += arrayKartu[i];
            
            if (arrayKartu.length > 3) {
                sum = 0;
                for(j = 0; j < arrayKartu.length; j++) {
                    sum += arrayKartu[j];
                    
                }
            }
        }
        document.getElementById("jumlah").innerHTML = sum; 
        document.getElementById("cards").innerHTML = arrayKartu.toString();
        condition();

    } else if (document.getElementById("jumlah").innerHTML == 21) {
        alert("You already got BlackJack!");
        
    
    } else if (document.getElementById("jumlah").innerHTML > 21) {
        alert("You already lose Man!");
    }

}

function condition() {
    if (document.getElementById("jumlah").innerHTML == 21) {
        document.getElementById("dealer").innerHTML = "You Win, Congratulations!";
        uang = uang + (taruhan * 6 ) ;
        document.getElementById("money").innerHTML = uang;
        return uang;


        
    
    } else if (document.getElementById("jumlah").innerHTML > 21) {
        document.getElementById("dealer").innerHTML = "You Lose, Nice Try!";
    }
}


function reset_money() {
    // Reset uang
    uang = 5000;
    document.getElementById("money").innerHTML = uang;
    

    // 
}


