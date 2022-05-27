function hideIcon() {
    var s = document.getElementById("search");
  
    s.style.backgroundImage='none';
}

function childrenRow() {
    var table = document.getElementById("childTable");
    var row = table.insertRow(2);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
}

function result() {
    window.open("risultati.html")
}

/*
slider
*/

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    slidesPerGroup: 1,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
          slidesPerGroup: 2,
        },
        948: {
          slidesPerView: 3,
          spaceBetween: 20,
          slidesPerGroup: 2,
        },
        1236: {
          slidesPerView: 4,
          spaceBetween: 50,
          slidesPerGroup: 1,
        },
        1650: {
          slidesPerView: 5,
          spaceBetween: 40,
          slidesPerGroup: 1,
        }
      },
  });

/*
jquery per testo animato
*/

$(document).ready(function(){
  $(".div1").animate({opacity: 1,}, 1000, 'swing');
  $(".btn-j").animate({opacity: 1,}, 1000, 'linear');
});