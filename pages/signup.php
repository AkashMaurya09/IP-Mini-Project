<?php 
  require('../components/basic/header.php')
?>

  <main>
    <h1>This is the signup page</h1>  
    <form action="includes/signup.php" method="post">
      <input type="text" name="email" placeholder="Email">   
      <br/>
      <input type="text" name="uname" placeholder="Username">
      <br/>
      <input type="number" name="number"  placeholder="Phone Number">
      <br/>
      <input type="date" name="dob" placeholder="Date of Birth">
      <br/>
      <input type="password" name="pwd" placeholder="Password">
      <br/>
      <input type="password" name="confirm-pwd" placeholder="Confirm Password">
      <br/>
      <button type="submit">Register</button>
    </form>
    
  </main>

<?php 
  require('../components/basic/footer.php')
?>