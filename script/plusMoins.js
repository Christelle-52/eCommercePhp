let boutonPlus = document.querySelectorAll('.boutonPlus');
let boutonMoins = document.querySelectorAll('.boutonMoins');
let inputValue = document.getElementsByName('qty');

for (let i = 0; i < boutonPlus.length; i++) {

  boutonPlus[i].addEventListener('click',()  => {
    inputValue[i].value = Number(inputValue[i].value) + 1;
  });
};

for (let i = 0; i < boutonMoins.length; i++) {

  boutonMoins[i].addEventListener('click', () => {
    if (Number(inputValue[i].value) != "1") {
      inputValue[i].value = Number(inputValue[i].value) - 1;
    }
    else {
      inputValue[i].value = Number(inputValue[i].value);
    }
  });
};



