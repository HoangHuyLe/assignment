<?php
include('../include/dbconnect.php');
$query = "SELECT * FROM products";
$result = mysqli_query($con, $query);
$order_num = 1;
$image = "";
$products_array = array();

while ($row = mysqli_fetch_assoc($result)) {
    $image = "<img src='../upload/products/{$row['Image']}' width='60' height='40' />";
    $action = "<button type='button' class='btn btn-warning edit' id={$row['Id']}> Sửa </button>" 
            . "<button type='button' class='btn btn-danger ml-1 delete' id={$row['Id']}> Xóa </button>";
    $temp = explode('-',$row['CompleteDate']);
    $new_date = $temp[2] .'-' . $temp[1] .'-' .$temp[0];
    $product = array(
        "ordernum" => $order_num++,
        "title" => $row['Title'],
        "image" => $image,
        'link' => $row['Link'],
        'completedate' => $new_date,
        'action' => $action
    );
    array_push($products_array, $product);
}

echo json_encode($products_array);

mysqli_close($con);
?>
