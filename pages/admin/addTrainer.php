<?php 
  include_once '../includes/dbh.inc.php';  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="\css\trainer\editVideo.css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>

    <title>Add Trainer</title>
</head>

<body>

    <?php 
    require('../../components/basic/header.php')
  ?>

    <?php
    if(isset($_POST['yourTrainer'])){
        header("Location: ./trainerList.php");
    }
    if(isset($_POST['logout'])){
        header("Location: ../includes/logout.inc.php");
    }
    if(isset($_POST['addTrainer'])){
        header("Location: ./addTrainer.php");
    }
    ?>

    <div class="container">
        <div class="left profile">
            <form class="profileForm" method="post">
                <input type="submit" class="profileButton" name="yourTrainer" value="Your Trainers" />
                <input type="submit" class="profileButton active" name="addTrainer" value="Add Trainer" />
                <input type="submit" class="profileButton" id="bottom-curve" name="logout" value="Logout" />
            </form>
            <hr>
            <?php 
          $admin_id = $_SESSION['admin_userid'];
          $sql = "Select * from gymAdmin WHERE Admin_id = $admin_id"; 
          $result = mysqli_query($conn,$sql);
          $resultCheck = mysqli_num_rows($result);
        
          if ($resultCheck > 0) {
            $row = mysqli_fetch_assoc($result);
          }
        ?>
            <div class="profileDetail">
                <?php echo "<p>". $row['Admin_Name'] . "</p>" ?>
                <?php echo "<p>". $row['Admin_Email']." </p>"?>
            </div>

            <div class="profileImage">
                <img class="roundImage" src="../../img/img_avatar.png" alt="Avatar">
            </div>

        </div>

        <div class="right">
            <div class="top">
                <p>Add Trainer Details</p>
                <!-- <input style="margin-right: 20px" type="submit" value="Cancel" name="cancel" />
                <input type="submit" value="Save" name="save" /> -->
            </div>
            <hr style="margin: 0 20px 0 20px" />
            <div class="bottom">
                <form class="editForm" action="../includes/admin/addTrainer.inc.php" method="post"
                    enctype="multipart/form-data">
                    <div class="row">

                        <!-- <div class="col group">
                            <label for="Workout Video">Trainer Image</label>
                            <input type="file" name="image" />
                        </div> -->

                        <div class="col group">
                            <label id="Name" for="title name">Name</label>
                            <input id="typedInput" type="text" name="uname" placeholder="Name" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="group col">
                            <label for="title name">Phone Number</label>
                            <input id="typedInput" type="tel" name="number"
                                placeholder="Phone Number" />
                        </div>
                        <div class="group col">
                            <label for="subtitle name">Admin ID</label>
                            <input id="typedInput" type="number" name="admin_id"
                                value="<?php echo $row['Admin_id']; ?>" />
                        </div>
                    </div>
                    <div class="group">
                        <label for="tag name">Trainer Email</label>
                        <input id="typedInput" type="text" name="email" placeholder="Email" />
                    </div>
                    <div class="group">
                        <label for="description">Trainer Password</label>
                        <input id="typedInput" type="password" name="pwd" placeholder="Password" />
                    </div>
                    <div class="group">
                        <label for="description">Confirm Trainer Password</label>
                        <input id="typedInput" type="password" name="confirm-pwd" placeholder="Confirm Password" />
                    </div>
                    <div class="submitGroup">
                        <input type="submit" name="submit" value="Add Trainer">
                    </div>
                </form>
                <?php 
                if(isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<script>  $(document).ready(function(){
                            window.setTimeout(function(){
                                alert(' Fill all the fields');
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
                                alert(' Passwords do not match');
                            }, 100); 
                          });</script>";
                    }
                    else if ($_GET["error"] == "emailExists") {
                        echo "<script>  $(document).ready(function(){
                            window.setTimeout(function(){
                                alert(' Email already exists. Try logging in');
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
                                alert('Congratulations you have successfully added the trainer');
                            }, 100); 
                          });</script>";
                    }   
                 }
          ?>
            </div>
        </div>
    </div>

    <?php 
        require('../../components/basic/footer.php')
    ?>
</body>

</html>