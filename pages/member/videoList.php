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

    <title>Video List</title>
</head>

<body>

    <?php 
    require('../../components/basic/header.php')
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
                <img class="roundImage" src="../../img/img_avatar.png" alt="Avatar">
            </div>

        </div>

        <div class="right">
            <div>
                <div>
                    <form class="searchArea">
                        <input type="text" placeholder="  Search Video" name="searchVideo">
                        <!-- <input type="submit" value="Add Video" name="addTrainer"> -->
                    </form>
                </div>

                <div class="trainerList">
                <?php 
                    $sql = "Select * from Workout"; 
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0) {
                        $workout = mysqli_fetch_assoc($result);
                    }
                ?> 
                    <?php 
                    if ($resultCheck > 0) {
                      $i = 0;
                      while($workout = mysqli_fetch_array($result)) {
                        //   echo print_r($workout);
                        echo '
                        <div class="singleTrainer">
                            <video controls>
                                <source src="movie.mp4" type="video/mp4">
                                <source src="movie.ogg" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                            <div class="detailContent">
                                <p><span>Video Id:</span>' . $workout['Video_id'] . '</p> 
                                <p><span>Video Name:</span> '. $workout['Video_Name'] . '</p>
                                
                            </div>
                            <div class="vl"></div>
                            <div class="detailContent">
                                <p><span>Price:</span>'. $workout['Price'] .'</p>
                                <p><span>Trainer Id:</span>'. $workout['Trainer_id'] .'</p>
                            </div>
    
                            <div class="dropdown">
                                <button onclick="myFunction()" class="dropbtn">...</button>
                                <div id="myDropdown" class="dropdown-content">
                                    <a href="#">Edit Details</a>
                                    <a href="#">Remove Trainer</a>
                                </div>
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

    <script>
    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
    </script>
</body>

</html>