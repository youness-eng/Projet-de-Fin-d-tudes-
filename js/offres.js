const expand = () => {
const input = document.querySelector("#rechercher-input");
const span = document.querySelector(".span");
const searchBtn = document.querySelector("#rechercher-btn");
  searchBtn.classList.toggle("fermer");
  input.classList.toggle("rectangle");
  span.classList.toggle("disparaitre");
  
};

var swiper = new Swiper('.swiper-container', {
  effect: 'coverflow',
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: 'auto',
  coverflowEffect: {
    rotate: 30,
    stretch: 0,
    depth: 200,
    modifier: 1,
    slideShadows: true,
  },
  pagination: {
    el: '.swiper-pagination',
  },
});