<?php
include_once '../includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/trainer/editVideo.css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>


    <title>Edit Video</title>
    <?php

    if (isset($_POST['but_upload'])) {
        $maxsize = 524288000; // 5MB
        $videoname = $_POST["video_name"];
        $price = $_POST["price"];
        $trainer_id = $_POST["trainer_id"];
        $desc = $_POST["desc"];
        $tag = $_POST["tag"];

        $name = $_FILES['file']['name'];
        $target_dir = "../videos/";
        $target_file = $target_dir . $_FILES["file"]["name"];

        // Select file type
        $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");

        // Check extension
        if (in_array($videoFileType, $extensions_arr)) {

            // Check file size
            if (($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                echo "<script>  $(document).ready(function(){
                    window.setTimeout(function(){
                        alert('File too large. File must be less than 5MB');
                    }, 100); 
                  });</script>";
            } else {
                // Upload
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                    // Insert record
                    $query = "INSERT INTO Workout(Video_Name,Price,Trainer_id,name,location,Description,tag) VALUES('" . $videoname . "','" . $price . "','" . $trainer_id . "','" . $name . "','" . $target_file . "','" . $desc . "','" . $tag . "')";
                    mysqli_query($conn, $query);

                    echo "<script>  $(document).ready(function(){
                        window.setTimeout(function(){
                            alert('Uploaded Successfully');
                        }, 100); 
                      });</script>";
                }
            }
        } else {
            echo "<script>  $(document).ready(function(){
                window.setTimeout(function(){
                    alert('Invalid file extension');
                }, 100); 
              });</script>";
        }
    }

    if (isset($_POST['myVideo'])) {
        header("location: ./trainerVideoList.php");
    }
    if (isset($_POST['addVideo'])) {
        header("location: ./addVideo.php");
    }
    if (isset($_POST['myProfile'])) {
        header("location: ./editTrainer.php");
    }
    if (isset($_POST['logout'])) {
        header("location: ../includes/logout.inc.php");
    }
    ?>
</head>

<body>

    <?php
    require('../../components/basic/header.php')
    ?>

    <div class="container">
        <div class="left profile">
            <form class="profileForm" method="post">
                <input type="submit" class="profileButton" name="myVideo" value="My Videos" />
                <input type="submit" class="profileButton active" name="addVideo" value="Add Video" />
                <input type="submit" class="profileButton" name="myProfile" value="My Profile" />
                <input type="submit" + class="profileButton" id="bottom-curve" name="logout" value="Logout" />
            </form>
            <hr>
            <?php
            $trainer_id = $_SESSION['trainer_userid'];
            $sql = "Select * from trainer WHERE Trainer_id = $trainer_id";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                $row = mysqli_fetch_assoc($result);
            }
            ?>

            <div class="profileDetail">
                <?php echo "<p>" . $row['Trainer_Name'] . "</p>" ?>
                <?php echo "<p>" . $row['Trainer_Email'] . " </p>" ?>
            </div>
            <div class="profileImage">
                <?php echo "<img class='roundImage' src=' " . $row['location'] . "' alt='Avatar' >" ?>
            </div>

        </div>

        <div class="right">
            <div class="top">
                <p>Add Your Video</p>
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
                    <div class="group">
                        <label for="tag name">Add Video Tag</label>
                        <input type="text" name="tag" placeholder="Enter your Video tag here" />
                    </div>
                    <div class="submitGroup">
                        <input type="submit" name="but_upload" value="Upload">
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

<?php