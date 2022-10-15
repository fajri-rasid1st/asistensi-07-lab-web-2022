function startGame(){
    let bet = document.getElementById("bet").value;
    let amount = 5000;
    let money = document.getElementById("money");
    if (bet <= 0) {
        alert("Set your bet first!");
    } else {
        if (amount < bet) {
            alert("Duit km ga ckup dik");
        } else {
            amount -= bet;
            money.innerHTML = amount;
            takeCard();
            takeCard();
        }
    }
};

function takeCard(){
    let sums = document.getElementById("sums");
    let newCard = Math.floor(Math.random() * 11) + 1;
    let card = document.getElementById("card");
    let sum = new Array();
    // sums.innerHTML = sum.join(newCard) + sum.join(" ");
    // // let sum = newArray();
    // // sum.add(newCard);
    // // card.innerHTML = sum[0];
    // card.innerText = newCard;
    let cards = [];
    {   var html = "";
            html += newCard;
            card.innerHTML = html;
    }
    if (sum>21) {
        alert("You Lose!");
    } else {
        
    }

}

function resetMoney(){
    let amount = 5000;
    let money = document.getElementById("money");
    money.innerHTML = amount;
};