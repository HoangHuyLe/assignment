<?php
include('../include/dbconnect.php');
$query = "SELECT * FROM users";
$result = mysqli_query($con, $query);
$order_num = 1;
$image = "";
while ($row = mysqli_fetch_assoc($result)) {
    if($row["Image"] != ''){
		$image = "<img src='../users/images/user-avatar/{$row['Image']}' width='50' height='35' />";
	} else {
        $image = "";
    }
    echo "<tr>";
    echo "<td scope='row'>" .$order_num++ ."</td>";
    echo "<td> {$row['Username']} </td>";
    echo "<td> {$row['Email']} </td>";
    echo "<td> {$row['Fullname']} </td>";
    echo "<td> {$row['Type']} </td>";
    echo "<td>". $image ."</td>";
    echo "<td>";
    echo "<button type='button' class='btn btn-warning edit' id={$row['Id']}> Sửa </button>";
    echo "<button type='button' class='btn btn-danger delete' id={$row['Id']}> Xóa </button>";
    echo "</td>";
    echo "</tr>";
}
mysqli_close($con);
?>
