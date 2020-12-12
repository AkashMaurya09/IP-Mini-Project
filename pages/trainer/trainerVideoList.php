<?php 
  include_once '../includes/dbh.inc.php';  
  include_once '../includes/trainer_session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/trainer/trainerList.css" />
    <link rel="stylesheet" href="/css/trainer/editVideo.css" />
    <link rel="stylesheet" href="/css/user/videoList.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/searchVideoList.js"></script>

    <title>Video List</title>
</head>

<body>
<script>
$(document).ready(function(  ) {
            $.ajax({
            type: "POST",
            url: "../includes/searchTrainerVideo.inc.php",
            data: {
                search: "Everything"
            },
            success: function(html) {
                $("#display").html(html).show();
            }
        });
    })
        </script>

    <?php 
    require('../../components/basic/header.php')
  ?>

    <?php

        if(isset($_POST['myVideo'])) {
            header("location: ./trainerVideoList.php");
        } 
        if(isset($_POST['addVideo'])) {
            header("location: ./addVideo.php");
        } 
        if(isset($_POST['myProfile'])) {
            header("location: ./editTrainer.php");
        }
        if(isset($_POST['logout'])) {
            header("location: ../includes/logout.inc.php");
        } 
  ?>

    <div class="container">
        <div class="left profile">
            <form class="profileForm" method="post">
                <input type="submit" class="profileButton active" name="myVideo" value="My Videos" />
                <input type="submit" class="profileButton" name="addVideo" value="Add Video" />
                <input type="submit" class="profileButton" name="myProfile" value="My Profile" />
                <input type="submit" + class="profileButton" id="bottom-curve" name="logout" value="Logout" />
            </form>
            <hr>
            <?php 
                $trainer_id = $_SESSION['trainer_userid'];
                $sql = "Select * from trainer WHERE Trainer_id = $trainer_id"; 
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                
                if ($resultCheck > 0) {
                    $row = mysqli_fetch_assoc($result);
                }
            ?>
            <div class="profileDetail">
                <?php echo "<p> ". $row['Trainer_Name'] ."</p>" ?>
                <?php echo "<p>". $row['Trainer_Email']." </p>"?>
            </div>

            <div class="profileImage">
                <?php echo"<img class='roundImage' src=' ". $row['location'] ."' alt='Avatar' >" ?>
            </div>

        </div>

        <div class="right">
            <div>
                <div>
                    <form class="searchArea">
                        <label>Search</label>
                        <input type="text" placeholder="Search Video" id="search" name="searchVideo">
                    </form>
                </div>

                <div class="trainerList">
                    <div id="display"></div>
                </div>
            </div>
        </div>
    </div>


    <?php 
        require('../../components/basic/footer.php')
    ?>
</body>

</html>