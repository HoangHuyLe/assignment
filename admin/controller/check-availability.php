<?php
include_once('../include/dbconnect.php');

$username = $_POST['username'];
$email = $_POST['email'];
$query = "SELECT * FROM users WHERE Username = '$username'";
$result = mysqli_query($con, $query);
$query1 = "SELECT * FROM users WHERE Email='$email'";
$result1 = mysqli_query($con, $query1);
$num = mysqli_num_rows($result);
$num1 = mysqli_num_rows($result1);
$respone = array();

if($num > 0){
    array_push($respone, '0'); // username exist
} else {
    array_push($respone, '1');
}
if($num1 > 0){
    array_push($respone, '0'); // email exist
} else {
    array_push($respone, '1');
}

echo json_encode($respone);

mysqli_close($con);
?>
