<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link href="..\..\css\user\signIn.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
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

            <h3>MEMBER SIGN IN FOR<br></h3>
            <span> GLORY</span><br><br>
            <img src="../../img/logo/logo_yellow_vertical.png" alt="Image not available">
            <br><br>
            <blockquote>The last three or four reps is what makes the muscle grow.<br> This area of pain divides a champion
                from someone who is not a champion
            </blockquote>
            <br>
            <form action="../includes/member_login.inc.php" method="post">
                <input type="text" name="email" placeholder="Email">
                <br />
                <input type="password" name="pwd" placeholder="Password">
                <br />
                <button type="submit" name="submit">Sign In</button>
            </form>

            <br>
            <a href="signup.php">Don't have an account?</a>
            <br>
            <a href="../admin/admin_login.php">Admin Login</a>
            <br>
            <a href="../trainer/trainer_login.php">Trainer Login</a>
            <?php 
                if(isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<script>  $(document).ready(function(){
                            window.setTimeout(function(){
                                alert('Fill all the fields');
                            }, 100); 
                          });</script>";
                    }
                    else if ($_GET["error"] == "wronglogin") {
                        echo "<script>  $(document).ready(function(){
                            window.setTimeout(function(){
                                alert('Invalid Login Credentials');
                            }, 100); 
                          });</script>";
                    }
                    else if ($_GET["error"] == "wrongpassword") {
                        echo "<script>  $(document).ready(function(){
                            window.setTimeout(function(){
                                alert('Invalid Password');
                            }, 100); 
                          });</script>";
                    }
                    else if ($_GET["error"] == "none") {
                        echo "<script>  $(document).ready(function(){
                            window.setTimeout(function(){
                                alert('Congratulations you have signed up Signin to get started');
                            }, 100); 
                          });</script>";
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