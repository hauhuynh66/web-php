var ic = false;
var sel = 0;
$("#change-password-btn").on('click',function () {
    var op = $("#old-password").val();
    var np = $("#new-password").val();
    var npc = $("#pass-confirm").val();
    var username = $("#username").html();
    console.log("a");
    console.log(username);
});

$("body").on('click',".image-button[id^=profile-image]",function () {
    ic = true;
    var id = $(this).attr('id').split("-")[2];
    if(sel!==id&&sel!==0){
        $("#profile-image-"+sel).css('backgroundColor','white');
    }
    sel = id;
    var color = $(this).css('backgroundColor');
    if(color==='rgb(0,0,255)'){
        $(this).css('backgroundColor','white');
    }else{
        $(this).css('backgroundColor','blue');
    }
});

$("#change-img-btn").on('click',function () {
    if(sel==="0"){
        alert("Please select a image");
    }else{
        var id = format(sel);
        var username = $("#username").html();
        $.ajax({
            type: 'POST',
            url: '/assignment/controller/controller.php',
            data: {
                function: "image_update",
                un: username,
                i: id
            },
            success: function (data) {
                if(data==="Ok"){
                    window.location.reload();
                }else{
                    $("#change-image-modal").modal('toggle');
                }
            },
            error: function (e) {
                console.log(e);
            }
        });
    }
});

function format(i) {
    return i>9 ? "0"+i : "00"+i;
}