<?php
include('../include/dbconnect.php');
$id = $_GET['id'];
$type = $_GET['type'];
$query = "UPDATE users SET Type = '$type' WHERE Id = '$id'";

if( mysqli_query($con, $query)){
    echo "ok"; // Successfully update
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>