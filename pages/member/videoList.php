<?php 
  include_once '../includes/dbh.inc.php';  
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

    <title>Video List</title>
</head>

<body>
<script>

        $(document).ready(function() {
            $(".disabled").attr('controls', false);
        })
        
        function played(id){
            console.log("hello world");
            var element = document.getElementById(id);
            console.log(element);
            element.onplay = function(){
                element.pause();
                alert("You haven't bought this video"); 
            }
        }

    </script>

    <?php 
    require('../../components/basic/header.php')
  ?>

    <?php
        if(isset($_POST['myVideo'])) {
            header("location: ./myVideo.php");
        }
        if(isset($_POST['myProfile'])) {
            header("location: ./editMember.php");
        }
  ?>

    <div class="container">
        <div class="left profile">
            <form class="profileForm" method="post">
                <input type="submit" class="profileButton" name="myVideo" value="My Video" />
                <input type="submit" class="profileButton" name="myProfile" value="My Profile" />
                <input type="submit" + class="profileButton" id="bottom-curve" name="logout" value="Logout" />
            </form>
            <hr>
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
                <?php echo "<p> ". $row['Member_Name'] ."</p>" ?>
                <?php echo "<p>". $row['Member_Email']." </p>"?>
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
                        <input type="text" placeholder="  Search Video" name="searchVideo">
                    </form>
                </div>

                <div class="trainerList">
                    <?php 
                        $sql = "SELECT * FROM Workout WHERE Video_id NOT IN (SELECT Video_id From purchases Where Member_id='$memberid')";
                         
                        $result = mysqli_query($conn,$sql);
                        $resultCheck = mysqli_num_rows($result);
                     ?>
                    <?php 
                    if ($resultCheck > 0) {
                      $i = 0;
                      while($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <div class="singleTrainer">
                            <video class="disabled" src="'. $row['location'] .'" controls width="320px" height="200px">
                            </video>
                            <div class="detailContent">
                                <p>' . $row['Video_Name'] . '</p> 
                                <p class="tag">#Weights #5minutes</p> 
                                <p class="description">'. $row['Description'] . '</p>
                            </div>
                            <div class="buyVideoButton">
                                <button>&#8377;'. $row['Price'] . '</button>
                                <button onClick="location.href=\'http://localhost/pages/member/payment.php?Video_id='.$row["Video_id"].'\'">Buy Now</button>
                            </div>
                        </div>
                        ';
                        $i = $i + 1;
                      }
                    }
                  ?>
                </div>
            </div>
        </div>
    </div>


    <?php 
        require('../../components/basic/footer.php')
    ?>
</body>

</html>