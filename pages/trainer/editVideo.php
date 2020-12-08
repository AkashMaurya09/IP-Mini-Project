<?php 
  include_once '../includes/dbh.inc.php';  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/trainer/editVideo.css" />
    <title>Edit Video</title>
</head>

<body>

    <?php 
    require('../../components/basic/header.php')
  ?>

  <?php
      if(isset($_POST['addVideo'])){
        header("Location: ./addVideo.php");
      }

  ?>

    <div class="container">
        <div class="left profile">
            <form class="profileForm" method="post">
                <input type="submit" class="profileButton" name="addVideo" value="Add Video" />
                <input type="submit" class="profileButton" name="myVideo" value="My Video" />
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
                <?php echo "<p>". $row['Trainer_Name'] . "</p>" ?>
                <?php echo "<p>". $row['Trainer_Email']." </p>"?>
            </div>
            <div class="profileImage">
                <?php echo"<img class='roundImage' src=' ". $row['location'] ."' alt='Avatar' >" ?>
            </div>
        </div>

        <div class="right">
            <div class="top">
                <p>Edit Your Video</p>
            </div>
            <hr style="margin: 0 20px 0 20px" />
            <div class="bottom">
                <form class="editForm" method="post" action="" enctype='multipart/form-data'>
                    <div class="row">
                        <div class="col group">
                            <label for="Workout Video">Workout Video</label>
                            <input type='file' name='file' />
                        </div>
                    </div>

                    <div class="row">
                        <div class="group col">
                            <label for="title name">Video Name</label>
                            <input type="text" name="video_name" />
                        </div>
                        <div class="group col">
                            <label for="subtitle name">Price</label>
                            <input type="text" name="price" />
                        </div>
                    </div>
                    <div class="group">
                        <label for="tag name">Trainer ID</label>
                        <input type="text" name="trainer_id" value="<?php echo $row['Trainer_id']; ?>" />
                    </div>
                    <div class="group">
                        <label for="description">Description</label>
                        <textarea row="300" cols="20" name="desc"></textarea>
                    </div>
                    <div class="submitGroup">
                        <input type="submit" name="edit_video" value="Edit Video">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php 
        require('../../components/basic/footer.php')
    ?>
</body>

</html>