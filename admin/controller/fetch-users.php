<?php
include('../include/dbconnect.php');
$query = "SELECT * FROM users";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td scope='row'> {$row['Id']} </td>";
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
mysqli_close($con);
?>
