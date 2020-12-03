<?php 
  require('../../components/basic/header.php')
?>

  <main>
    <h1>This is the login page</h1>  
    <div class="center">

      <h3>SIGN IN FOR<br></h3>
        <span> GLORY</span><br><br>
        <img src="../img/logo/logo_yellow_vertical.png">
        <br><br>
        <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias dolores sed libero<br> unde esse
                soluta voluptates animi error reprehenderit porro!</blockquote>
        <br>
        <form action="includes/member_login.inc.php" method="post">
          <input type="text" name="email" placeholder="Email">
            <br />
            <input type="password" name="pwd" placeholder="Password">
            <br />
            <button type="submit" name="submit">Sign In</button>

        </form>
    </div>
  </main>

<?php 
  require('../../components/basic/footer.php')
?>