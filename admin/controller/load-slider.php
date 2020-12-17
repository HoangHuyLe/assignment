<?php
include('../include/dbconnect.php');

$slider_number = $_POST['slider_number'];
$query = "SELECT * FROM page_images_tbl WHERE Page ='home' AND Type='slider' AND Number='$slider_number' ";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    $slider_array = array('id' => $row['Id'], 'image' => $row['Image']);
    echo json_encode($slider_array);
} else {
    echo json_encode(array('id'=>'-1','image'=>""));
}

mysqli_close($con);
?>