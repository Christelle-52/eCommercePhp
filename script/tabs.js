let tabLink = document.querySelectorAll('.tabs a');

for (let i = 0; i < tabLink.length; i++) {
  tabLink[i].addEventListener('click', function (event) {
    event.preventDefault();
    document.querySelector('.tabContent.active').classList.remove('active');
    document.querySelector('.tabs a.active').classList.remove('active');
    event.target.classList.add('active');
    document.querySelector(`.${event.target.dataset.open}`).classList.add('active');
  })
}