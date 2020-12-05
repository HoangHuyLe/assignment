<?php
include('include/dbconnect.php');

$username = $email = $password = $repassword = "";
$error = false;
$emailformat = "/[a-zA-Z0-9]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+/";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

if ($username == "" or strlen($username) < 6 or strlen($username) > 50) {
    $error = true;
}
if ($email == "" or !preg_match($emailformat, $email)) {
    $error = true;
}
if ($password == "" or strlen($password) < 6 or strlen($password) > 50) {
    $error = true;
}
if ($repassword != $password) {
    $error = true;
}

// Check whether username already taken
$query = "SELECT * FROM users WHERE Username = '$username'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    $error = true;
}

// Check whether email already taken
$query = "SELECT * FROM users WHERE Email='$email'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    $error = true;
}

// Insert account to users table
if ($error == false) {
    $query = "INSERT INTO users (Username, Password, Email) VALUES ('$username','$password','$email')";
    $result = mysqli_query($con, $query);
    echo "<span style='color:green;'>" . "Đăng ký thành công. Bạn có thể đăng nhập." . "</span>";
} else {
    echo "<span style='color:red;'>" . "Đăng ký thất bại. Vui lòng kiểm tra lại thông tin đăng ký." . "</span>";
}

mysqli_close($con);
?>