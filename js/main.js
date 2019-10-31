const brand = "Templates<sup>TM</sup>";
const item1 = "Dashboard";
const item2 = "Powerpoint";
const item3 = "Web";
const item4 = "Upload";
const item5 = "About";
var toggle = 0;
$("#menu-collapse").on('click',function () {
    toggle++;
    sidebarToggle(toggle%2);
});

function sidebarToggle(i) {
    if(i===1){
        if($(window).width()>=992){
            $("#sidebar").removeClass("col-mb-3 col-lg-3 col-xl-3").addClass("col-mb-2 col-lg-1 col-xl-1");
            $("#content").removeClass("col-mb-9 col-lg-9 col-xl-9").addClass("col-mb-10 col-lg-11 col-xl-11");
            $("#side-brand").html("");
        }else{
            $("#sidebar").hide();
        }
        /*$("a.dashboard-brand").html("");
        $("a.powerpoint-brand").html("");
        $("a.web-brand").html("");
        $("a.upload-brand").html("");
        $("a.about-brand").html("");*/
        $(".sidebar-text").children("span").css("display", "none");
    }else{
        if($(window).width()>=992) {
            $("#sidebar").addClass("col-mb-3 col-lg-3 col-xl-3").removeClass("col-mb-2 col-lg-1 col-xl-1");
            $("#content").addClass("col-mb-9 col-lg-9 col-xl-9").removeClass("col-mb-10 col-lg-11 col-xl-11");
            $("#side-brand").html(brand);
        }else{
            $("#sidebar").show();
        }
        $(".sidebar-text").children("span").css("display", "inline");
    }
}

$(window).resize(function () {
    if($(window).width()>=992){
        $("#sidebar").show();
        sidebarToggle(0);
        toggle++;
    }else{
        $("#sidebar").show();
        $("a.dashboard-brand").html(item1);
        $("a.powerpoint-brand").html(item2);
        $("a.web-brand").html(item3);
        $("a.upload-brand").html(item4);
        $("a.about-brand").html(item5);
    }
});

$("#logout-btn").on('click',function () {
     window.location = "../script/logout.php";
});

$("#profile-btn").on('click',function () {
    window.location = "../templates/profile.php";
});

$("a[id^='lang']").on('click',function () {
    var locale = $(this).attr('id').split("-")[1];
    console.log(locale);
    $.ajax({
        type: "POST",
        data: {
            locale: locale
        },
        url: "../script/locale.php",
        success: function (data) {
            window.location.reload();
            console.log(data);
        },
        error: function (e) {
            console.log(e);
        }
    });
});

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        $("#myBtn").style.display = "block";
    } else {
        $("#myBtn").style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}