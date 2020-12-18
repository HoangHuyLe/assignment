<?php
include('../include/dbconnect.php');
$id = $_GET['id'];
$query = "SELECT * FROM products WHERE Id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$respone = array(
    "id"=> $id,
    "title" => $row['Title'],
    "image" => $row["Image"],
    "link" => $row['Link'],
    "completedate" => $row['CompleteDate']    
);
echo json_encode($respone);

mysqli_close($con);
?>