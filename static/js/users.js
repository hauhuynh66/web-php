$(document).ready(function () {
    $("#userTable").DataTable();
});

$("body").on('click','[id^=ban-btn]',function () {
    const id = $(this).attr('id');
    const i = id.split("-")[2];
    const username = $("#username-"+i).html();
    ban(username);
});

function ban(username) {
    $.ajax({
        type: "POST",
        url: '/assignment/controller/controller.php',
        data: {
            function: "block",
            username: username
        },
        success: function (data) {
            console.log(data)
        },
        error: function (e) {
            console.log(e);
        }
    });
}