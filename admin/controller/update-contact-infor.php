<?php
include('../include/dbconnect.php');

// Get page contact id ( 2 page )
$query = "SELECT * FROM page_tbl WHERE PageType='contact'";
$result = mysqli_query($con, $query);
$page_id = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($page_id, $row['Id']);
}

// Update database
$pagedesc = $_POST['pagedesc'];
$address = $_POST['address'];
$email1 = $_POST['email1'];
$email2 = $_POST['email2'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];
$query1 = "UPDATE page_tbl SET PageDescription = '$pagedesc', Address='$address', Email='$email1', Phone='$phone1'  WHERE Id = '$page_id[0]'";
$query2 = "UPDATE page_tbl SET PageDescription = '$pagedesc', Address='$address', Email='$email2', Phone='$phone2'  WHERE Id = '$page_id[1]'";

if( mysqli_query($con, $query1) && mysqli_query($con, $query2)){
    echo "Cập nhật thành công";
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>