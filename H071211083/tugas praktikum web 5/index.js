let playerMoney = 5000;
let cards = [];
let sum = 0;
let hasBlackJack = false;
let isAlive = playerMoney <= 5000;
let message = "";
let messageEl = document.getElementById("message-el");
let sumEl = document.getElementById("sum-el");
let cardsEl = document.getElementById("cards-el");
let betEl = document.getElementById("bet-el");
let btnStart = document.getElementById("startButton");
let btnTakeCard = document.getElementById("tc");
let money = document.getElementById("player-el");

function start() {
	btnStart.innerText = "play again";

	if (betEl.value > 0) {
		

		if (betEl.value <= playerMoney) {
			playerMoney -= betEl.value;
			money.innerHTML = playerMoney;
			startGame();
		} else {
			alert("your money is less than your bet");
		}
	} else {
		alert("set your bet before start");
	}
}

function getRandomCard() {
	return Math.floor(Math.random() * 11) + 1;
}

function startGame() {
	cardsEl.style.display = "block";
	sumEl.style.display = "block";
	btnTakeCard.style.display = "inline";
	hasBlackJack = false;
	isAlive = true;
	let firstCard = getRandomCard();
	let secondCard = getRandomCard();
	cards = [firstCard, secondCard];
	sum = firstCard + secondCard;
	renderGame();
	
}

function renderGame() {
	cardsEl.textContent = "Cards : ";
	for (let i = 0; i < cards.length; i++) {
		cardsEl.textContent += cards[i] + " ";
	}
	sumEl.textContent = "Sum : " + sum;
	if (sum <= 20) {
		message = "do you want to draw a new card?";
	} else if (sum == 21)  {
		playerMoney += betEl.value*6;
		money.innerHTML = playerMoney;
		message = "yeyy, you did it";
		hasBlackJack = true;
		//
		btnTakeCard.disabled = true;
	} else {
		message = "you Lose";
		isAlive = false;
		//
		btnTakeCard.disabled = true;
	}

	messageEl.textContent = message;
	betEl.value = "";
}

function takeCard() {
	if (isAlive === true && hasBlackJack === false) {
		let card = getRandomCard();
		sum += card;
		cards.push(card);
		renderGame();
	}
}

function resetMoney() {
	playerMoney = 5000;
    money.innerHTML = playerMoney;
}