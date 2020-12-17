<?php
include('../include/dbconnect.php');
$query = "SELECT * FROM page_tbl WHERE PageType='contact'";
$result = mysqli_query($con, $query);
$contact_infor = array();
while ($row = mysqli_fetch_assoc($result)) {
	$tem_array = array(
		'pagedesc' => $row['PageDescription'],
		'address' => $row['Address'],
		'email' => $row['Email'],
		'phone' => $row['Phone']
	);
	array_push($contact_infor, $tem_array);
}
echo json_encode($contact_infor);
mysqli_close($con);
?>
