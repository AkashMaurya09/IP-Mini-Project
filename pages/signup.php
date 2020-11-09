<?php 
  require('header.php')
?>

  <main>
    <h1>This is the signup page</h1>  
    <form action="includes/signup.php" method="post">
      <input type="text" name="name" placeholder="Name">
      <input type="number" name="number" placeholder="Phone Number">
      <input type="text" name="address" placeholder="Address">
      <input type="text" name="uid" placeholder="Username">
      <input type="date" name="dob">
      <input type="text" name="uid" placeholder="Username">
      <input type="password" name="pwd" placeholder="Password">
      <input type="password" name="confirm-pwd" placeholder="Confirm Password">
    </form>
  </main>

<?php 
  require('footer.php')
?>