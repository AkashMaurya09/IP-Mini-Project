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

    <title>Trainer List</title>
</head>

<body>

    <?php 
    require('../../components/basic/header.php')
  ?>

    <div class="container">
        <div class="left profile">
            <form class="profileForm">
                <input type="submit" class="profileButton" name="dashboard" value="Dashboard" />
                <input type="submit" + class="profileButton" id="bottom-curve" name="logout" value="Logout" />
            </form>
            <hr>
            <?php 
          $admin_id = $_SESSION['admin_userid'];
          $sql = "Select * from gymAdmin WHERE Admin_id = $admin_id"; 
          $result = mysqli_query($conn,$sql);
          $resultCheck = mysqli_num_rows($result);
        
          if ($resultCheck > 0) {
            $row = mysqli_fetch_assoc($result);
          }
        ?>
            <div class="profileDetail">
                <?php echo "<p> ". $row['Admin_Name'] ."</p>" ?>
                <?php echo "<p> ". $row['Admin_Email']." </p>"?>
                <!-- <p><span>Phone Number:</span> 9967025541</p>
            <p><span>Video Count</span> 45</p> -->
            </div>

            <div class="profileImage">
                <img class="roundImage" src="../../img/img_avatar.png" alt="Avatar">
            </div>

        </div>

        <div class="right">
            <div>
                <div>
                    <form class="searchArea">
                        <input type="text" placeholder="  Search Trainer" name="searchTrainer">
                        <input type="submit" value="Add Trainer" name="addTrainer">
                    </form>
                </div>

                <div class="trainerList">
                    <?php 
              $admin_id = $_SESSION['admin_userid'];
              $sql = "Select * from trainer WHERE Admin_id = $admin_id"; 
              $result = mysqli_query($conn,$sql);
              $resultCheck = mysqli_num_rows($result);
            ?>
                    <?php 
                    if ($resultCheck > 0) {
                      $i = 0;
                      while($row = mysqli_fetch_array($result)) {
                        echo '
                        <div class="singleTrainer">
                            <img src="../../img/img_avatar.png" alt="Avatar">
                            <div class="detailContent">
                                <p><span>Trainer Id:</span>' . $row['Trainer_id'] . '</p> 
                                <p><span>Email:</span> '. $row['Trainer_Name'] . '</p>
                                <p><span>Phone Number:</span>'. $row['Phone_Number'] .'</p>
                            </div>
                            <div class="vl"></div>
                            <div class="detailContent">
                                <p><span>Admin Id:</span>'. $row['Admin_id'] .'</p>
                                <p><span>Trainer Email</span>'. $row['Trainer_Email'] .'</p>
                                <p><span>Video Count:</span>'. $row['Admin_id'] .'</p>
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