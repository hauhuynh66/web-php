var ic = false;
var sel = 0;

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
                if(data==="OK"){
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

$("#change-password-confirm").on('click',function () {
    var op = $("#old-password").val();
    var np = $("#new-password").val();
    var npc = $("#pass-confirm").val();
    if(np.length<8){
        $("#p-error").empty();
        $("#p-error").append("<p class='alert alert-danger'>Password must have at least 8 character</p>");
    }else if(npc!==np){
        $("#p-error").empty();
        $("#p-error").append("<p class='alert alert-danger'>Re-Password does not match </p>");
    }else{
        $.ajax({
            type: "POST",
            url: "/assignment/controller/controller.php",
            data: {
                function: "update_password",
                op: op,
                np: np
            },
            success: function (data) {
                $("#p-error").empty();
                if(data==="SUCCESS"){
                    $("#p-error").append("<p class='alert alert-success'>"+data+"</p>");
                }else{
                    $("#p-error").append("<p class='alert alert-danger'>"+data+"</p>");
                }
            },
            error: function (e) {
                console.log(e);
            }
        });
    }
});

$("#change-info-confirm").on('click',function () {
    var fname = $("#edit-firstname").val();
    var lname = $("#edit-lastname").val();
    var username = $("#edit-username").val();
    var email = $("#edit-email").val();
    var github = $("#edit-github").val();
    var facebook = $("#edit-facebook").val();
    var twitter = $("#edit-twitter").val();
    $.ajax({
        type: "POST",
        url: "/assignment/controller/controller.php",
        data: {
            function: "update_info",
            fname: fname,
            lname: lname,
            username: username,
            email: email,
            github: github,
            facebook: facebook,
            twitter: twitter
        },
        success: function (data) {
            if(data==="SUCCESS"){
                window.location.reload();
            }else{
                alert(data);
            }
        },
        error: function (e) {
            console.log(e);
        }
    });
});

function format(i) {
    return i>9 ? "0"+i : "00"+i;
}