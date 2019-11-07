$("body").on('click',"[id^=download-btn-]",function () {
    var i = $(this).attr("id").split("-")[2];
    var name = $("#tp-name-"+i).html();
    $("#template-name").html(name);
});

$("#download").on('click',function () {
    const template = $("#template-name").html();
    window.location = "/assignment/download.php?template_name="+template;
});

$("#filter-btn").on('click',function () {
    const v = $("#new-type");
    const page = $("#page").html();
    if(v.is(":checked")){
        window.location = "/assignment/template/web.php?page="+page+"&filter=new";
    }else{
        window.location = "/assignment/template/web.php?page="+page+"&filter=dls";
    }
});