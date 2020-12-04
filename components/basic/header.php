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
    <title>Document</title>
</head>
<style>


</style>
<body>
    <div class="nav">
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
            if (isset($_SESSION["userName"])) {
              echo "<a href='profile.php'>Profile</a>";
              echo "<a href='../includes/logout.inc.php'>Logout</a>";
            }
            elseif (isset($_SESSION["admin_userid"])) {
              echo "<a href='../../pages/admin/addTrainer.php'>Add Trainer</a>";
              echo "<a href='../../pages/admin/trainerList.php'>Trainer List</a>";
              echo "<a href='../includes/logout.inc.php'>Logout</a>";
            }
            elseif (isset($_SESSION["trainer_userid"])) {
              echo "<a href='../../pages/trainer/addVideo.php'>Add Video</a>";
              echo "<a href='../../pages/trainer/editVideo.php'>Edit Video</a>";
              echo "<a href='../includes/logout.inc.php'>Logout</a>";
            }
            else {
              echo "<a href='../member/signin.php'>Login</a>";
            }
          ?>
        </div>
	</div>
	  
     
</body>
</html>

 
