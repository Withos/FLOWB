const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const confirmedPasswordInput = form.querySelector('input[name="confirm_password"]');

function isEmail(email){
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, confirmedPassword){
    return password === confirmedPassword;
}

function markInvalid(element, condition){
    !condition ? element.classList.add('not_valid') : element.classList.remove('not_valid');
}

function validateEmail(){
    setTimeout(function() {
        markInvalid(emailInput, isEmail(emailInput.value));
    }, 1000)
}

emailInput.addEventListener('keyup', validateEmail)

function validateConfirmedPassword(){
    setTimeout(function() {
        const condition = arePasswordsSame(
            confirmedPasswordInput.previousElementSibling.value,
            confirmedPasswordInput.value);
        markInvalid(confirmedPasswordInput, condition);
    }, 1000)
}

confirmedPasswordInput.addEventListener('keyup', validateConfirmedPassword)