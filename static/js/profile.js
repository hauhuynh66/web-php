var ic = false;
var sel = 0;
$("#change-password-btn").on('click',function () {
    var op = $("#old-password").val();
    var np = $("#new-password").val();
    var npc = $("#pass-confirm").val();
    var username =
    console.log("a");
    console.log(username);
});

$(".image-button").on('click',function () {
    ic = true;
    var color = $(this).css('backgroundColor');
    if(color==='rgb(0,0,255)'){
        $(this).css('backgroundColor','white');
    }else{
        $(this).css('backgroundColor','blue');
    }
});