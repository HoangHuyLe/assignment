<?php
include('../include/dbconnect.php');
$query = "SELECT * FROM contacts";
$result = mysqli_query($con, $query);
$order_num = 1;
$contacts_array = array();

while ($row = mysqli_fetch_assoc($result)) {   
    $a_href = "<a href='contact-details.php?cid={$row['Id']}'> " ."Xem chi tiết" ."</a>"  ;
    $action = "<button type='button' class='btn btn-warning' id={$row['Id']}> $a_href </button>" 
            . "<button type='button' class='btn btn-danger ml-1 delete' id={$row['Id']}> Xóa </button>";
    $temp = explode('-',$row['PostingDate']);
    $temp1 = explode(' ',$temp[2]);
    $new_date = $temp1[0] .'-' . $temp[1] .'-' .$temp[0];
    $isread = ($row['IsRead'] == 0) ? 'Chưa' : 'Rồi';
    $iscontact = ($row['IsContact'] == 0) ? 'Chưa' : 'Rồi';
    $contact = array(
        "ordernum" => $order_num++,
        "name" => $row['Name'],
        "email" => $row['Email'],
        'number' => $row['Number'],
        'subject' => $row['Subject'],
        'postingdate' => $new_date,
        'isread' => $isread,
        'iscontact' => $iscontact,
        'action' => $action
    );
    array_push($contacts_array, $contact);
}

echo json_encode($contacts_array);

mysqli_close($con);
?>
