<?php
include('../include/dbconnect.php');

$id = $_POST['id'];

$query = "DELETE FROM contacts WHERE Id='$id'";
if (mysqli_query($con, $query)) {
    echo '1';
} else {
    die(mysqli_error($con));
};

mysqli_close($con);
?>