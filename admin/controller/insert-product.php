<?php
include('../include/dbconnect.php');

$title = $_POST['title'];
$link = $_POST['link'];
$completedate = $_POST['completedate'];

$destination = $path = "";
$error = false;

// Validate image
if (isset($_FILES["product-image"]['name'])) {
    $path = $_FILES['product-image']['name'];
    $extension = pathinfo($path, PATHINFO_EXTENSION);
    $valid_extensions = array("jpg", "jpeg", "png", "gif");
    /* Check file extension */
    if (in_array(strtolower($extension), $valid_extensions)) {
        /* Upload file */
        $destination = '../../upload/products/' . $path;
        move_uploaded_file($_FILES['product-image']['tmp_name'], $destination);
    } else {
        $error = true;
    }
}

// Insert product to products table
if ($error == false) {
    $query = "INSERT INTO products (Title, Image, Link, CompleteDate) VALUES ('$title','$path','$link', '$completedate')";
    mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
    echo "Thêm thành công";
} else {
    echo "File ảnh không hợp lệ";
}

mysqli_close($con);
?>