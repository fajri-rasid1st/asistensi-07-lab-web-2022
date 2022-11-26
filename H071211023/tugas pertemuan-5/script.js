let sum = 0;
let uang = 5000;
let cards = [];
let totalbet = 0;
const kartu = document.getElementById("ycard");
const jumlah = document.getElementById("sum");
const duit = document.getElementById("money");
const message = document.getElementById("condition");
const pesan = document.getElementById("kondisi");
const bet = document.getElementById("taruhan");
const btntakecard = document.getElementById("take-card");
const btnstart = document.getElementById("start-game");
const btnreset = document.getElementById("reset");


btnstart.addEventListener("click", () => {
	totalbet = parseInt(bet.value);

	startgame(totalbet);

	bet.value = "";
});

btntakecard.addEventListener("click", () => takecard(totalbet));
// untuk mereset bet
btnreset.addEventListener("click", () => resetgame());

function startgame(betvalue) {
	//menyimpan nilai dari inputan taruhan
	if (bet.value <= 0) {
		alert("Set Your Bet first!!");
		return;
	}
	if (bet.value > uang) {
		alert(
			"Your money is less than your bet. Please Reset Game or change your bet"
		);
		return;
	}
	if (btnstart.innerHTML == "TRY AGAIN") cards = [];

	checkcard(betvalue);

	btntakecard.style.display = "inline";
	
	cards.push(getRandomCard()); // tambah kartu ke array kosong di line 3
	cards.push(getRandomCard());

	kartu.innerHTML = cards; // edit text d dalamnya
	jumlah.innerHTML = sumCards(cards);

	uang = uang - bet.value;
	duit.innerHTML = "Rp. " + uang;

	btntakecard.disabled = false;
	message.innerHTML = "Draw New Card?";
	btnstart.innerHTML = "TRY AGAIN";
	pesan.style.display = "none";
}

function takecard(betvalue) {
	cards.push(getRandomCard());

	checkcard(betvalue);

	kartu.innerHTML = cards; // edit text di dalamnya
	jumlah.innerHTML = sumCards(cards);
}

// cari random number untuk cards
function getRandomCard() {
	return Math.floor(Math.random() * 11) + 1;
}

function checkcard(betvalue) {
	if (sumCards(cards) == 21) {
		uang += betvalue * 6;
		pesan.style.display = "block";
		message.innerHTML = "You Win The Game!";
		duit.innerHTML = "Rp." + uang;
		pesan.innerHTML = "You Got Blackjack";
		btntakecard.disabled = true;

	} else if (sumCards(cards) > 21) {
		pesan.style.display = "block";
		message.innerHTML = "Game Over. You Lose!";
		pesan.innerHTML = "Game is Over You Can't Take New Card";
		btntakecard.disabled = true;
	}
}

// untuk menjumlahkan seluruh elemen dalam array
function sumCards(cards) {
	return cards.reduce((partialSum, a) => partialSum + a, 0);
}

//reset game
const resetgame = () => location.reload();




