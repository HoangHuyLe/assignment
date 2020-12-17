<?php
include('../include/dbconnect.php');

$id = $_POST['id'];
$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$password2 = $_POST['password2'];

// Check oldpassword is right
$query = "SELECT * FROM admin_tbl WHERE Id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

if( $oldpassword != $row['Password']){
    echo "Mật khẩu cũ không đúng";
} 
else if (strlen($newpassword) < 6 || strlen($newpassword) > 50){
    echo "Mật khẩu không hợp lệ";
} 
else if ($password2 != $newpassword){
    echo "Mật khẩu không khớp";
} else {
    $query = "UPDATE admin_tbl SET Password='$newpassword' WHERE Id='$id'";
    if(mysqli_query($con, $query)){
        echo "Cập nhật thành công";
    } else {
        echo "Error:" . mysqli_error($con);
    }
}

mysqli_close($con);
?>