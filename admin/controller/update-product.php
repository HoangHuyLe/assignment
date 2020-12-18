<?php
include('../include/dbconnect.php');

$id = $_POST['id'];
$title = $_POST['title'];
$link = $_POST['link'];
$completedate = $_POST['completedate'];
$path = $_FILES['product-image']['name'];

// If new image is exist 
if ($path != '') {  
    $extension = pathinfo($path, PATHINFO_EXTENSION);
    $valid_extensions = array("jpg", "jpeg", "png", "gif");
    /* Check file extension */
    if (in_array(strtolower($extension), $valid_extensions)) {
        /* Upload file */
        $destination = '../../upload/products/' . $path;
        move_uploaded_file($_FILES['product-image']['tmp_name'], $destination);
        // Delete old picture
        $query = "SELECT Image FROM products WHERE Id='$id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        unlink("../../upload/products/" . $row['Image']);

        // Update database
        $query = "UPDATE products SET Title = '$title', Image='$path', Link='$link', CompleteDate='$completedate' WHERE Id = '$id'";
        if (mysqli_query($con, $query)) {
            echo "Cập nhật thành công";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
} else {    
    $query = "UPDATE products SET Title = '$title', Link='$link', CompleteDate='$completedate' WHERE Id = '$id'";
    if (mysqli_query($con, $query)) {
        echo "Cập nhật thành công";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>