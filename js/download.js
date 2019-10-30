$("#download-btn").on('click',function () {
    const name = $("#tp-name").html();
    $("#template-name").html(name);
});

$("#download").on('click',function () {
    const template = $("#template-name").html();
    window.location = "../download.php?template_name="+template;
});