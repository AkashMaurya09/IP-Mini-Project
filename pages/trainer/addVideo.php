<?php 
  include_once '../includes/dbh.inc.php';  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/trainer/editVideo.css" />
    

    <title>Edit Video</title>
    <?php
    include '../includes/dbh.inc.php';
 
    if(isset($_POST['but_upload'])){
       $maxsize = 524288000; // 5MB
 
       $name = $_FILES['file']['name'];
       $target_dir = "videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($videoFileType,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            echo "File too large. File must be less than 5MB.";
          }else{
            // Upload
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
              // Insert record
              $query = "INSERT INTO videos(name,location) VALUES('".$name."','".$target_file."')";

              mysqli_query($conn,$query);
              echo "Upload successfully.";
            }
          }

       }else{
          echo "Invalid file extension.";
       }
 
     } 
     ?>
  </head>
  <body>
  
  <?php 
    require('../../components/basic/header.php')
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

        
        <div class="profileImage">
            <img class="roundImage" src="../../img/img_avatar.png" alt="Avatar" >
        </div>
        <div class="profileDetail">
            <?php echo "<p><span>Name:</span> ". $row['Trainer_Name'] . "</p>" ?>
            <?php echo "<p><span>Email:</span> ". $row['Trainer_Email']." </p>"?>

            <!-- <p><span>Phone Number:</span> 9967025541</p>
            <p><span>Video Count</span> 45</p> -->
        </div>
        
      </div>

      <div class="right">
        <div class="top">
          <p>Add Your Video</p>
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
                <label for="Workout Video">Workout Video</label>
                <input type='file' name='file' />
              </div>
            </div>

            <div class="row">
              <div class="group col">
                <label for="title name">Video Name</label>
                <input type="text" name="video_name"/>
              </div>
              <div class="group col">
                <label for="subtitle name">Price</label>
                <input type="text" name="price"/>
              </div>
            </div>
            <div class="group">
              <label for="tag name">Tag Name</label>
              <input type="text" />
            </div>
            <div class="group">
              <label for="description">Description</label>
              <textarea row="300" cols="20"></textarea>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php 
        require('../../components/basic/footer.php')
    ?>
  </body>
</html>

<?php
