<?php
include_once('include/dbconnect.php');
if(!empty($_POST['username'])){   
    $username = $_POST['username'];
    $query = "SELECT * FROM users WHERE Username = '$username'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0){
        echo "<span style='color:red'>* Tên tài khoản đã tồn tại </span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {
        echo "<span style='color:green'> Tên tài khoản hợp lệ .</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
    }
};

if(!empty($_POST['email'])){
    $email = $_POST['email'];    
    $query1 = "SELECT * FROM users WHERE Email='$email'";
    $result1 = mysqli_query($con, $query1);
    if(mysqli_num_rows($result1) > 0){
        echo "<span style='color:red'>* Email đã tồn tại </span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {
        echo "<span style='color:green'> Email hợp lệ .</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}

mysqli_close($con);
?>