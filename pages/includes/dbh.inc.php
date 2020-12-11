<?php

// $serveName = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName = "gym";

$serveName = "remotemysql.com";
$dbUsername = "IpvrUTLPlq";
$dbPassword = "gS8rXYb9vG";
$dbName = "IpvrUTLPlq";

$conn = mysqli_connect($serveName,$dbUsername,$dbPassword,$dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
    // echo "Success from dbh";
}