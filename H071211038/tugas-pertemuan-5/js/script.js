let amount, indexCard, finish, win, playerBet;
let arrayCard = Array();
const btnStart = document.getElementById("btn-start");
const btnTakeCard = document.getElementById("btn-take-card");
const btnReset = document.getElementById("btn-reset-money");
const displayInfo = document.getElementById("display");
const stats = document.getElementById("stats");
const message = document.getElementById("message");
const bet = document.getElementById("bet");
const money = document.getElementById("money");
const sums = document.getElementById("sums");
const cards = document.getElementById("cards");
resetMoney();

btnReset.addEventListener("click", (ev)=> {
    ev.preventDefault();
    resetMoney();
});

btnTakeCard.addEventListener("click", (ev)=> {
    ev.preventDefault();
    takeCard();
});

btnStart.addEventListener("click", (ev)=> {
    ev.preventDefault();
    startGame();
});

function startGame(){
    playerBet = bet.value;
    finish = false;
    win = false;
    if (playerBet <= 0) {
        alert("Set your bet first!");
    } else {
        if (playerBet == 0) {
            alert("Your money is Rp. 0, Please Reset Your Money");
        } else if (amount < playerBet) {
            alert("Your money is less than your bet");
        } else {
            resetDisplay();
            message.style.display = "none";
            displayInfo.style.display = "block";
            stats.innerText = "Draw A New Card";
            btnTakeCard.disabled = false;
            amount -= playerBet;
            money.innerText = amount;
            takeCard();
            takeCard();
            btnStart.innerText = "Play again";
            document.forms[0].reset();
            // document.querySelector('form').reset();
        }
    }
};

function takeCard(){
    if (finish) {
        message.style.display = "block";
        btnTakeCard.disabled = true;
        if (win){
            message.innerText = "You already got a blackjack!";
        } else{
            message.innerText = "You can't take card";
        } 
    } else {
        let drawCard = Math.floor(Math.random() * 11) + 1;
        let sum = parseInt(sums.innerText) + parseInt(drawCard);
        arrayCard[indexCard] = drawCard;
        indexCard++;
        const newCard = arrayCard.join(" ");   
        cards.innerText = newCard;
        sums.innerText = sum;
        checkWin(sum);
    }
}

function checkWin(sum) {
    if (sum == 21) {
        finish = true;
        win = true;
        stats.innerText = "You got a blackjack!";
        amount += parseInt(playerBet * 6);
        money.innerText = amount;
    } else if (sum > 21) {
        finish = true;
        stats.innerText = "You lose";
    }
}

function resetMoney(){
    amount = 5000;
    money.innerText = amount;
    resetDisplay();
};

function resetDisplay() {
    stats.innerText = "Play A Round?";
    displayInfo.style.display = "none";
    btnTakeCard.disabled = true;
    indexCard = 0;
    arrayCard = [];
    cards.innerText = "";
    sums.innerText = 0;
};