
<?php 
$sql = "SELECT * FROM Workout WHERE Video_id NOT IN (SELECT Video_id From purchases Where Member_id='$memberid')";
 
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);
?>
<?php 
                    if ($resultCheck > 0) {
                      $i = 0;
                      while($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <div class="singleTrainer">
                            <video class="disabled" src="'. $row['location'] .'" controls width="320px" height="200px">
                            </video>
                            <div class="detailContent">
                                <p>' . $row['Video_Name'] . '</p> 
                                <p class="tag">#Weights #5minutes</p> 
                                <p class="description">'. $row['Description'] . '</p>
                            </div>
                            <div class="buyVideoButton">
                                <button>&#8377;'. $row['Price'] . '</button>
                                <button onClick="location.href=\'http://localhost/pages/member/payment.php?Video_id='.$row["Video_id"].'\'">Buy Now</button>
                            </div>
                        </div>
                        ';
                        $i = $i + 1;
                      }
                    }
                  ?>




                  //    $Name = $_POST['search'];
// //Search query.
//    $Query = "SELECT Name FROM search WHERE Name LIKE '%$Name%' LIMIT 5";
// //Query execution
//    $ExecQuery = MySQLi_query($con, $Query);
// //Creating unordered list to display result.
//    echo '
// <ul>
//    ';
//    //Fetching result from database.
//    while ($Result = MySQLi_fetch_array($ExecQuery)) {
//        ?>
//    <!-- Creating unordered list items.
//         Calling javascript function named as "fill" found in "script.js" file.
//         By passing fetched result as parameter. -->
//    <li onclick='fill("<?php echo $Result['Name']; ?>")'>
//    <a>
//    <!-- Assigning searched result in "Search box" in "search.php" file. -->
//        <?php echo $Result['Name']; ?>
//    </li></a>
//    <!-- Below php code is just for closing parenthesis. Don't be confused. -->
//    <?php
// }}


<div class="singleTrainer">
                            <video class="disabled" src="'. $row['location'] .'" controls width="320px" height="200px">
                            </video>
                            <div class="detailContent">
                                <p>' . $row['Video_Name'] . '</p> 
                                <p class="tag">#Weights #5minutes</p> 
                                <p class="description">'. $row['Description'] . '</p>
                            </div>
                            <div class="buyVideoButton">
                                <button>&#8377;'. $row['Price'] . '</button>
                                <button onClick="location.href=\'http://localhost/pages/member/payment.php?Video_id='.$row["Video_id"].'\'">Buy Now</button>
                            </div>
                        </div>