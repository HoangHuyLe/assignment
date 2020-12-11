<?php
include('../include/dbconnect.php');

$id = $_GET['id'];
$query = "DELETE FROM users WHERE Id='$id'";
if(mysqli_query($con, $query)){
    echo 'ok'; // Successfully delete  
} else {
    die(mysqli_error($link));
}; 

mysqli_close($con);
?>
