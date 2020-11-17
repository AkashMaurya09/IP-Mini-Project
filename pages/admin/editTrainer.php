<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/editVideo.css" />
    <link rel="stylesheet" href="../../css/header.css" />
    <link rel="stylesheet" href="../../css/footer.css" />

    <title>Edit Trainer</title>
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
        <div class="profileDetail">
            <p><span>Name:</span> Srajan Shetty</p>
            <p><span>Age:</span> 18</p>
            <p><span>Phone Number:</span> 9967025541</p>
            <p><span>Video Count</span> 45</p>
        </div>
        
        <div class="profileImage">
            <img class="roundImage" src="../../img/img_avatar.png" alt="Avatar" >
        </div>
        
      </div>

      <div class="right">
        <div class="top">
          <p>Edit Trainer Details</p>
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
          <form class="editForm">
            <div class="row">
              <div class="col group">
                <label for="Workout Video">Trainer Image</label>
                <button class="profileButton fill">Upload Image</button>
              </div>
              <div class="col group">
                <label for="title name">First Name</label>
                <input type="text" />
              </div>
            </div>

            <div class="row">
              <div class="group col">
                <label for="title name">Last Name</label>
                <input type="text" />
              </div>
              <div class="group col">
                <label for="subtitle name">Speciality</label>
                <input type="text" />
              </div>
            </div>
            <div class="group">
              <label for="tag name">Tag Name</label>
              <input type="text" />
            </div>
            <div class="group">
              <label for="description">Email</label>
              <input type="text" />
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
