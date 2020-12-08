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
    <link rel="stylesheet" href="/css/user/comments.css" />

    <title>Your Workout Video</title>

</head>

<body>

    <?php
    require('../../components/basic/header.php')
    ?>

    <?php
    $video_id = $_GET['Video_id'];
    ?>

    <div class="container">
        <div class="left profile">
            <form class="profileForm">
                <input type="submit" class="profileButton" name="dashboard" value="Dashboard" />
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
                <div class="Content-Center videoStyle">
                    <!-- <video width="600" height="400" controls>
                    <source src="http://www.sample-videos.com/video123/mp4/720/big_buck_bunny_720p_20mb.mp4"
                        type="video/mp4">
                    Your browser does not support the video tag.
                </video> -->
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

                            // echo "<h2>". print_r($_videoRow) ."</h2>";                                
                            echo "<h2>" . $_videoRow['Video_Name'] . "</h2>";
                            echo "<p id='Desc'>Descpription</p>";
                            echo "<h2>" . $_videoRow['Description'] . "</h2>";
                            echo "<p id='Tags'>Tags</p>";
                            echo "<span id='Video-Tags'>#Full Body #Myworkout</span>";
                            echo "<p id='Tags'>Valid till : 20-Dec-2020</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- ---------------------Add Comments-------------------------- -->
            <div>
                <div class="Comments-Section">
                    <div class="Content-Center">
                        <p id="Comments-heading">Comments</p>
                    </div>
                </div>
                <?php
                if (isset($_POST["add_comment"])) {
                    $name = $_POST["comment"];
                    $date = date("Y-m-d h:i:s");
                    $query = "INSERT INTO comment(userComment,timestamp,Member_id,Video_id) VALUES('" . $name . "','" . $date . "','" . $memberid . "','" . $videoid . "')";

                    mysqli_query($conn, $query);
                }
                ?>
                <div class="add-comment">
                    <form method="post" action="">
                        <textarea required placeholder="Your Comment goes here...." rows="5" name="comment" id="comment_text" cols=20 class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>
                        <input type='submit' value='Add Comment' name='add_comment'>
                    </form>
                </div>
            </div>
            <!-- ---------------------Display Comments-------------------------- -->

            <div class="Comments-Section">
                <div class="Content-Center">
                    <p id="Comments-heading">What did others say...</p>

                </div>
            </div>

            <?php
            $comment_query = mysqli_query($conn, "SELECT * FROM comment ORDER BY timestamp DESC;");
            while ($comment = mysqli_fetch_assoc($comment_query)) {
                $id = $comment['Member_id'];
                $sql = "Select * from Member WHERE Member_id = $id";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
    
                if ($resultCheck > 0) {
                    $memberId = mysqli_fetch_assoc($result);
                }

                // echo "<h2>" . print_r($memberId) . "</h2>";
                echo "<div class='comment-card'>";
                    echo "<img src='". $memberId['location']."' />";
                    echo "<p ic='username'> ". $memberId['Member_Name'] ."</p>";
                    echo "<div class='comment'>";
                    echo "<p>". $comment['userComment'] ."</p>";
                echo "</div>";
                echo "<p class='time'>". $comment['timestamp'] ."</p>";
                echo "</div>";
            }
            ?>

        </div>


    </div>

    <?php
    require('../../components/basic/footer.php')
    ?>
</body>

</html>