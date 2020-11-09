<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link href="..\css\signUp.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
  require('../components/basic/header.php')
?>

    <main>
        <div class="center">
            <img src="../img/logo.png">
            <h3>SIGN UP FOR<br></h3>
            <span> GLORY</span>
            <form action="includes/signup.php" method="post">
                <input type="text" name="email" placeholder="Email">
                <br />
                <input type="text" name="uname" placeholder="Username">
                <br />
                <input type="number" name="number" placeholder="Phone Number">
                <br />
                <input type="date" name="dob" placeholder="Date of Birth">
                <br />
                <input type="password" name="pwd" placeholder="Password">
                <br />
                <input type="password" name="confirm-pwd" placeholder="Confirm Password">
                <br />
                <button type="submit">Register</button>
            </form>
            <i>Already have an account?</i>
        </div>
    </main>



    <?php 
  require('../components/basic/footer.php')
?>
</body>

</html>