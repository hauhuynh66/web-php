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
            function: "edit_info",
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

$("#add-image-btn").on('click',function () {
    var formData = new FormData();
    var image = $("#new-image").prop('files');
    formData.append('file',image[0]);
    formData.append('tpname',$("#tp-name").text());
    formData.append('function',"add_image");
    $.ajax({
        type: "POST",
        url: "/assignment/template/edit/"+name,
        enctype: 'multipart/form-data',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            if(data=="OK"){
                window.location.reload();
            }
        },
        error: function (e) {
            console.log(e);
        }
    })
});

