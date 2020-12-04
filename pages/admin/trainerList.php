<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/trainer/trainerList.css" />
    <link rel="stylesheet" href="/css/trainer/editVideo.css" />

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
            name="dashboard"
            value="Dashboard"
          />
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
        <div>
            <div>
                <form class="searchArea">
                    <input type="text" placeholder="  Search Trainer" name="searchTrainer">
                    <input type="submit" value="Add Trainer" name="addTrainer">
                </form>
            </div>

            <div class="trainerList">

                <div class="singleTrainer">  
                  <img src="../../img/img_avatar.png" alt="Avatar">
                  <div class="detailContent">
                    <p><span>Name:</span> Srajan Shetty</p>
                    <p><span>Name:</span> Srajan Shetty</p>
                    <p><span>Age:</span> 18</p>
                  </div>
                  <div class="vl"></div>
                  <div class="detailContent">
                    <p><span>Phone Number:</span> 9967025541</p>
                    <p><span>Video Count</span> 45</p>
                    <p><span>Video Count</span> 45</p>
                  </div>
                  
                  <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">...</button>
                    <div id="myDropdown" class="dropdown-content">
                      <a href="#">Edit Details</a>
                      <a href="#">Remove Trainer</a>
                    </div>
                  </div>        
                </div>

                <div class="singleTrainer">  
                  <img src="../../img/img_avatar.png" alt="Avatar">
                  <div class="detailContent">
                    <p><span>Name:</span> Srajan Shetty</p>
                    <p><span>Name:</span> Srajan Shetty</p>
                    <p><span>Age:</span> 18</p>
                  </div>
                  <div class="vl"></div>
                  <div class="detailContent">
                    <p><span>Phone Number:</span> 9967025541</p>
                    <p><span>Video Count</span> 45</p>
                    <p><span>Video Count</span> 45</p>
                  </div>
                  
                  <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">...</button>
                    <div id="myDropdown" class="dropdown-content">
                      <a href="#">Edit Details</a>
                      <a href="#">Remove Trainer</a>
                    </div>
                  </div>        
                </div>

            </div>
        </div>
      </div>
    </div>

     <?php 
        require('../../components/basic/footer.php')
    ?> 

    <script>
      /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
    </script>
  </body>
</html>
