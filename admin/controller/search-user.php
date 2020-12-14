<?php
include('../include/dbconnect.php');
$search = $_GET['search'];
$query = "
SELECT * FROM users
WHERE Username LIKE '%$search%'
OR Email LIKE '%$search%'
OR Fullname LIKE '%$search%'
";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $order_num = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td scope='row'>" . $order_num++ . "</td>";
        echo "<td> {$row['Username']} </td>";
        echo "<td> {$row['Email']} </td>";
        echo "<td> {$row['Fullname']} </td>";
        echo "<td> {$row['Type']} </td>";
        echo "<td>";
        echo "<button type='button' class='btn btn-warning edit' id={$row['Id']}> Sửa </button>";
        echo "<button type='button' class='btn btn-danger delete' id={$row['Id']}> Xóa </button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr> <td colspan=6 class='text-center'> Không tìm thấy dữ liệu phù hợp </td> </tr>";
}

mysqli_close($con);
?>