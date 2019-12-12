$("#review-post").on('click',function () {
    var template = $("#tp-name").text();
    var content = $("#comment").val();
    var rating = $("#star input[name='rating']:checked").val();
    $.ajax({
        type: "POST",
        url: "/assignment/review/add",
        data: {
            template: template,
            comment: content,
            rating: rating
        },
        success: function (data) {
            if(data==="OK"){
                window.location.reload();
            }
        },
        error: function (e) {
            console.log(e);
        }
    })
});