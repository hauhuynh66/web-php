$("#get-template-info").on('click',function () {
    var name = $("#tp-name").text();
    console.log(name);
    $.ajax({
        type: "GET",
        url: "/assignment/template/info/"+name,
        success: function (data) {
            console.log(data);
            var res = JSON.parse(data);
            $("#edit-template-name").val(res.name);
            $("#edit-template-description").val(res.description);
        },
        error: function (e) {
            console.log(e);
        }
    })
});

$("#edit-template-btn").on('click',function () {
    var name = $("#tp-name").text();
    var nname = $("#edit-template-name").val();
    var description = $("#edit-template-description").val();
    console.log(name);
    $.ajax({
        type: "POST",
        url: "/assignment/template/edit/"+name,
        data:{
            name: nname,
            description: description
        },
        success: function (data) {
            console.log(data);
        },
        error: function (e) {
            console.log(e);
        }
    })
})