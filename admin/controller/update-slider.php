<?php
include('../include/dbconnect.php');

// 1) Choose image exist on Upload directory
if (isset($_POST['img_select_id'])) {  
    $img_select_id = $_POST['img_select_id'];
    $old_slider_id = $_POST['old_slider_id'];
    $slider_number = $_POST['slider_number'];

    // Update old slider: change Number = 0
    $query = " UPDATE page_images_tbl SET Number='$slider_number' WHERE Id='$img_select_id' ";
    $query1 = " UPDATE page_images_tbl SET Number=0 WHERE Id='$old_slider_id' ";

    if (mysqli_query($con, $query) && mysqli_query($con, $query1)) {
        echo "<span style='color: green;'>Lưu thành công </span>";
    } else {
        echo "<span style='color: red;'>Lưu thất bại: " . mysqli_error($con) . "</span>";
    }
} 
// 2) Upload image to insert to database
else if(isset($_POST['slider_number']) ){ 
     
    $old_slider_id = $_POST['old_slider_id'];
    $slider_number = $_POST['slider_number'];
    $error = false;
    /* Getting file name */
    $filename = $_FILES['file']['name'];
    
    if($filename != ""){
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extensions = array("jpg", "jpeg", "png", "gif");
        /* Check file extension */
        if (in_array(strtolower($extension), $valid_extensions)) {
            /* Upload file */            
            $destination = '../../upload/slider/' . $filename;
            move_uploaded_file($_FILES['file']['tmp_name'], $destination);
        } else {
            $error = true;
        }        
    }

    if($error == false){
        $query = "UPDATE page_images_tbl SET Number = 0 WHERE Id='$old_slider_id'";
        $query1 = "INSERT INTO page_images_tbl(Image, Page, Type, Number) VALUES ('$filename','home','slider','$slider_number')"; 
        if (mysqli_query($con, $query) && mysqli_query($con, $query1)) {
            echo "Upload thành công";
        } else {
            echo "Upload thất bại: " . mysqli_error($con);
        }
    } else {
        echo "File ảnh không hợp lệ";
    }
}
// 3) Delete slider
else {
    $old_slider_id = $_POST['old_slider_id'];
    $query = "UPDATE page_images_tbl SET Number = 0 WHERE Id='$old_slider_id'";
    if (mysqli_query($con, $query)){
        echo "Xóa thành công";
    } else {
        echo "Error:" . mysqli_error($con);
    }
}

mysqli_close($con);
?>