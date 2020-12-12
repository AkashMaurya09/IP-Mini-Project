<?php

$serveName = "localhost";
$dbUsername = "root";
$dbPassword = "vesit";
$dbName = "gym";

// $serveName = "remotemysql.com";
// $dbUsername = "uBjMctQTxC";
// $dbPassword = "W9oUikkyHx";
// $dbName = "uBjMctQTxC";

$conn = mysqli_connect($serveName,$dbUsername,$dbPassword,$dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
    // echo "Success from dbh";
}