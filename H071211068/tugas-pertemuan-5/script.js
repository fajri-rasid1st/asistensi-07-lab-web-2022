let player = {
	name: "Uangmu: ",
	chips: 5000,
};

let cards = [];
let sum = 0;
let hasBlackJack = false;
let isAlive = false;
let message = "";
let messageEl = document.getElementById("message-el");
let sumEl = document.getElementById("sum-el");
let cardsEl = document.getElementById("cards-el");
let playerEl = document.getElementById("player-el");
let resetEl = document.getElementById("reset-el");
let takeEl = document.getElementById("take");
let bet = document.getElementById("bet");

playerEl.textContent = player.name + ": Rp" + player.chips;
takeEl.style.display = "none";

function getRandomCard() {
	let randomNumber = Math.floor(Math.random() * 13) + 1;
	if (randomNumber > 10) {
		return 10;
	} else if (randomNumber === 1) {
		return 11;
	} else {
		return randomNumber;
	}
}

function renderGame() {
	takeEl.style.display = "inline";
	cardsEl.textContent = "Kartumu: ";
	for (let i = 0; i < cards.length; i++) {
		cardsEl.textContent += cards[i] + " ";
	}

	sumEl.textContent = "Sum: " + sum;
	if (sum <= 20) {
		message = "Mau ambil kartu lagi?";
	} else if (sum === 21) {
		message = "kamu mendapatkan Blackjack!";
		hasBlackJack = true;
		var menang = bet.value * 5;
		player.chips += menang;
		playerEl.innerText = player.name + ": Rp" + (player.chips);
	} else {
		message = "Kamu kalah, Kamu tak bisa mengambil kartu lagi!";
		isAlive = false;
	}
	messageEl.textContent = message;
}

function startGame() {
	if (player.chips == 0) {
		alert("Duitmu habis!");
	} else if (bet.value > player.chips) {
		alert("Uangmu tidak cukup, atur kembali uang atau ganti bet");
	} else if (bet.value <= 0 || bet.value == "") {
		alert("Masukkan Taruhanmu yang valid");
	} else {
		var mulaimain = document.getElementById("mulai");
		mulaimain.innerText = "Main Lagi?";
		player.chips -= bet.value;
		// bet.value = ``
		playerEl.innerText = player.name + ": Rp" + player.chips;
		isAlive = true;
		let firstCard = getRandomCard();
		let secondCard = getRandomCard();
		cards = [firstCard, secondCard];
		sum = firstCard + secondCard;
		renderGame();
	}
}

function newCard() {
	if (isAlive === true && hasBlackJack === false) {
		let card = getRandomCard();
		sum += card;
		cards.push(card);
		renderGame();
	}
}

function reset() {
	location.reload();
}
