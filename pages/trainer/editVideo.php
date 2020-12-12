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
    require('../../components/basic/header.php');
    $video_id = $_GET['Video_id'];
    ?>

    <?php
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

    if (isset($_POST['edit_video'])) {
        $videoname = $_POST["video_name"];
        $price = $_POST["price"];
        $trainer_id = $_POST["trainer_id"];
        $desc = $_POST["desc"];
        $tag = $_POST["tag"];
        if (empty($videoname) || empty($price) || empty($trainer_id) || empty($desc) || empty($tag)) {
            header("location:../trainer/editVideo.php?error=emptyinput&Video_id=$video_id");
            exit();
        } else {
            $query = "UPDATE Workout SET Video_Name='$videoname',Price='$price',Description='$desc',tag='$tag' where Video_id='$video_id';";

            mysqli_query($conn, $query);
            header("location:../trainer/editVideo.php?error=videoupdateSuccess&Video_id=$video_id");
            exit();
        }
    }

    if (isset($_POST['edit_video_file'])) {
        $maxsize = 524288000; // 5MB

        $name = $_FILES['file']['name'];
        $target_dir = "../videos/";
        $target_file = $target_dir . $_FILES["file"]["name"];

        // Select file type
        $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");
        if (empty($name)) {
            header("location:../trainer/editVideo.php?error=fileempty&Video_id=$video_id");
            exit();
        } else {
            // Check extension
            if (in_array($videoFileType, $extensions_arr)) {

                // Check file size
                if (($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                    echo "File too large. File must be less than 5MB.";
                } else {
                    // Upload
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                        // Insert record
                        $query = "UPDATE Workout SET name='$name',location='$target_file' where Video_id='$video_id';";

                        mysqli_query($conn, $query);
                        header("location:../trainer/editVideo.php?error=updateSuccess&Video_id=$video_id");
                        exit();
                    }
                }
            } else {
                echo "Invalid file extension.";
            }
        }
    }



    ?>

    <div class="container">
        <div class="left profile">
            <form class="profileForm" method="post">
                <input type="submit" class="profileButton" name="myVideo" value="My Videos" />
                <input type="submit" class="profileButton " name="addVideo" value="Add Video" />
                <input type="submit" class="profileButton " name="myProfile" value="My Profile" />
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
                <p>Edit Your Video</p>
            </div>
            <hr style="margin: 0 20px 0 20px" />
            <?php
            $trainer_id = $_SESSION['trainer_userid'];
            $sql = "Select * from Workout WHERE Video_id = $video_id";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);



            if ($resultCheck > 0) {
                $video = mysqli_fetch_assoc($result);
            }
            ?>
            <div class="bottom">
                <form class="editForm" method="post" action="" enctype='multipart/form-data'>
                    <div class="row">
                        <div class="col group">
                            <label for="Workout Video">Workout Video</label>
                            <br>
                            <?php
                            echo "<div class='Content-Center videoStyle'>";
                            echo "<video src='" . $video['location'] . "' controls >";
                            echo "</div>";
                            ?>
                            <input type='file' name='file' />
                            <div class="submitGroup">
                                <input type="submit" name="edit_video_file" value="Edit Video">
                            </div>

                        </div>
                    </div>
                </form>
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "updateSuccess") {
                        echo "  <div class='group'>
                                    <label style='color:green' for='description'>Video file Updated Successfully</label>
                                    </div>  ";
                    }
                    if ($_GET["error"] == "fileempty") {
                        echo "  <div class='group'>
                                    <label style='color:red' for='description'>Please select your Workout VIdeo</label>
                                    </div>  ";
                    }
                }
                ?>
                <form class="editForm" method="post" action="" enctype='multipart/form-data'>
                    <div class="row">
                        <div class="group col">
                            <label for="title name">Video Name</label>
                            <input type="text" name="video_name" value="<?php echo $video['Video_Name']; ?>" />
                        </div>
                        <div class="group col">
                            <label for="subtitle name">Price</label>
                            <input type="text" name="price" value="<?php echo $video['Price']; ?>" />
                        </div>
                    </div>
                    <div class="group">
                        <label for="tag name">Trainer ID</label>
                        <input type="text" name="trainer_id" value="<?php echo $video['Trainer_id']; ?>" />
                    </div>
                    <div class="group">
                        <label for="description">Description</label>
                        <textarea row="400" cols="20" name="desc"><?php echo $video['Description']; ?></textarea>
                    </div>
                    <div class="group">
                        <label for="tag name">Add Video Tag</label>
                        <input type="text" name="tag" value="<?php echo $video['tag']; ?>" />
                    </div>
                    <div class="submitGroup">
                        <input type="submit" name="edit_video" value="Edit Video">
                    </div>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "videoupdateSuccess") {
                            echo "  <div class='group'>
                                    <label style='color:green' for='description'>Video Updated Successfully</label>
                                    </div>  ";
                        }
                        if ($_GET["error"] == "emptyinput") {
                            echo "  <div class='group'>
                                    <label style='color:red' for='description'>Please fill all the fields</label>
                                    </div>  ";
                        }
                    }
                    ?>
                </form>
                
            </div>
        </div>
    </div>

    <?php
    require('../../components/basic/footer.php')
    ?>
</body>

</html>