<?php
include '../includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="/css/trainer/editvideo.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<style>
.Content-Center {
    display: flex;
    justify-content: center;
    align-items: center;
}

.Container {
    border-radius: 5px;
    border: 1px solid grey;
    width: 75%;
    height: auto;
    margin-bottom: 30px;
}

.Payment-Card {
    background-color: #e8e8e8;
    display: flex;
    padding: 5px;
    /* padding-left: 30px; */
    /* padding-right: 30px; */
    /* padding-bottom: 30px; */
    /* background-color: pink; */
    /* border: 1px solid; */
    /* border-radius: 5px; */
    flex: start;
}

.Payment-Card p {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-weight: bold;
    font-size: medium;
}

.Inline_div {
    display: flex;
    justify-content: center;

}

form label {
    margin: 20px;
}

#First_name {
    width: 70%;
}

#Last_Name {
    width: 70%;
}

input {
    padding-left: 10px;
    border: 1px solid grey;
    margin: 20px;
    height: 40px;
    border-radius: 3px;
    transition: 0.3s all linear;
}

#cardholder {
    width: 75%;
}

input:focus {
    outline: none;
    border: 1px solid blue;
}

button {
    width: 100%;
    padding: 20px;
    border: none;
    border-top: 0.5px solid;
    border-radius: 2px;
    color: white;
    background-color: black;
    transition: all 0.3s linear;
}

button:hover {
    color: black;
    background-color: grey;
}

@media screen and (max-width: 600px) {
    .Inline_div {
        display: block;
    }

    #First_name {
        width: 70%;
    }

    #Last_Name {
        width: 70%;
    }

}
</style>

<body>

    <?php 
    require('../../components/basic/header.php');
  ?>


    <?php  
  $oneYearOn = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 1 year"));
    if(isset($_POST['submit'])) {
        $video_id = $_GET["Video_id"];
        $member_id = $_SESSION['memberid'];
        $validity = $oneYearOn;
        $query = "INSERT INTO purchases(Validity,Member_id,Video_id) VALUES('".$validity."','".$member_id."','".$video_id."');";
        mysqli_query($conn,$query);
        echo "Buy successfull.";
        header("location: ./videoPlay.php?Video_id=$video_id");
      } 
  ?>
    <div class="Content-Center">
        <div class="Container">
            <div class="Payment-Card">
                <p>Payemnt Details </p>
            </div>
            <hr />
            <form method="POST">
                <label for="input">Card Holder Name</label><br />
                <input type="text" id="cardholder"><br />
                <label for="input">Card Number</label><br />
                <input type="text" id="cardholder" placeholder="Valid Card Number">
                <div class="Inline_div">
                    <div id="div1">
                        <label for="First_Name">EXP Date</label>
                        <br />
                        <input name="first_name" id="First_Name" type="date" />
                    </div>
                    <div id="div2">
                        <label for="Name">CVV</label>
                        <br />
                        <input name="last_name" id="Last_Name" type="text" />
                    </div>
                </div>
                <button type="submit" name="submit">Pay Now</button>
            </form>
        </div>



    </div>
    </div>

    <?php 
        require('../../components/basic/footer.php')
    ?>


</body>

</html>