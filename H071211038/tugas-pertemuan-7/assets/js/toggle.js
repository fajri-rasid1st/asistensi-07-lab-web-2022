const toggle = document.querySelector(".toggle");
const togglePassword = document.querySelector(".toggle-password");
const togglePassword2 = document.querySelector(".toggle-password-2");
const togglePassword3 = document.querySelector(".toggle-password-3");
const toggle2 = document.querySelector(".toggle-2");

toggle.addEventListener("click", () => {
    if (togglePassword.type === "password" || togglePassword2 === "password") {
        togglePassword.type = "text";
        togglePassword2.type = "text";
    } else {
        togglePassword.type = "password";
        togglePassword2.type = "password";
    }
});

toggle2.addEventListener("click", ()=>{
    if (togglePassword3.type === "password") {
        togglePassword3.type = "text";
    } else {
        togglePassword3.type = "password";
    }
});