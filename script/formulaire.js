inputText = [...document.querySelectorAll('input[type="text"]')];
inputPass = [...document.querySelectorAll('input[type="password"]')];
inputEmail = document.querySelector('input[type="email"]');
regExpEmail = /^[\w-.]+@([\w-]+.)+[\w-]{2,4}$/;

function verifierMdp(mdp) {
  return /^(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!*])(?=.*[a-zA-Z]).{8,}$/.test(mdp);
};

function verifierEmail() {
  if (!regExpEmail.test(inputEmail.value)) {
    inputEmail.placeholder = "Email invalide";
    inputEmail.style.boxShadow = "5px 5px 5px red";
  }
  else {
    inputEmail.style.boxShadow = "none";
    return true
  };
};

function verifierText() {
  for (const input of inputText) {
    if (input.value.length < 3) {
      input.placeholder = "3 caractères minimum";
      input.style.boxShadow = "5px 5px 5px red";
    }
    else {
      input.style.boxShadow = "none";
      return true
    };
  };
};

function verifierPass() {
  for (const input of inputPass) {
    if (!verifierMdp(inputPass[0].value)) {
      input.placeholder = "8 car mini, 1 Maj, 1 car spécial et 1 chiffre";
      input.style.boxShadow = "5px 5px 5px red";
    }
    else if (inputPass[0].value != inputPass[1].value) {
      inputPass[0].style.boxShadow = "none";
      inputPass[1].placeholder = "le mdp n'est pas identique";
      inputPass[1].style.boxShadow = "5px 5px 5px red";
    }
    else {
      return true
    }
  };
};

function verifierForm() {
  verifierText();
  verifierEmail();
  verifierPass();

  if (!verifierText() || !verifierEmail() || !verifierPass()) {
    return false;
  }
  else {
    return true;
  };
};

// form.addEventListener('submit', e => {
//   e.preventDefault(); // Empêcher le formulaire de se soumettre normalement
//   verifierForm();
// });
