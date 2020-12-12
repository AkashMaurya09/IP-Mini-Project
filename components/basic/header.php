<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/common/header.css">
    <title>Gym</title>
</head>
<style>


</style>

<body>
    <nav class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
                <img src="/img/logo/logo_yellow_horizontal.png">
            </div>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>

        <div class="nav-links">
            <a href="/pages/member/home.php" target="">Home</a>
            <a href="/pages/member/workouts.php" target="">Workout</a>
            <a href="/pages/member/contact.php" target="">Contacts</a>
            <a href="/pages/member/aboutus.php" target="">About Us</a>
            <?php 
            if (isset($_SESSION["memberid"])) {
              echo "<a href='../../pages/member/videoList.php'>Dashboard</a>";
              echo "<a href='../includes/logout.inc.php'>Logout</a>";
            }
            elseif (isset($_SESSION["admin_userid"])) {
              echo "<a href='../../pages/admin/trainerList.php'>Dashboard</a>";
              echo "<a href='../includes/logout.inc.php'>Logout</a>";
            }
            elseif (isset($_SESSION["trainer_userid"])) {
              echo "<a href='../../pages/trainer/trainerVideoList.php'>Dashboard</a>";
              echo "<a href='../includes/logout.inc.php'>Logout</a>";
            }
            else {
              echo "<a href='../member/signIn.php'>Login</a>";
            }
          ?>
        </div>
    </nav>


</body>

</html>