$("#download-btn").on('click',function () {
    const name = $("#tp-name").html();
    $("#template-name").html(name);
});

$("#download").on('click',function () {
    const template = $("#template-name").html();
    window.location = "../download.php?template_name="+template;
});

$("#filter-btn").on('click',function () {
    const v = $("#new-type");
    const page = $("#page").html();
    if(v.is(":checked")){
        window.location = "../templates/web.php?page="+page+"&filter=new";
    }else{
        window.location = "../templates/web.php?page="+page+"&filter=dls";
    }
});