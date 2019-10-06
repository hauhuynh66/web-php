const brand = "Site Brand";
var toggle = 0;
$("#menu-collapse").on('click',function () {
    toggle++;
    sidebarToggle(toggle%2);
});

function sidebarToggle(i) {
    if(i===1){
        $("#sidebar").removeClass("col-mb-3 col-lg-3 col-xl-3").addClass("col-mb-1 col-lg-1 col-xl-1");
        $("#content").removeClass("col-mb-9 col-lg-9 col-xl-9").addClass("col-mb-11 col-lg-11 col-xl-11");
        $("#side-brand").text("");
        $(".normal-text").css({'font-size': 10});
        $(".item").css({'font-size':8});
    }else{
        $("#sidebar").addClass("col-mb-3 col-lg-3 col-xl-3").removeClass("col-mb-1 col-lg-1 col-xl-1");
        $("#content").addClass("col-mb-9 col-lg-9 col-xl-9").removeClass("col-mb-11 col-lg-11 col-xl-11");
        $("#side-brand").text(brand);
        $(".normal-text").css({'font-size': 18});
        $(".item").css({'font-size':12});
    }
}