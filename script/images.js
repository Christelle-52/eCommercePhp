let arrayImages = document.querySelectorAll('.image'); //récupère un tableau de img1 à img3
// console.log(arrayImages);

//array.forEach(fct(elmt)){code} + this pour modif
arrayImages.forEach(function (img) {
  img.addEventListener('click', function () {
    // console.log(img);
    let changeImg = document.getElementById('changeImage');
    changeImg.src = this.src;
  });
});