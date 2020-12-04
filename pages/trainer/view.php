<?php
include '../includes/dbh.inc.php';
?>
<!doctype html>
<html>
  <head>
    <style>
    video{
     float: left;
    }
    </style>
  </head>
  <body>
  <?php 
    require('../../components/basic/header.php')
  ?>
    <div>
 
     <?php
     $fetchVideos = mysqli_query($conn, "SELECT * FROM Workout ORDER BY Video_id DESC");
     while($row = mysqli_fetch_assoc($fetchVideos)){
        // echo print_r($row);
        $location = $row['location'];
        
        echo "<div >";
        echo "<p><span>Video ID:</span> ". $row['Video_id'] . "</p>";
        echo "<p><span>Video Name:</span> ". $row['Video_Name'] . "</p>";
        echo "<p><span>Price:</span> ". $row['Price'] . "</p>";
        echo "<p><span>Description:</span> ". $row['Description'] . "</p>";
        echo "<p><span>Trainer ID:</span> ". $row['Trainer_id'] . "</p>";
        echo "<video src='".$location."' controls width='320px' height='200px' >";
        echo "</div>";
        echo "<br>";        
     }
     ?>
 
    </div>
    <?php 
        require('../../components/basic/footer.php')
    ?>
  </body>
</html>