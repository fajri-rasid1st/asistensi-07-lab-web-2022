//initialize player
var player = {
  name: "Risqull",
  cash: 5000,
  card: [],
  bet: function (amount) {
    this.cash -= amount;
  },
  drawCard: function () {
    this.card.push(randomIntFromInterval(1, 11));
  },
};

let buttonStart = document.getElementById("startBtn");
let buttonAdd = document.getElementById("addBtn");
let buttonReset = document.getElementById("resetBtn");

let betCash = 0;

updateView();
// buttonAdd.classList.add("hidden");

function startGame(betAmount) {
  betAmount = parseInt(document.getElementById("betCash").value);
  betCash = betAmount;

  if (betAmount > player.cash) {
    alert("Cash is not enough for your bet");
    return;
  } else if (betAmount <= 0) {
    alert("Minimum cash for bet is 1");
    return;
  } else if (isNaN(betAmount)) {
    alert("Please input a number");
    return;
  }

  buttonAdd.disabled = false;
  player.bet(betAmount);
  player.drawCard();
  player.drawCard();
  buttonStart.hidden = true;
  buttonAdd.hidden = false;

  document.getElementsByTagName("input")[0].disabled = true;
  updateView();
}

function addCard(updateCard) {
  player.card.push(randomIntFromInterval(1, 11));
  updateCard = sumCard(player.card);
  if (updateCard == 21) {
    player.cash += betCash * 5;
    gameEnd(player.cash);
  } else if (updateCard > 21) {
    gameEnd(player.cash);
  }

  updateView();
}

function randomIntFromInterval(min, max) {
  // min and max included
  return Math.floor(Math.random() * (max - min + 1) + min);
}

function sumCard(cards) {
  return (sum = cards.reduce((partialSum, a) => partialSum + a, 0));
}

function updateView() {
  document.getElementsByTagName("span")[0].innerHTML = player.card;
  document.getElementsByTagName("span")[1].innerHTML = player.cash;
  document.getElementsByTagName("span")[2].innerHTML = sumCard(player.card);
}

function gameEnd(cashNow) {
  cashNow = player.cash;
  // document.getElementsByTagName("span")[0].hidden = true;
  // document.getElementsByTagName("span")[1].hidden = true;
  // document.getElementsByTagName("span")[2].hidden = true;
  if (cashNow > 5000) {
    document.getElementsByTagName("h1")[1].hidden = false;
    document.getElementsByTagName("h1")[1].classList.add("text-green-500");
    document.getElementsByTagName("h1")[1].innerHTML += "You win";
    // document.getElementsByTagName("p")[0].hidden = false;
  } else {
    document.getElementsByTagName("h1")[1].hidden = false;
    document.getElementsByTagName("h1")[1].classList.add("text-red-500");
    document.getElementsByTagName("h1")[1].innerHTML += "You Lose";
  }
  document.getElementById("addBtn").disabled = true;
  document.getElementById("resetBtn").hidden = false;
}

function resetGame() {
  location.reload();
}
