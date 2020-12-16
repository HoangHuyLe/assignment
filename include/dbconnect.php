<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "assignment";

//connection to the database
$con = mysqli_connect($hostname, $username, $password);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select DB
$db_selected = mysqli_select_db($con, $dbname) or die("Could not select assignment");
?>