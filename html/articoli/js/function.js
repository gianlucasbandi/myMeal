$(document).ready(function(){
    $("#image1").mouseover(function(){
        $(this).css("transform","scale(1.03)");
        $("#card-hover1").css("font-size","28px");
    });
    $("#image1").mouseleave(function(){
        $(this).css("transform","scale(1.00)");
        $("#card-hover1").css("font-size","23px");
    });
    $("#image2").mouseover(function(){
        $(this).css("transform","scale(1.03)");
        $("#card-hover2").css("font-size","28px");
    });
    $("#image2").mouseleave(function(){
        $(this).css("transform","scale(1.00)");
        $("#card-hover2").css("font-size","23px");
    });
    $("#image3").mouseover(function(){
        $(this).css("transform","scale(1.03)");
        $("#card-hover3").css("font-size","28px");
    });
    $("#image3").mouseleave(function(){
        $(this).css("transform","scale(1.00)");
        $("#card-hover3").css("font-size","23px");
    });

    $("#tag1,#tag4").css("background","green");
    $("#tag2,#tag5").css("background","#1F497D");
    $("#tag3,#tag6").css("background","#C0504D");
});

/*--------------------------*/

$(document).ready(function(){
    $("#card-dw1").mouseover(function(){
        $(this).css("transform","scale(1.02)");
    });
    $("#card-dw1").mouseleave(function(){
        $(this).css("transform","scale(1.00)");
    });
    $("#card-dw2").mouseover(function(){
        $(this).css("transform","scale(1.02)");
    });
    $("#card-dw2").mouseleave(function(){
        $(this).css("transform","scale(1.00)");
    });
    $("#card-dw3").mouseover(function(){
        $(this).css("transform","scale(1.02)");
    });
    $("#card-dw3").mouseleave(function(){
        $(this).css("transform","scale(1.00)");
    });
});

function readingTime() {
    const paroleMin = 250;
    const text = document.getElementById("articoli").innerText;
    const arr = text.trim();
    const words = arr.split(/\s+/).length;
    const time = Math.ceil(words / paroleMin);
    document.getElementById("time").innerText = time;
    }

$(document).ready(function(){
    readingTime();
});

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
        768: {
            slidesPerView: 3,
            spaceBetween: 40,
            slidesPerGroup: 1,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 50,
            slidesPerGroup: 1,
        },
    },
});

