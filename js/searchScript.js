$(document).ready(function () {
    $("#search").keyup(function () {
        var name = $("#search").val();
        if (name == "") {
            $.ajax({
                type: "POST",
                url: "http://localhost/pages/includes/search.inc.php",
                data: {
                    search: "Everything",
                },
                success: function (html) {
                    $("#display").html(html).show();
                    $(".disabled").attr('controls', false);
                },
            });
        } else {
            $.ajax({
                type: "POST",
                url: "http://localhost/pages/includes/search.inc.php",
                data: {
                    search: name,
                },
                success: function (html) {
                    $("#display").html(html).show();
                    $(".disabled").attr('controls', false);
                },
            });
        }
    });
});
