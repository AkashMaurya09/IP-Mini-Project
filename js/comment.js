setInterval(
    function () {
        $(document).ready(function () {
            var video_id = $("#video_id").val();
            $.ajax({
                type: "GET",
                url: "../includes/comments.php?Video_id=" + video_id,
                success: function (html) {
                    $(".trainerList").remove();
                    $(".right").append(html);
                },
            });
        });
    }, 1000
)
$(document).ready(function () {
$("#add_com").click(function () {
    var comment_text = $("#comment_text").val();
    if (comment_text.length) {
        var video_id = $("#video_id").val();
        var currentdate = new Date();
        var datetime = currentdate.getFullYear() + '-' + (currentdate.getMonth() + 1) + '-' + currentdate.getDate() + ' ' + currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();

        var comment = $("#comment_text").val();
        $.ajax({
            type: "POST",
            url: "../includes/comments.php",
            data : {
                video_id : video_id,
                timestamp : datetime,
                comment : comment_text,
            },
            success: function (html) {                
                $("#comment_text").val('');
                // alert("Comment Added");
            },
        });
    }
});
});
