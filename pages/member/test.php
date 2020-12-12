<?php 
  include_once '../includes/dbh.inc.php'; 
  include_once '../includes/member_session.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/user/videoPlay.css" />

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
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                
                if ($resultCheck > 0) {
                    $row = mysqli_fetch_assoc($result);
                }
            ?>
            <div class="profileDetail">
                <?php echo "<p><span>Name:</span> ". $row['Member_Name'] ."</p>" ?>
                <?php echo "<p><span>Email:</span> ". $row['Member_Email']." </p>"?>
                <?php echo "<p><span>Phone Number:</span> ". $row['Phone_Number']." </p>"?>
            </div>

            <div class="profileImage">
                <?php echo"<img class='roundImage' src=' ". $row['location'] ."' alt='Avatar' >" ?>
            </div>

        </div>

        <div class="right">
            <div>
                <div class = "Content-Center videoStyle">
                <!-- <video width="600" height="400" controls>
                    <source src="http://www.sample-videos.com/video123/mp4/720/big_buck_bunny_720p_20mb.mp4"
                        type="video/mp4">
                    Your browser does not support the video tag.
                </video> -->
                <?php
                    $fetchVideos = mysqli_query($conn, "SELECT * FROM Workout where Video_id=(SELECT Video_id from purchased where Member_id= $memberid);");
                    while($row = mysqli_fetch_array($fetchVideos)){
                        $location = $row['location'];
                    
                        echo "<div >";
                        echo "<video src='".$location."' controls width='320px' height='200px' >";
                        echo "</div>";
                    }
                ?>
                </div>
                <div class="Content-Center">
                    <div class="video-details">
                        <?php
                            $fetchVideos = mysqli_query($conn, "SELECT * FROM Workout where Video_id=(SELECT Video_id from purchased where Member_id= $memberid);");
                            while($row = mysqli_fetch_array($fetchVideos)){
                                $location = $row['location'];
                            
                                echo "<h2>". print_r($row) ."</h2>";                                
                                echo "<h2>". $row['Video_Name'] ."</h2>"; 
                                echo "<p id='Desc'>Descpription</p>"; 
                                echo "<h2>". $row['Description'] ."</h2>"; 
                                echo "<h2>". $row['Video_Name'] ."</h2>"; 
                                echo "<h2>". $row['Video_Name'] ."</h2>"; 
                                echo "<h2>". $row['Video_Name'] ."</h2>"; 
                            }
                        ?>
                        <p id="Description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo sed neque numquam perferendis, commodi nisi vel esse assumenda vitae sit temporibus voluptatum a, quae similique sunt labore exercitationem odio delectus.</p>
                        <p id="Tags">Tags</p>
                        <span id="Video-Tags">#Full Body #Myworkout</span>
                        <p id="Tags">Valid till : 20-Dec-2020</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        require('../../components/basic/footer.php')
    ?>
</body>

</html>