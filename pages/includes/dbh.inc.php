<?php

$serveName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "gym";

$conn = mysqli_connect($serveName,$dbUsername,$dbPassword,$dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
    // echo "Success from dbh";
}