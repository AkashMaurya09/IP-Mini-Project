<?php
include_once '../includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/trainer/editVideo.css" />
    <link rel="stylesheet" href="/css/user/videoPlay.css" />
    <link rel="stylesheet" href="/css/trainer/trainerList.css" />
    <link rel="stylesheet" href="/css/user/comments.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/comment.js"></script>
    <title>Your Workout Video</title>

</head>

<body>

    <?php
    require('../../components/basic/header.php')
    ?>

    <?php
    $video_id = $_GET['Video_id'];
    ?>

    <?php
        if(isset($_POST['myVideo'])) {
            header("location: ./myVideo.php");
          }
          if(isset($_POST['myProfile'])) {
            header("location: ./editMember.php");
          }
          if(isset($_POST['videoList'])) {
            header("location: ./videoList.php");
          }
          if(isset($_POST['logout'])) {
            header("location: ../includes/logout.inc.php");
        }
    ?>

    <div class="container">
        <div class="left profile">
            <form class="profileForm" method="post">
                <input type="submit" class="profileButton " name="videoList" value="Video List" />
                <input type="submit" class="profileButton " name="myVideo" value="My Video" />
                <input type="submit" class="profileButton " name="myProfile" value="My Profile" />
                <input type="submit" + class="profileButton" id="bottom-curve" name="logout" value="Logout" />
            </form>
            <hr>
            <?php
            $memberid = $_SESSION['memberid'];
            $sql = "Select * from Member WHERE Member_id = $memberid";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                $row = mysqli_fetch_assoc($result);
            }
            ?>
            <div class="profileDetail">
                <?php echo "<p>" . $row['Member_Name'] . "</p>" ?>
                <?php echo "<p>" . $row['Member_Email'] . " </p>" ?>
            </div>

            <div class="profileImage">
                <?php echo "<img class='roundImage' src=' " . $row['location'] . "' alt='Avatar' >" ?>
            </div>

        </div>

        <div class="right">
            <div>
                <div class="Content-Center">
                    <div class="video-details">
                        <?php
                        $fetchVideos = mysqli_query($conn, "SELECT * FROM Workout where Video_id='$video_id';");
                        while ($_videoRow = mysqli_fetch_array($fetchVideos)) {
                            echo "<h2>" . $_videoRow['Video_Name'] . "</h2>";
                        }
                        ?>
                    </div>
                </div>
                <div class="Content-Center videoStyle">
                    <?php
                    $fetchVideos = mysqli_query($conn, "SELECT * FROM Workout where Video_id='$video_id';");
                    while ($row = mysqli_fetch_array($fetchVideos)) {
                        $location = $row['location'];

                        echo "<div class='Content-Center videoStyle'>";
                        echo "<video src='" . $location . "' controls >";
                        echo "</div>";
                    }
                    ?>
                </div>
                <div class="Content-Center">
                    <div class="video-details">
                        <?php
                        $fetchVideos = mysqli_query($conn, "SELECT * FROM Workout where Video_id='$video_id';");
                        while ($_videoRow = mysqli_fetch_array($fetchVideos)) {
                            $location = $_videoRow['location'];
                            $videoid = $_videoRow['Video_id'];
                            echo "<span id='Video-Tags'>" . $_videoRow['tag'] . "</span>";
                            echo "<h2 id='Description'>" . $_videoRow['Description'] . "</h2>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- ---------------------Add Comments-------------------------- -->
            <div>
                <div class="Comments-Section">
                    <div>
                        <p id="Comments-heading">Comments</p>
                    </div>
                </div>
                <div class="add-comment">
                    <textarea required placeholder="Your Comment goes here...." rows="5" name="comment"
                        id="comment_text" cols=10 class="ui-autocomplete-input" autocomplete="off" role="textbox"
                        aria-autocomplete="list" aria-haspopup="true"></textarea>
                    <button type='submit' id="add_com" name='add_comment'>Add Comment</button>
                </div>
            </div>
            <!-- ---------------------Display Comments-------------------------- -->
            <input type="hidden" value=<?php echo $video_id; ?> id="video_id" />
        </div>
    </div>

    <?php
    require('../../components/basic/footer.php')
    ?>
</body>

</html>