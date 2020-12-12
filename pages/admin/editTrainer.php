<?php 
  include_once '../includes/dbh.inc.php';  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/trainer/editVideo.css" />


    <title>Edit Trainer</title>
</head>

<body>

    <?php 
    require('../../components/basic/header.php')
  ?>

  <?php
    if(isset($_POST['addTrainer'])){
        header("Location: ./addTrainer.php");
    }

    if(isset($_POST['yourTrainer'])){
        header("Location: ./trainerList.php");
    }
  ?>

    <div class="container">
        <div class="left profile">
            <form class="profileForm">
                <input type="submit" class="profileButton" name="addTrainer" value="Add Trainer" />
                <input type="submit" class="profileButton" name="yourTrainer" value="Your Trainers" />
                <input type="submit" + class="profileButton" id="bottom-curve" name="logout" value="Logout" />
            </form>
            <hr>
            <?php 
          $admin_id = $_SESSION['admin_userid'];
          $sql = "Select * from gymadmin WHERE Admin_id = $admin_id"; 
          $result = mysqli_query($conn,$sql);
          $resultCheck = mysqli_num_rows($result);
        
          if ($resultCheck > 0) {
            $row = mysqli_fetch_assoc($result);
          }
        ?>
            <div class="profileDetail">
                <?php echo "<p>". $row['Admin_Name']."</p>" ?>
                <?php echo "<p>". $row['Admin_Email']." </p>"?>
            </div>

            <div class="profileImage">
                <img class="roundImage" src="../../img/img_avatar.png" alt="Avatar">
            </div>
        </div>

        <div class="right">
            <div class="top">
                <p>Add Trainer Details</p>
            </div>
            <hr style="margin: 0 20px 0 20px" />
            <div class="bottom">
                <form class="editForm" action="../includes/admin/addTrainer.inc.php" method="post">
                    <div class="row">
                        <div class="col group">
                            <label for="Workout Video">Trainer Image</label>
                            <button class="profileButton fill">Upload Image</button>
                        </div>
                        <div class="col group">
                            <label for="title name">Name</label>
                            <input type="text" name="uname" placeholder="Name"
                                value="<?php echo $row['Admin_Name']; ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="group col">
                            <label for="title name">Phone Number</label>
                            <input type="number" name="number" placeholder="Phone Number"
                                value="<?php echo $row['Admin_id']; ?>" />
                        </div>
                        <div class="group col">
                            <label for="subtitle name">Admin ID</label>
                            <input type="number" name="admin_id" value="<?php echo $row['Admin_id']; ?>" />
                        </div>
                    </div>
                    <div class="group">
                        <label for="tag name">Trainer Email</label>
                        <input type="text" name="email" placeholder="Email"
                            value="<?php echo $row['Admin_Email']; ?>" />
                    </div>
                    <div class="group">
                        <label for="description">Trainer Password</label>
                        <input type="password" name="pwd" placeholder="Password" />
                    </div>
                    <div class="group">
                        <label for="description">Confirm Trainer Password</label>
                        <input type="password" name="confirm-pwd" placeholder="Confirm Password" />
                    </div>
                    <div class="submitGroup">
                        <input type="submit" name="submit" value="Add Trainer">
                    </div>
                </form>
                <?php 
                if(isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p> Fill all the fields</p>";
                    }
                    else if ($_GET["error"] == "invalidusername") {
                        echo "<p> Invalid Name </p>";
                    }
                    else if ($_GET["error"] == "invalidemail") {
                        echo "<p> Invalid Email </p>";
                    }
                    else if ($_GET["error"] == "passworddontmatch") {
                        echo "<p> Passwords do not match </p>";
                    }
                    else if ($_GET["error"] == "emailExists") {
                        echo "<p> Email already exists. Try logging in </p>";
                    }
                    else if ($_GET["error"] == "stmtFailed") {
                        echo "<p> Something went wrong </p>";
                    }
                    else if ($_GET["error"] == "none") {
                        echo "<p> Congratulations you have successfully added the trainer</p>";
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