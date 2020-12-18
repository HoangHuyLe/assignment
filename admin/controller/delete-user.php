<?php
include('../include/dbconnect.php');

$id = $_GET['id'];
$query = "SELECT Image FROM users WHERE Id='$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$image_name = $row['Image'];
if ($image_name != '') {
    unlink("../../upload/user-avatar/" . $image_name);
}
$query = "DELETE FROM users WHERE Id='$id'";
if (mysqli_query($con, $query)) {
    echo 'ok'; // Successfully delete  
} else {
    die(mysqli_error($link));
};

mysqli_close($con);
?>