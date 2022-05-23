function hideIcon() {
    var s = document.getElementById("search");
    s.style.backgroundImage='none';
}

function result() {
    window.open("risultati.html")
}

let swiper = new Swiper(".mySwiper", {
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
        972: {
          slidesPerView: 3,
          spaceBetween: 20,
          slidesPerGroup: 2,
        },
        1336: {
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

  
  
  //JQUERY

  $(document).ready(function(){

   
    // first-category
    var original = $("#centered1").text();
       
        $("#centered1").mouseenter(function(){
        $("#centered1").text("Vuoi conoscere le nostre letture consigliate sulla dieta e scoprire i consigli degli esperti del settore?").css("font-size", "18px");
        $("#centered1").css("background-color", "rgba(255, 255, 255, 0.4)");
      });
      $("#centered1").mouseleave(function(){
        $("#centered1").text(original).css("font-size","28px");
        $("#centered1").css("font-style", "normal");
        $("#centered1").css("background-color", "transparent");
      });
    
    // second category
      var or2 = $("#centered2").text();
      $("#centered2").mouseenter(function(){
        $("#centered2").text("Scopri le nostre letture consigliate che racchiudono le migliori ricette salutari").css("font-size", "18px");
        $("#centered2").css("background-color", "rgba(255, 255, 255, 0.4)");
      });
      $("#centered2").mouseleave(function(){
        $("#centered2").text(or2).css("font-size","28px");
        $("#centered2").css("font-style", "normal");
        $("#centered2").css("background-color", "transparent");
      });

      // third category 
      var or3 = $("#centered3").text();
      $("#centered3").mouseenter(function(){
        $("#centered3").text("Quanto sono importanti l'allenamento e l'attività fisica nella nostra vita?").css("font-size", "18px");
        $("#centered3").css("background-color", "rgba(255, 255, 255, 0.4)");
      }, 1000);
      $("#centered3").mouseleave(function(){
        $("#centered3").text(or3).css("font-size","28px");
        $("#centered3").css("font-style", "normal");
        $("#centered3").css("background-color", "transparent");
      });



  });
