<?php 
  include_once '../includes/dbh.inc.php';  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/trainer/editVideo.css" />

      <title>Edit Trainer</title>

      
  </head>
  <body>
  
  <?php 
    require('../../components/basic/header.php');
      if(isset($_POST['edit_trainer'])){
       $maxsize = 524288000; // 5MB
       $trainername = $_POST["uname"];
       $number = $_POST["number"];
       $trainerid = $_POST["trainer_id"];
       $email = $_POST["email"];
 
       $name = $_FILES['file']['name'];
       $target_dir = "../profileImage/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("gif","png","jpg","jpeg");

       // Check extension
       if( in_array($videoFileType,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            echo "File too large. File must be less than 5MB.";
          }else{
            // Upload
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
              // Insert record
              $query = "UPDATE trainer SET Trainer_Name='$trainername',Phone_Number='$number',name='$name',location='$target_file',Trainer_Email='$email' where Trainer_id='$trainerid';";

              mysqli_query($conn,$query);
              echo "Upload successfully.";
            }
          }

       }else{
          echo "Invalid file extension.";
       }
 
     } 
  ?>

    <div class="container">
      <div class="left profile">
        <form class="profileForm">
          <input
            type="submit"
            class="profileButton"
            name="upload"
            value="Your Upload"
          />
          <input
            type="submit"+
            class="profileButton"
            name="logout"
            value="Logout"
          />
        </form>
        <?php 
          $trainer_id = $_SESSION['trainer_userid'];
          $sql = "Select * from trainer WHERE Trainer_id = $trainer_id"; 
          $result = mysqli_query($conn,$sql);
          $resultCheck = mysqli_num_rows($result);
        
          if ($resultCheck > 0) {
            $row = mysqli_fetch_assoc($result);
          }
        ?>        
        
        <div class="profileDetail">
            <?php echo "<p><span>Name:</span> ". $row['Trainer_Name'] . "</p>" ?>
            <?php echo "<p><span>Email:</span> ". $row['Trainer_Email']." </p>"?>
            <?php echo "<p><span>Phone Number:</span> ". $row['Phone_Number']." </p>"?>
        </div>
        <div class="profileImage">
            <img class="roundImage" src="../../img/img_avatar.png" alt="Avatar" >
        </div>
        
      </div>

      <div class="right">
        <div class="top">
          <p>Add Trainer Details</p>
          <input
            style="margin-right: 20px"
            type="submit"
            value="Cancel"
            name="cancel"
          />
          <input type="submit" value="Save" name="save" />
        </div>
        <hr style="margin: 0 20px 0 20px" />
        <div class="bottom">
        <form class="editForm" method="post" action="" enctype='multipart/form-data'>
            <div class="row">
              <div class="col group">
                <label for="Workout Video">Trainer Image</label>
                <input type='file' name='file' />
              </div>
              <div class="col group">
                <label for="title name">Name</label>
                <input type="text" name="uname" placeholder="Name" value="<?php echo $row['Trainer_Name']; ?>"/>
              </div>
            </div>

            <div class="row">
              <div class="group col">
                <label for="title name">Phone Number</label>
                <input type="number" name="number" placeholder="Phone Number" value="<?php echo $row['Phone_Number']; ?>"/>
              </div>
              <div class="group col">
                <label for="subtitle name">Trainer ID</label>
                <input type="number" name="trainer_id" value="<?php echo $row['Trainer_id']; ?>"/>
              </div>
            </div>
            <div class="group">
              <label for="tag name">Trainer Email</label>
              <input type="text" name="email" placeholder="Email" value="<?php echo $row['Trainer_Email']; ?>"/>
            </div>
            <!-- <div class="group">
              <label for="description">Trainer Password</label>
              <input type="password" name="pwd" placeholder="Password" />
            </div>
            <div class="group">
              <label for="description">Confirm Trainer Password</label>
              <input type="password" name="confirm-pwd" placeholder="Confirm Password"/>
            </div> -->
            <button type="submit" name="edit_trainer" value="Upload">Edit Trainer Details</button>
          </form>
          <?php 
                if(isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p> Fill all the fields</p>";
                    }
                    else if ($_GET["error"] == "invalidusername") {
                        echo "<p> Invalid Name </p>";
                    }
                    else if ($_GET["error"] == "invalidemail") {
                        echo "<p> Invalid Email </p>";
                    }
                    else if ($_GET["error"] == "passworddontmatch") {
                        echo "<p> Passwords do not match </p>";
                    }
                    else if ($_GET["error"] == "emailExists") {
                        echo "<p> Email already exists. Try logging in </p>";
                    }
                    else if ($_GET["error"] == "stmtFailed") {
                        echo "<p> Something went wrong </p>";
                    }
                    else if ($_GET["error"] == "none") {
                        echo "<p> Congratulations you have successfully added the trainer</p>";
                    }  
                    
                 }
          ?>
        </div>
      </div>
    </div>

    <?php 
        require('../../components/basic/footer.php')
    ?>
  </body>
</html>
