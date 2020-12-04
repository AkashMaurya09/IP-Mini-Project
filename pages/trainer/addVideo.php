<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/trainer/editVideo.css" />
    <link rel="stylesheet" href="../../css/common/header.css" />
    <link rel="stylesheet" href="../../css/common/footer.css" />

    <title>Edit Video</title>
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
          <form class="editForm">
            <div class="row">
              <div class="col group">
                <label for="Workout Video">Workout Video</label>
                <button class="profileButton fill">Upload Video</button>
              </div>
              <div class="col group">
                <label for="title name">File Name</label>
                <input type="text" />
              </div>
            </div>

            <div class="row">
              <div class="group col">
                <label for="title name">Title Name</label>
                <input type="text" />
              </div>
              <div class="group col">
                <label for="subtitle name">Subtitle Name</label>
                <input type="text" />
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
