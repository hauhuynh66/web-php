$("body").on('click',"[id^=download-btn-]",function () {
    var i = $(this).attr("id").split("-")[2];
    var name = $("#tp-name-"+i).html();
    $("#template-name").text(name);
});

$("#download-btn").on('click',function () {
    var name = $("#tp-name").html();
    $("#template-name").text(name);
});

$("#download").on('click',function () {
    var template = $("#template-name").html();
    window.location = "/assignment/download/"+template;
    /*setTimeout(function () {
        window.location.reload();
    },1000);*/
});

$("body").on('click',"[id^=filter-]",function () {
    const id = $(this).attr("id");
    const type = id.split("-")[1];
    const v = $("#new-type");
    const page = $("#page").html();
    console.log(type);
    if(type==="ppt"){
        if(v.is(":checked")){
            window.location = "/assignment/powerpoint/page1&new";
        }else{
            window.location = "/assignment/powerpoint/page1&dls";
        }
    }else{
        if(v.is(":checked")){
            window.location = "/assignment/web/page1&new";
        }else{
            window.location = "/assignment/web/page1&dls";
        }
    }

});