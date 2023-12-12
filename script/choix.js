let option = document.getElementById('selectSize');
let price = document.querySelector('.valueProduct');


option.addEventListener('change', () => {
  let optionSize = option.selectedIndex;

  switch (optionSize) {
    case 1:
      price.innerHTML = "7,50 € ";
      break;
    case 2:
      price.innerHTML = "13,50 €";
      break;
    case 3:
      price.innerHTML = "18,90 €";
      break;
    case 4:
      price.innerHTML = "23,90 €";
      break;

    default:
      price.innerHTML = "4,50 €";

  };
})