<?php 
  include_once '../includes/dbh.inc.php';  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/trainer/editVideo.css" />

      <title>Edit Member</title>

      
  </head>
  <body>
  
  <?php 
    require('../../components/basic/header.php');
      if(isset($_POST['edit_member'])){
       $maxsize = 524288000; // 510MB
       $membername = $_POST["uname"];
       $number = $_POST["number"];
       $memberid = $_POST["member_id"];
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
              $query = "UPDATE member SET Member_Name='$membername',Phone_Number='$number',name='$name',location='$target_file',Member_Email='$email' where Member_id='$memberid';";

              mysqli_query($conn,$query);
              header("location:../member/editMember.php?error=updateSuccess");
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
          $member_id = $_SESSION['memberid'];
          $sql = "Select * from member WHERE Member_id = $member_id"; 
          $result = mysqli_query($conn,$sql);
          $resultCheck = mysqli_num_rows($result);
        
          if ($resultCheck > 0) {
            $row = mysqli_fetch_assoc($result);
          }
        ?>        
        
        <div class="profileDetail">
            <?php echo "<p><span>Name:</span> ". $row['Member_Name'] . "</p>" ?>
            <?php echo "<p><span>Email:</span> ". $row['Member_Email']." </p>"?>
            <?php echo "<p><span>Phone Number:</span> ". $row['Phone_Number']." </p>"?>
        </div>
        <div class="profileImage">
            <?php echo"<img class='roundImage' src=' ". $row['location'] ."' alt='Avatar' >" ?>
        </div>
        
      </div>

      <div class="right">
        <div class="top">
          <p>Edit Your Details</p>
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
                <label for="Workout Video">Member Image</label>
                <input type='file' name='file' />
              </div>
              <div class="col group">
                <label for="title name">Name</label>
                <input type="text" name="uname" placeholder="Name" value="<?php echo $row['Member_Name']; ?>"/>
              </div>
            </div>

            <div class="row">
              <div class="group col">
                <label for="title name">Phone Number</label>
                <input type="number" name="number" placeholder="Phone Number" value="<?php echo $row['Phone_Number']; ?>"/>
              </div>
              <div class="group col">
                <label for="subtitle name">Member ID</label>
                <input type="number" name="member_id" value="<?php echo $row['Member_id']; ?>"/>
              </div>
            </div>
            <div class="group">
              <label for="tag name">Member Email</label>
              <input type="text" name="email" placeholder="Email" value="<?php echo $row['Member_Email']; ?>"/>
            </div>
            <!-- <div class="group">
              <label for="description">Trainer Password</label>
              <input type="password" name="pwd" placeholder="Password" />
            </div>
            <div class="group">
              <label for="description">Confirm Trainer Password</label>
              <input type="password" name="confirm-pwd" placeholder="Confirm Password"/>
            </div> -->
            <button type="submit" name="edit_member" value="Upload">Edit Member Details</button>
          </form>
          <?php 
                if(isset($_GET["error"])) {
                    if ($_GET["error"] == "updateSuccess") {
                        echo "<p>Update Successfull</p>";
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
