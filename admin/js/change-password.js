$(document).ready(function() {
    $("#change-password-form").on('submit', function(event) {
        event.preventDefault();
        let id = $("#userid").val();
        let oldpassword = $("#old-password").val();
        let newpassword = $("#new-password").val();
        let password2 = $("#password2").val();

        if (validatePassword()) {
            $.ajax({
                url: 'controller/update-password.php',
                data: { 'id': id, 'oldpassword': oldpassword, 'newpassword': newpassword, 'password2': password2 },
                method: "post",
                dataType: 'text',
                success: function(data) {
                    alert(data);
                }
            })
        }

    })

    function validatePassword() {
        // - password: chuối từ 6-50 kí tự
        // - confirm password: trùng với chuỗi password
        let oldpassword = $("#old-password").val();
        let password = $("#new-password").val();
        let password2 = $("#password2").val();
        let isValid = true;

        if (oldpassword.length < 6 || oldpassword.length > 50) {
            $('#status0').html("* Mật khẩu không hợp lệ");
            isValid = false;
        } else {
            $('#status0').html("");
            isValid = true;
        }

        if (password.length < 6 || password.length > 50) {
            $('#status1').html("* Mật khẩu không hợp lệ");
            isValid = false;
        } else {
            $('#status1').html("");
            isValid = true;
        }

        if (password2 != password) {
            $('#status2').html("* Mật khẩu không khớp");
            isValid = false;
        } else {
            $('#status2').html("");
            isValid = true;
        }

        return isValid;
    }

})