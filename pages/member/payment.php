<?php
include '../includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>

  <?php 
    require('../../components/basic/header.php');
  ?>


  <?php  
  $oneYearOn = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 1 year"));
    if(isset($_POST['submit'])) {
        $video_id = $_GET["Video_id"];
        $member_id = $_SESSION['memberid'];
        $validity = $oneYearOn;
        // insert some date like one year from todays data
        //insert into purchases
        // redirect to video page with video id
        $query = "INSERT INTO purchased(Validity,Member_id,Video_id) VALUES('".$validity."','".$member_id."','".$video_id."');";
        mysqli_query($conn,$query);
        echo "Buy successfull.";
        header("location: ./videoPlay.php?Video_id=$video_id");
      } else {
        // else part
    }
    
  ?>

  <form method="post">
    <input type="submit" name="submit" value="Buy Now">
    <?php
      echo print_r($oneYearOn); 
     ?>
  </form>
  
<?php 
        require('../../components/basic/footer.php')
    ?>

    
</body>
</html>