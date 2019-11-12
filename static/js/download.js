$("body").on('click',"[id^=download-btn-]",function () {
    var i = $(this).attr("id").split("-")[2];
    var name = $("#tp-name-"+i).html();
    $("#template-name").html(name);
});

$("#download").on('click',function () {
    const template = $("#template-name").html();
    window.location = "/assignment/controller/download.php?template="+template;
    setInterval(function () {
        window.location.reload();
    },500);
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