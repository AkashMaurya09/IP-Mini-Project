<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link href="..\..\css\user\signIn.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>

<body>
  <?php 
    require('../../components/basic/header.php')
  ?>

    <main>
      <div class="center">

        <h3>TRAINER SIGN IN FOR<br></h3>
          <span> GLORY</span><br><br>
          <img src="../../img/logo/logo_yellow_vertical.png" alt="Image not available">
          <br><br>
          <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias dolores sed libero<br> unde esse
                  soluta voluptates animi error reprehenderit porro!</blockquote>
          <br>
          <form action="../includes/trainer_login.inc.php" method="post">
            <input type="text" name="email" placeholder="Email">
              <br />
              <input type="password" name="pwd" placeholder="Password">
              <br />
              <button type="submit" name="submit">Sign In</button>

          </form>
          <br>
          <a href="../admin/admin_login.php">Admin Login</a>
          <br>
          <a href="../member/signIn.php">Member Login</a>
          <?php 
                  if(isset($_GET["error"])) {
                      if ($_GET["error"] == "emptyinput") {
                          echo "<p> Fill all the fields";
                      }
                      else if ($_GET["error"] == "wronglogin") {
                          echo "<p> Invalid Login Credentials </p>";
                      }
                      else if ($_GET["error"] == "wrongpassword") {
                          echo "<p> Invalid Password </p>";
                      }                    
                  }
          ?>
      </div>
    </main>

  <?php 
    require('../../components/basic/footer.php')
  ?>

</body>

</html>