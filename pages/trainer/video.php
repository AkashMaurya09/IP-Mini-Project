<?php
include '../includes/dbh.inc.php';  

if(isset($_POST['but_upload'])){
 
  $filename = $_FILES['file']['name'];
  $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");

    if( in_array($extension,$extensions_arr) ){
   
      // Convert to base64 
      $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
      $image = "data::image/".$extension.";base64,".$image_base64;
      if( move_uploaded_file($_FILES['file']['tmp_name'], $target_dir)){

        $query = "insert into image(name,image) values('".$filename."','".$image."')";
        mysqli_query($conn,$query);
  
      }
    }    
  } 
    
 

?>

<form method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='file' />
  <input type='submit' value='Save name' name='but_upload'>
</form>