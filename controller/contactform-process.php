<?php
include("../include/dbconnect.php");

$name = $_POST["name"];
$email = $_POST["email"];
$number = $_POST["number"];
$msg_subject = $_POST["msg_subject"];
$message = $_POST["message"];
$error = false;

// name, msg_subject, message
if (empty($name) || empty($msg_subject) || empty($message)) {
    $error = true;
}

// email
$emailformat = "/[a-zA-Z0-9]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+/";
if (empty($email) || !preg_match($emailformat, $email)) {
    $error = true;
}

// phone number
$numberformat = "/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/";
if (empty($number) || !preg_match($numberformat, $number)) {
    $error = true;
}

if ($error) {
    echo "Gửi thât bại. Vui lòng thử lại.";
} else {
    // 1- Send email
    $EmailTo = $email;
    $Subject = "Ultraman Company xác nhận nhận thành công";
    $Header = "From: hoanghuyle1709112312@gmail.com";
    // prepare email body text
    $Body = "Chào bạn " . $name . "!" . "\n";
    $Body .= "Bạn đã gửi cho Ultraman nhưng thông tin. \n";
    $Body .= "Tên: " . $name . "\n";
    $Body .= "Email: " . $email . "\n";
    $Body .= "SĐT: " . $number . "\n";
    $Body .= "Chủ đề: " . $msg_subject . "\n";
    $Body .= "Tin nhắn: " . $message . "\n";
    $Body .= "Chúng tôi sẽ liên lạc lại trong vòng 24h. \n";
    $Body .= "Thân ái!";
    // send email    
    $success = mail($EmailTo, $Subject, $Body, $Header);

    if ($success) {
        // 2- Insert contact infor to database 
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDateTime = date('Y-m-d H:i:s');   
        $query = "
        INSERT INTO contacts(Name, Email, Number, Subject, Message, PostingDate, IsRead) 
        VALUES('$name', '$email', '$number', '$msg_subject', '$message','$currentDateTime', 0)";
        $result = mysqli_query($con, $query) or die ("Error: " .mysqli_error($con));
        echo "success";        
    } else {
        echo "Đã xảy ra lỗi. Vui lòng thử lại.";
    }
}

mysqli_close($con);
?>