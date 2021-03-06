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
  include_once '../includes/trainer_session.php';
  if (isset($_POST['edit_trainer'])) {
    $maxsize = 524288000; // 510MB
    $trainername = $_POST["uname"];
    $number = $_POST["number"];
    $trainerid = $_POST["trainer_id"];
    $email = $_POST["email"];

    $name = $_FILES['file']['name'];
    $target_dir = "../profileImage/";
    $target_file = $target_dir . $_FILES["file"]["name"];

    // Select file type
    $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("gif", "png", "jpg", "jpeg");
    if (empty($trainername) || empty($number) || empty($trainerid) || empty($email) || empty($name)) {
      header("location:../trainer/editTrainer.php?error=emptyinput");
      exit();
    } else {
      // Check extension
      if (in_array($videoFileType, $extensions_arr)) {

        // Check file size
        if (($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
          echo "File too large. File must be less than 5MB.";
        } else {
          // Upload
          if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            // Insert record
            $query = "UPDATE trainer SET Trainer_Name='$trainername',Phone_Number='$number',name='$name',location='$target_file',Trainer_Email='$email' where Trainer_id='$trainerid';";

            mysqli_query($conn, $query);
            header("location:../trainer/editTrainer.php?error=updateSuccess");
          }
        }
      } else {
        header("location:../trainer/editTrainer.php?error=filechoose");
      }
    }
  }
  if (isset($_POST["edit_password"])) {
    $trainer_id = $_SESSION['trainer_userid'];
    $password = $_POST["pwd"];
    $confirmpassword = $_POST["confirm-pwd"];
    if (empty($password) || empty($confirmpassword)) {
      header("location:../trainer/editTrainer.php?error=emptypwdinput");
      exit();
    } else {
      if ($password !== $confirmpassword) {
        header("location:../trainer/editTrainer.php?error=pwdmatcherror");
        exit();
      } else {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $pwdquery = "UPDATE trainer SET Trainer_Password='$hashedPwd' where trainer_id = '$trainer_id';";
        mysqli_query($conn, $pwdquery);
        header("location:../trainer/editTrainer.php?error=pwdsuccess");
        exit();
      }
    }
  }

  if(isset($_POST['myVideo'])) {
    header("location: ./trainerVideoList.php");
  } 
  if(isset($_POST['addVideo'])) {
      header("location: ./addVideo.php");
  } 
  if(isset($_POST['myProfile'])) {
      header("location: ./editTrainer.php");
  }
  if(isset($_POST['logout'])) {
      header("location: ../includes/logout.inc.php");
  } 
  ?>

  <div class="container">
    <div class="left profile">
      <form class="profileForm" method="post">
        <input type="submit" class="profileButton" name="myVideo" value="My Videos" />
        <input type="submit" class="profileButton " name="addVideo" value="Add Video" />
        <input type="submit" class="profileButton active" name="myProfile" value="My Profile" />
        <input type="submit" + class="profileButton" id="bottom-curve" name="logout" value="Logout" />
      </form>
      <hr>
      <?php
      $trainer_id = $_SESSION['trainer_userid'];
      $sql = "Select * from trainer WHERE Trainer_id = $trainer_id";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
      }
      ?>

      <div class="profileDetail">
        <?php echo "<p>" . $row['Trainer_Name'] . "</p>" ?>
        <?php echo "<p>" . $row['Trainer_Email'] . " </p>" ?>
      </div>
      <div class="profileImage">
        <?php echo "<img class='roundImage' src=' " . $row['location'] . "' alt='Avatar' >" ?>
      </div>
    </div>

    <div class="right">
      <div class="top">
        <p>Edit Your Details</p>
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
              <input type="text" name="uname" placeholder="Name" value="<?php echo $row['Trainer_Name']; ?>" />
            </div>
          </div>

          <div class="row">
            <div class="group col">
              <label for="title name">Phone Number</label>
              <input type="number" name="number" placeholder="Phone Number" value="<?php echo $row['Phone_Number']; ?>" />
            </div>
            <div class="group col">
              <label for="subtitle name">Trainer ID</label>
              <input type="number" name="trainer_id" value="<?php echo $row['Trainer_id']; ?>" />
            </div>
          </div>
          <div class="group">
            <label for="tag name">Trainer Email</label>
            <input type="text" name="email" placeholder="Email" value="<?php echo $row['Trainer_Email']; ?>" />
          </div>
          <div class="submitGroup">
            <input type="submit" name="edit_trainer" value="Save">
          </div>
          <div class="group">
            <label for="description">Trainer Password</label>
            <input type="password" name="pwd" placeholder="Password" />
          </div>
          <div class="group">
            <label for="description">Confirm Trainer Password</label>
            <input type="password" name="confirm-pwd" placeholder="Confirm Password" />
          </div>
          <div class="submitGroup">
            <input type="submit" name="edit_password" value="Save">
          </div>
        </form>
        <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "updateSuccess") {
            echo "  <div class='group'>
                    <label style='color:green' for='description'>Details Update Successfully</label>
                    </div>  ";
          }
          if ($_GET["error"] == "filechoose") {
            echo "  <div class='group'>
                    <label style='color:red' for='description'>Please select your profile Image</label>
                    </div>  ";
          }
          if ($_GET["error"] == "emptyinput") {
            echo "  <div class='group'>
                    <label style='color:red' for='description'>Please fill all the fields</label>
                    </div>  ";
          }
        }
        ?>

        <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "pwdmatcherror") {
            echo "  <div class='group'>
                    <label style='color:red' for='description'>Passwords do not match</label>
                    </div>  ";
          }
          if ($_GET["error"] == "pwdsuccess") {
            echo "  <div class='group'>
                    <label style='color:green' for='description'>Password changed Successfully</label>
                    </div>  ";
          }
          if ($_GET["error"] == "emptypwdinput") {
            echo "  <div class='group'>
                    <label style='color:red' for='description'>Password cannot be empty</label>
                    </div>  ";
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