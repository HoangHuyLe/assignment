<?php
    function validate ($email, $phone) {

        if(!preg_match('/[a-zA-Z0-9]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+/', $email)) {
            alert("Server: Email chưa hợp lệ.");
            return false;
        }

        if(!preg_match('/(03|05|07|08|09|01[2|6|8|9])+([0-9]{7})\b/', $phone)) {
            alert("Server: Số điện thoại chưa hợp lệ.");
            return false;
        }
        
        return true;
    }

    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
?>