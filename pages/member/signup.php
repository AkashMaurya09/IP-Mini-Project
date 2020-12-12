<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link href="..\..\css\user\signUp.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>

<body>
    <?php 
  require('../../components/basic/header.php')
?>

    <main>
        <div class="center">

            <h3>SIGN UP FOR<br></h3>
            <span> GLORY</span><br><br>
            <img src="../../img/logo/logo_yellow_vertical.png" alt="Image not available">
            <br><br>
            <blockquote>The last three or four reps is what makes the muscle grow.<br> This area of pain divides a champion
                from someone who is not a champion
            </blockquote>
            <br>
            <form action="../includes/member_signup.inc.php" method="post">
                <input type="text" name="email" placeholder="Email">
                <br />
                <input type="text" name="uname" placeholder="Username">
                <br />
                <input type="number" name="number" placeholder="Phone Number">
                <br />
                <input type="password" name="pwd" placeholder="Password">
                <br />
                <input type="password" name="confirm-pwd" placeholder="Confirm Password">
                <br />
                <button type="submit" name="submit">Register</button>
            </form>
            <a href="signIn.php">Already have an account?</a>
            <?php 
                if(isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<script>  $(document).ready(function(){
                            window.setTimeout(function(){
                                alert('Fill all the fields');
                            }, 100); 
                          });</script>";
                    }
                    else if ($_GET["error"] == "invalidusername") {
                        echo "<script>  $(document).ready(function(){
                            window.setTimeout(function(){
                                alert('Invalid Name');
                            }, 100); 
                          });</script>";
                    }
                    else if ($_GET["error"] == "invalidemail") {
                        echo "<script>  $(document).ready(function(){
                            window.setTimeout(function(){
                                alert('Invalid Email');
                            }, 100); 
                          });</script>";
                    }
                    else if ($_GET["error"] == "passworddontmatch") {
                        echo "<script>  $(document).ready(function(){
                            window.setTimeout(function(){
                                alert('Passwords do not match');
                            }, 100); 
                          });</script>";
                    }
                    else if ($_GET["error"] == "emailExists") {
                        echo "<script>  $(document).ready(function(){
                            window.setTimeout(function(){
                                alert('Email already exists. Try logging in');
                            }, 100); 
                          });</script>";
                    }
                    else if ($_GET["error"] == "stmtFailed") {
                        echo "<script>  $(document).ready(function(){
                            window.setTimeout(function(){
                                alert('Something went wrong');
                            }, 100); 
                          });</script>";
                    }
                    else if ($_GET["error"] == "none") {
                        echo "<script>  $(document).ready(function(){
                            window.setTimeout(function(){
                                alert('Congratulations you have signed up');
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