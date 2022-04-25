function hideIcon() {
    var s = document.getElementById("search");
  
    s.style.backgroundImage='none';
}

function result() {
    window.open("risultati.html")
}

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
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
          slidesPerGroup: 1,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 50,
          slidesPerGroup: 1,
        },
      },
  });

  function addRows(){ 
    var table = document.getElementById('pasto');
    var rowCount = table.rows.length;
    var cellCount = table.rows[0].cells.length;
    var row = table.insertRow(rowCount);
    for(var i=0; i < cellCount; i++){
      var cell = 'cell'+i;
      cell = row.insertCell(i);
      var copycel = document.getElementById('col'+i).innerHTML;
      cell.innerHTML=copycel;
    }
  }
  function deleteRows(){
    var table = document.getElementById('pasto');
    var rowCount = table.rows.length;
    if(rowCount > '1'){
      var row = table.deleteRow(rowCount-1);
      rowCount--;
    }
  }