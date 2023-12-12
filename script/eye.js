

let eyeOn = document.querySelectorAll('.fa-eye');
let eyeOff = document.querySelectorAll('.fa-eye-slash');
let passwordField = document.querySelectorAll("input[type='password']");

for (let i = 0; i < eyeOn.length; i++) {
  eyeOn[i].addEventListener('click', () => {
    eyeOn[i].style.display = "none";
    eyeOff[i].style.display = "block";
    passwordField[i].type = "text";
  });
}

for (let i = 0; i < eyeOff.length; i++) {
  eyeOff[i].addEventListener('click', () => {
    eyeOff[i].style.display = "none";
    eyeOn[i].style.display = "block";
    passwordField[i].type = "password";
  });
}

