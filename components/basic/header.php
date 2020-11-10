<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <title>Document</title>
</head>
<style>


</style>
<body>
    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
          <div class="nav-title">
          <img src="../img/logo_yellow.png">
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
          <a href="home.php" target="">Home</a>
          <a href="workouts.php" target="">Workout</a>
          <a href="contact.php" target="">Contacts</a>
          <a href="aboutus.php" target="">About Us</a>
          <?php 
            if (isset($_SESSION["userName"])) {
              echo "<a href='profile.php'>Profile</a>";
              echo "<a href='includes/logout.inc.php'>Logout</a>";
            }
            else {
              echo "<a href='signin.php'>Login</a>";
            }
          ?>
        </div>
	</div>
	  
     
</body>
</html>

 
