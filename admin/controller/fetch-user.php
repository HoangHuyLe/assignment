<?php
include('../include/dbconnect.php');
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE Id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$respone = array(
    "id"=>$id,
    "username" => $row['Username'],
    "email" => $row["Email"],
    "fullname" => $row['Fullname'],
    "type" => $row['Type']
);
echo json_encode($respone);

mysqli_close($con);
?>