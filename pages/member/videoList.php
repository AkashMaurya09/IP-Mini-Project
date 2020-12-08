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
    <script src = "\js\searchScript.js"></script>
    

    <title>Video List</title>
</head>

<body>
<script>
        
        $(document).ready(function(  ) {
            $.ajax({
            //AJAX type is "Post".
            type: "POST",
            //Data will be sent to "ajax.php".
            url: "http://localhost/pages/includes/search.inc.php",
            //Data, that will be sent to "ajax.php".
            data: {
                //Assigning value of "name" into "search" variable.
                search: "Everything"
            },
            //If result found, this funtion will be called.
            success: function(html) {
                //Assigning result to "display" div in "search.php" file.
                $("#display").html(html).show();
            }
        });
        
    
    })


        // function played(id){
        //     console.log("hello world");
        //     var element = document.getElementById(id);
        //     console.log(element);
        //     element.onplay = function(){
        //         element.pause();
        //         alert("You haven't bought this video"); 
        //     }
        // }

    </script>

    <?php 
    require('../../components/basic/header.php')
  ?>

    <?php
       if(isset($_POST['myVideo'])) {
            header("location: ./myVideo.php");
        } else {
        // else part
    }
  ?>

    <div class="container">
        <div class="left profile">
            <form class="profileForm" method="post">
                <input type="submit" class="profileButton" name="myVideo" value="My Video" />
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
                        <input type="text" placeholder="Search Video"  id = "search" name="searchVideo">
                    </form>
                </div>

                <div class="trainerList">
                    
                     <div id="display">
                     
            </div>
                    
                </div>
            </div>
        </div>
    </div>
<script>
    
    $(window).ready(function(){
        var id=$(".disabled").attr('controls', false);
        console.log(id)
    });
</script>

    <?php 
        require('../../components/basic/footer.php')
    ?>
</body>

</html>