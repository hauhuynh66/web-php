var username = "";
var action = "";

$(document).ready(function () {
    $("#userTable").DataTable();
});

$("body").on('click','[id^=ban-btn]',function () {
    const id = $(this).attr('id');
    const i = id.split("-")[2];
    username = $("#username-"+i).html();
    action = "ban";
    $("#confirm-modal").modal('show');
});

$("body").on('click','[id^=unban-btn]',function () {
    const id = $(this).attr('id');
    const i = id.split("-")[2];
    username = $("#username-"+i).html();
    action = "unban";
    $("#confirm-modal").modal('show');
});

$("#proceed-btn").on('click',function () {
    if(action==="ban"){
        ban(username);
    }else if(action==="unban"){
        unban(username);
    }
});

function ban(username) {
    $.ajax({
        type: "POST",
        url: '/assignment/controller/controller.php',
        data: {
            function: "ban",
            username: username
        },
        success: function (data) {
            if (data==="OK"){
                window.location.reload();
            }
        },
        error: function (e) {
            console.log(e);
        }
    });
}

function unban(username) {
    $.ajax({
        type: "POST",
        url: '/assignment/controller/controller.php',
        data: {
            function: "unban",
            username: username
        },
        success: function (data) {
            if (data==="OK"){
                window.location.reload();
            }
        },
        error: function (e) {
            console.log(e);
        }
    });
}