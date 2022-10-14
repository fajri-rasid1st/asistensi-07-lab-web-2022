const member = ["nayeon", "jeongyeon", "momo", "sana", "jihyo", "mina", "dahyun", "chaeyoung", "tzuyu"];
const nama = prompt("Hi, what's your name?");
if (nama === null || nama.match(/^ *$/) !== null) {
    console.log("Please enter your name");
} else {
    const like = prompt(`${nama}, do you like TWICE?`).toLowerCase();
    if (like == "no") {
        console.log("Uh oh, I will stop to asking :(");
    } else if (like == "yes") {
        const listen = prompt("Did you listen to 'Talk that Talk'?").toLowerCase();
        if (listen == "yes") {
            alert(`Good, ${nama}`);
            const favoriteMember = prompt("Who is your favorite member in TWICE?").toLowerCase();
            const [a, b] = favoriteMember.split(" ");
            if (member.includes(favoriteMember) || (member.includes(a) && member.includes(b))) {
                console.log(`Nice, ${nama}! Mine is Sana`);
            } else if (favoriteMember === null || favoriteMember.match(/^ *$/) !== null) {
                console.log(`Please enter member's name, ${nama}`);
            } else if (favoriteMember == "nothing") {
                const nothing = prompt("Are you more of a casual stan or there's a few members who you can't decide between? Yes or Yes? I mean yes or no?").toLowerCase();
                if (nothing == "yes") {
                    console.log("I guessed it right :)");
                } else if (nothing == "no") {
                    console.log("I guessed it wrong :(");
                } else {
                    console.log(`Please enter yes or no, ${nama}`);
                }
            } else {
                console.log(`I don't think ${favoriteMember.charAt(0).toUpperCase() + favoriteMember.slice(1)} is the member of TWICE`);
            }
        } else if (listen == "no") {
            console.log("You have to listen it now! >:( It's their latest song");
        } else {
            console.log(`Please enter yes or no, ${nama}`);
        }
    } else {
        console.log(`Please enter yes or no, ${nama}`);
    }
}