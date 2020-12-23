<?php
include_once('include/dbconnect.php');

if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    $query = "SELECT * FROM users WHERE Email='$email'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // Generate code
        $code = rand(100000,999999);
        // Prepare email
        $EmailTo = $email;
        $Subject = "Reset password";
        $Header = "From: hoanghuyle1709@gmail.com";
        // prepare email body text        
        $Body = "Ultraman đã nhận được yêu cầu đặt lại mật khẩu của bạn. \n";
        $Body .= "Nhập mã sau đây để đặt lại mật khẩu. \n";
        $Body .= $code . "\n";
       
        // send email    
        $success = mail($EmailTo, $Subject, $Body, $Header);
        if($success){
            $res = array(
                'status' => 'success',
                'code' => $code                
            );            
        } else {
            $res = array('status'=> 'fail');            
        }
        echo json_encode($res);
    } else {
        $res = array('status'=> 'not exist');
        echo json_encode($res);
    }
}

mysqli_close($con);
?>