$(document).ready(function () {
  $("#search").keyup(function () {
    var name = $("#search").val();
    if (name == "") {
      $.ajax({
        type: "POST",
        url: "../includes/searchTrainers.inc.php",
        data: {
          search: "Everything",
        },
        success: function (html) {
          $("#display").html(html).show();
        },
      });
    } else {
      console.log(name)
      $.ajax({
        type: "POST",
        url: "../includes/searchTrainers.inc.php",
        data: {
          search: name,
        },
        success: function (html) {
          $("#display").html(html).show();
        },
      });
    }
  });
});
