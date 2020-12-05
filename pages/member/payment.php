<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>

<?php 
    require('../../components/basic/header.php')
  ?>


  <?php
    if(isset($_POST['submit'])) {
        $video_id = $_GET["Video_id"];
        $member_id = $_SESSION['memberid'];
        $validity = 0; // insert some date like one year from todays data
        //insert into purchases
        // redirect to video page with video id
      } else {
        // else part
    }
    
  ?>

  <form method="post">
    <input type="submit" name="submit" value="Buy Now">
    </form>
  
<?php 
        require('../../components/basic/footer.php')
    ?>

    
</body>
</html>