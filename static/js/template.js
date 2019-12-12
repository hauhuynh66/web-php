$("#get-template-info").on('click',function () {
    var name = $("#tp-name").text();
    $.ajax({
        type: "GET",
        url: "/assignment/template/info/"+name,
        success: function (data) {
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
    $.ajax({
        type: "POST",
        url: "/assignment/template/edit/"+name,
        data:{
            name: nname,
            description: description
        },
        success: function (data) {
            if(data.split("-")[0]==="SUCCESS"){
                var type = data.split("-")[1];
                if(type==="powerpoint"){
                    window.location = "/assignment/ppt-preview/"+nname;
                }else{
                    window.location = "/assignment/web-preview/"+nname;
                }

            }else{
                alert(data);
            }
        },
        error: function (e) {
            console.log(e);
        }
    })
});

$("#search-btn").on('click',function () {
    var type = $("#filter-type").text();
    var str = $("#search-param").val();
    window.location = '/assignment/search/'+type+"&"+str;
});

