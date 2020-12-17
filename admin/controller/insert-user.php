<?php
include('../include/dbconnect.php');

$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$type = $_POST['type'];
$error = false;
$emailformat = "/[a-zA-Z0-9]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+/";
$destination = $image_name = "";

if ($username == "" or strlen($username) < 6 or strlen($username) > 50) {
    $error = true;
}
if ($email == "" or !preg_match($emailformat, $email)) {
    $error = true;
}
if ($password == "" or strlen($password) < 6 or strlen($password) > 50) {
    $error = true;
}
if ($password2 != $password) {
    $error = true;
}
if (isset($_FILES["image"]['name'])) {
    $path = $_FILES['image']['name'];
    if ($path != "") {
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $valid_extensions = array("jpg", "jpeg", "png", "gif");
        /* Check file extension */
        if (in_array(strtolower($extension), $valid_extensions)) {
            /* Upload file */
            $image_name = $username . '_avatar' . '.' . $extension;
            $destination = '../../upload/user-avatar/' . $image_name;
            move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        } else {
            $error = true;
        }        
    }  
}

// Check whether username already taken
$query = "SELECT * FROM users WHERE Username = '$username'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    $error = true;
}

// Check whether email already taken
$query1 = "SELECT * FROM users WHERE Email='$email'";
$result1 = mysqli_query($con, $query1);
if (mysqli_num_rows($result1) > 0) {
    $error = true;
}

// Insert account to users table
if ($error == false) {
    $query2 = "INSERT INTO users (Username, Password, Email, Fullname, Type, Image) VALUES ('$username','$password','$email', '$fullname', '$type', '$image_name' )";
    $result2 = mysqli_query($con, $query2);
    echo "<span style='color:green;'>" . "Thêm thành công." . "</span>";
} else {
    echo "<span style='color:red;'>" . "Thêm thất bại. Vui lòng kiểm tra lại thông tin." . "</span>";
}

mysqli_close($con);
?>