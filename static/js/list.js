$("#templateTable").DataTable({"lengthMenu":[[20,40,100,250],[20,40,100,250]],"scrollX": true,"order":[[1,"asc"]],});
var delete_name = "";
$("body").on('click',"[id^=template-delete]",function () {
    var id = $(this).attr('id').split("-")[2];
    var name = $("#template-"+id).text();
    delete_name = name;
});

$("#proceed-btn").on('click',function () {
    $.ajax({
        type: "POST",
        url: "/assignment/delete/template/"+delete_name,
        success: function (data) {
            console.log(data);
            if(data=="OK"){
                window.location.reload();
            }
        },
        error: function (e) {
            console.log(e);
        }
    });
});

$("body").on('click',"[id^=template-info-btn]",function () {
    var id = $(this).attr('id').split("-")[3];
    var name = $("#template-"+id).text();
    $.ajax({
        type: "GET",
        url: "/assignment/template/info/"+name,
        success: function (data) {
            var res = JSON.parse(data);
            $("#template-name").text(res.name);
            $("#template-uploader").text(res.uploader);
            $("#template-type").text(res.type);
            $("#template-date").text(res.upload_date);
        },
        error: function (e) {
            console.log(e);
        }
    })
});