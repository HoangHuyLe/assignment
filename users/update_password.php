<?php
include_once('include/dbconnect.php');
$email = $_POST['email'];
$password = $_POST['password'];
$query = "UPDATE users SET Password='$password' WHERE Email='$email'";

if(mysqli_query($con, $query)){
    echo "1";
} else {
    echo '0';
}

mysqli_close($con);
?>
