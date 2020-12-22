<?php
include('../include/dbconnect.php');

$id = $_POST['id'];

$query = "SELECT Image FROM products WHERE Id='$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
unlink("../../upload/products/" . $row['Image']);

$query = "DELETE FROM products WHERE Id='$id'";
if (mysqli_query($con, $query)) {
    echo 'Xóa thành công';
} else {
    die(mysqli_error($con));
};

mysqli_close($con);
?>