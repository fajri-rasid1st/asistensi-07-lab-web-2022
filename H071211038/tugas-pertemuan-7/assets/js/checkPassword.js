const confirmPassword = document.querySelector("input[name=confirmPassword]");
const password = document.querySelector("input[name=password]");
const msg = document.querySelector("#msg");
const btn = document.querySelector("button[name=btnRegister]");

password.addEventListener("keyup", () => {
    const passwordValue = document.querySelector("input[name=password]").value;
    if(passwordValue.length < 8) {
        msg.style.display = "block";
        msg.style.color = "red";
        msg.innerText = "password must be more than 8 characters";
        btn.disabled = true;
    } else {
        isPasswordMatches();
    }
});

confirmPassword.addEventListener("keyup", isPasswordMatches);

function isPasswordMatches() {
    msg.style.display = "block";
    if (confirmPassword.value == password.value) {
        const passwordValue = document.querySelector("input[name=password]").value;
        if (passwordValue.length < 8) {
            msg.style.color = "red";
            msg.innerText = "password must be more than 8 characters";
            btn.disabled = true;
        } else {
            msg.style.color = "green";
            msg.innerText = "password matches";
            btn.disabled = false;
        }
    } else {
        msg.style.color = "red";
        msg.innerText = "password doesn't match";
        btn.disabled = true;
    }
}