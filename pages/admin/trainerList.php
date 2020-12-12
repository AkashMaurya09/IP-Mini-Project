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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/searchTrainers.js"></script>
    <title>Trainer List</title>
</head>

<body>
    <script>
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "../includes/searchTrainers.inc.php",
            data: {
                search: "Everything"
            },
            success: function(html) {
                $("#display").html(html).show();
            }
        });
    })
    </script>
    <?php 
    require('../../components/basic/header.php')
  ?>

    <?php
    if(isset($_POST['yourTrainer'])){
        header("Location: ./trainerList.php");
    }
    if(isset($_POST['logout'])){
        header("Location: ../includes/logout.inc.php");
    }
    if(isset($_POST['addTrainer'])){
        header("Location: ./addTrainer.php");
    }
  ?>

    <div class="container">
        <div class="left profile">
            <form class="profileForm" method="post">
                <input type="submit" class="profileButton active" name="yourTrainer" value="My Trainers" />
                <input type="submit" class="profileButton " name="addTrainer" value="Add Trainer" />
                <input type="submit" + class="profileButton" id="bottom-curve" name="logout" value="Logout" />
            </form>
            <hr>
            <?php 
          $admin_id = $_SESSION['admin_userid'];
          $sql = "Select * from gymadmin WHERE Admin_id = $admin_id"; 
          $result = mysqli_query($conn,$sql);
          $resultCheck = mysqli_num_rows($result);
        
          if ($resultCheck > 0) {
            $row = mysqli_fetch_assoc($result);
          }
        ?>
            <div class="profileDetail">
                <?php echo "<p> ". $row['Admin_Name'] ."</p>" ?>
                <?php echo "<p> ". $row['Admin_Email']." </p>"?>
            </div>

            <div class="profileImage">
                <img class="roundImage" src="../../img/img_avatar.png" alt="Avatar">
            </div>

        </div>

        <div class="right">
            <div>
                <div>
                    <form class="searchArea">
                        <label>Search</label>
                        <input id="search" type="text" placeholder="  Search Trainer" name="searchTrainer">
                    </form>
                </div>

                <div class="trainerList">
                    <div id="display"></div>
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