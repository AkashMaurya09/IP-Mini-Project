<?php
include '../includes/dbh.inc.php';
?>
<!doctype html>
<html>
  <head>
    <style>
      .Content-center{
        text-align: center;
    margin-top: 20px;
    display: flex;
    justify-content: center;
      }
      .Content-center p{
        /* color: grey; */
    font-family: monospace;
    max-width: calc(30em * 0.9);
      }
    video {
  border-radius: 3px;
  border: 1px solid;
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
        
        echo "<div class='Content-center'>";
        echo "<video src='".$location."' controls width='320px' height='200px' >";
        echo "</div>";
        // echo "<p><span>Video ID:</span> ". $row['Video_id'] . "</p>";
        echo "<div class='Content-center'>";
        echo "<p><span>Video Name:</span> ". $row['Video_Name'] . "</p>";
        echo "</div>";
        
        // echo "<p><span>Price:</span> ". $row['Price'] . "</p>";
        echo "<div class='Content-center'>";
        echo "<p><span>Description:</span> ". $row['Description'] . "</p>";
        echo "</div>";
        // echo "<p><span>Trainer ID:</span> ". $row['Trainer_id'] . "</p>";
        
        
        echo "<br>";   
        break;     
     }
     ?>
 
    </div>
    <?php 
        require('../../components/basic/footer.php')
    ?>
  </body>
</html>