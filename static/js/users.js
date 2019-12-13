var username = "";
var action = "";

$(document).ready(function () {
    $("#userTable").DataTable();
});
$("#userTable").DataTable({"lengthMenu":[[20,40,100,250],[20,40,100,250]],"scrollX": true,"order":[[1,"asc"]],});

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

$("body").on('click',"[id^=profile-btn]",function () {
    var id = $(this).attr('id').split("-")[2];
    var username = $("#username-"+id).html();
    console.log(username);
    $.ajax({
        type: "GET",
        url: "/assignment/profile/get/"+username,
        success: function (data) {
            var res = JSON.parse(data);
            console.log(res);
            $("#user-role").text(res.role);
            var path = "/assignment/static/vendor/icon/animal/"+res.picture+".svg";
            $("#profile-image").attr('src',path);
            $("#profile-username").text(res.username);
            $("#profile-firstname").text(res.firstname);
            $("#profile-lastname").text(res.lastname);
            $("#profile-email").text(res.email);
            $("#profile-facebook").text(res.facebook);
            $("#profile-twitter").text(res.twitter);
            $("#profile-github").text(res.github);
            $("#profile-uploaded").text(res.uploaded);
            $("#profile-join").text(res.date);
        },
        error: function (e) {
            console.log(e);
        }
    })
});

function ban(username) {
    $.ajax({
        type: "POST",
        url: '/assignment/profile/update',
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
        url: '/assignment/profile/update',
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