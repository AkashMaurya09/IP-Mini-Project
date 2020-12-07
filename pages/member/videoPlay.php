<?php
include_once '../includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/user/videoPlay.css" />
    <link rel="stylesheet" href="/css/user/comments.css" />

    <title>Video List</title>
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
                <input type="submit" + class="profileButton" name="logout" value="Logout" />
            </form>
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
                <?php echo "<p><span>Name:</span> " . $row['Member_Name'] . "</p>" ?>
                <?php echo "<p><span>Email:</span> " . $row['Member_Email'] . " </p>" ?>
                <?php echo "<p><span>Phone Number:</span> " . $row['Phone_Number'] . " </p>" ?>
            </div>

            <div class="profileImage">
                <?php echo"<img class='roundImage' src=' ". $row['location'] ."' alt='Avatar' >" ?>
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
                    $fetchVideos = mysqli_query($conn, "SELECT * FROM Workout where Video_id=(SELECT Video_id from purchases where Member_id= $memberid);");
                    while ($row = mysqli_fetch_array($fetchVideos)) {
                        $location = $row['location'];

                        echo "<div >";
                        echo "<video src='" . $location . "' controls width='320px' height='200px' >";
                        echo "</div>";
                    }
                    ?>
                </div>
                <div class="Content-Center">
                    <div class="video-details">
                        <?php
                        $fetchVideos = mysqli_query($conn, "SELECT * FROM Workout where Video_id=(SELECT Video_id from purchases where Member_id= $memberid);");
                        while ($row = mysqli_fetch_array($fetchVideos)) {
                            $location = $row['location'];

                            // echo "<h2>". print_r($row) ."</h2>";                                
                            echo "<h2>" . $row['Video_Name'] . "</h2>";
                            echo "<p id='Desc'>Descpription</p>";
                            echo "<h2>" . $row['Description'] . "</h2>";
                            echo "<p id='Tags'>Tags</p>";
                            echo "<span id='Video-Tags'>#Full Body #Myworkout</span>";
                            echo "<p id='Tags'>Valid till : 20-Dec-2020</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div>
                <div class="Comments-Section">
                    <div class="Content-Center">
                        <p id="Comments-heading">Comments</p>
                    </div>
                </div>
                <div class="add-comment">

                    <textarea placeholder="Your Comment goes here...." rows="5" name="comment[text]" id="comment_text" cols=20 class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>

                    <div class="button_base b07_3d_double_roll">
                        <div>Publish Comment</div>
                        <div>Publish Comment</div>
                        <div>Publish Comment</div>
                        <div>Publish Comment</div>
                    </div>
                </div>
            </div>
            <div class="Comments-Section">
                <div class="Content-Center">
                    <p id="Comments-heading">What did others say...</p>

                </div>
            </div>

            <div class="comment-card">

                <img src="https://picsum.photos/300/300" />
                <p ic="username"> Devdatta Khoche</p>
                <div class="comment">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore officia aliquid reiciendis sit, odio maxime dignissimos laborum repellat magni tempore hic. Explicabo sit blanditiis ipsum, natus pariatur accusamus tenetur quo.</p>
                </div>
                <p class="time">Bet 5 days ago</p>
            </div>
            <div class="comment-card">

                <img src="https://picsum.photos/300/300" />
                <p ic="username"> Devdatta Khoche</p>
                <div class="comment">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore officia aliquid reiciendis sit, odio maxime dignissimos laborum repellat magni tempore hic. Explicabo sit blanditiis ipsum, natus pariatur accusamus tenetur quo.</p>
                </div>
                <p class="time">Bet 5 days ago</p>
            </div>
        </div>


    </div>

    <?php
    require('../../components/basic/footer.php')
    ?>
</body>

</html>