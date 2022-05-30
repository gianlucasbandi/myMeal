/*----------animazione card------------*/

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
});
