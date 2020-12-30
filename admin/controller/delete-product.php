<?php
include('../include/dbconnect.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "SELECT Image FROM products WHERE Id='$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

    if ($row['Image'] != null) {
        unlink("../../upload/products/" . $row['Image']);
    }

    $query = "DELETE FROM products WHERE Id='$id'";
    if (mysqli_query($con, $query)) {
        echo 'Xóa thành công';
    } else {
        die(mysqli_error($con));
    };
}

mysqli_close($con);
?>