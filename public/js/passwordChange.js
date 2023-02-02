const form = document.querySelector("form");
const oldPassword = form.querySelector('input[name="OldPassword"]');
const newPassword = form.querySelector('input[name="NewPassword"]');
const confirmedPassword = form.querySelector('input[name="RepeatNewPassword"]');

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validatePassword() {
    setTimeout(function () {
            const condition = arePasswordsSame(
                newPassword.value,
                confirmedPassword.value
            );
            markValidation(confirmedPassword, condition);
        },
        1000
    );
}

confirmedPassword.addEventListener('keyup', validatePassword);