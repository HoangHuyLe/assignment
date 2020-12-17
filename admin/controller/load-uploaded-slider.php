<?php
include('../include/dbconnect.php');
$query = "SELECT * FROM page_images_tbl WHERE Page ='home' AND Type='slider' ORDER BY Id DESC";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='col-4'>";
    echo "<img src='../upload/slider/{$row['Image']}' alt='slider' class='img-thumbnail' id='{$row['Id']}'>";
    echo "</div>";   
}

mysqli_close($con);
?>
