// Thông tin validate
// - username: chuối từ 6-50 kí tự
// - email: theo định dạng <sth>@<sth>.<sth>
// - password: chuối từ 6-50 kí tự
// - repassword: trùng với chuỗi password
function validateUsername() {
    let username = $("#username").val();
    if (username.length < 6 || username.length > 50) {
        let message = "<span style='color: red;'> * Tên tài khoản là chuỗi từ 6-50 kí tự! </span>";
        $("#username-status").html(message);
        $('#submit').prop('disabled', true);
        return false;
    }
    // Check whether username already taken
    $.ajax({
        url: "check_availability.php",
        data: 'username=' + $("#username").val(),
        type: "POST",
        success: function(data) {
            $("#username-status").html(data);
        },
        error: function() {}
    });
}

function validateEmail() {
    let email = $("#email").val();
    let mailformat = /[a-zA-Z0-9]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+/;
    if (!mailformat.test(email)) {
        let message = "<span style='color: red;'> * Email hợp lệ theo định dạng (sth)@(sth).(sth)! </span>";
        $("#email-status").html(message);
        $('#submit').prop('disabled', true);
        return false;
    }
    // Check whether email already taken
    $.ajax({
        url: "check_availability.php",
        data: 'email=' + $("#email").val(),
        type: "POST",
        success: function(data) {
            $("#email-status").html(data);
        },
        error: function() {}
    });
}

function validatePassword() {
    let password = $("#password").val();
    if (password.length < 6 || password.length > 50) {
        let message = "<span style='color: red;'> * Mật khẩu là chuỗi từ 6-50 kí tự! </span>";
        $("#password-status").html(message);
        $('#submit').prop('disabled', true);
        return false;
    } else {
        let message = "<span style='color: green;'> Mật khẩu hợp lệ! </span>";
        $("#password-status").html(message);
        $('#submit').prop('disabled', false);
    }
    return true;
}

function validateRepassword() {
    let password = $("#password").val();
    if (password != "") {
        let repassword = $("#repassword").val();
        if (repassword != password) {
            let message = "<span style='color: red;'> * Mật khẩu không khớp! </span>";
            $("#repassword-status").html(message);
            $('#submit').prop('disabled', true);
            return false;
        } else {
            let message = "<span style='color: green;'> Mật khẩu đã khớp! </span>";
            $("#repassword-status").html(message);
            $('#submit').prop('disabled', false);
        }
        return true;
    }
    return true;
}