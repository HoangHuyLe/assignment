$(document).ready(function() {
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const password2 = document.getElementById('password2');

    $("#add-form").submit(function(event) {
        event.preventDefault();
        // Front-end validation
        if (!checkInputs()) {
            return false;
        } else {
            let usernameValue = username.value.trim();
            let emailValue = email.value.trim();
            $.ajax({
                url: 'controller/check-availability.php',
                method: 'post',
                data: { 'username': usernameValue, 'email': emailValue },
                dataType: 'json',
                success: function(data) {
                    if (data[0] == "0") {
                        setErrorFor(username, 'Tên tài khoản đã tồn tại');
                    } else {
                        setSuccessFor(username);
                    }
                    if (data[1] == "0") {
                        setErrorFor(email, 'Email đã tồn tại');
                    } else {
                        setSuccessFor(email);
                    }
                    // If username and email are not exist
                    if (data[0] != '0' && data[1] != '0') {
                        data = new FormData(document.getElementById("add-form"));
                        console.log(data);
                        $.ajax({
                            url: 'controller/insert-user.php',
                            method: 'post',
                            data: data,
                            contentType: false,
                            processData: false,
                            dataType: 'html',
                            beforeSend: function() {
                                $("#add").attr('disabled', 'disabled');
                            },
                            success: function(data) {
                                $("#respone-status").html(data);
                                $("#add").attr('disabled', false);
                                // $("#add-form")[0].reset();
                                resetAllInput();
                            }
                        });
                    }
                }
            });
        }
    });

    function checkInputs() {
        // trim to remove the whitespaces
        let usernameValue = username.value.trim();
        let emailValue = email.value.trim();
        let passwordValue = password.value.trim();
        let password2Value = password2.value.trim();
        let mailformat = /[a-zA-Z0-9]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+/;
        let extension = $('#image').val().split('.').pop().toLowerCase();
        let isValid = true;

        if (usernameValue.length < 6 || usernameValue.length > 50) {
            setErrorFor(username, 'Tên tài khoản là chuỗi từ 6-50 kí tự');
            isValid = false;
        } else {
            setSuccessFor(username);
        }

        if (emailValue === '') {
            setErrorFor(email, 'Email không thể trống');
            isValid = false;
        } else if (!mailformat.test(emailValue)) {
            setErrorFor(email, 'Email hợp lệ theo định dạng <sth>@<sth>.<sth>');
            isValid = false;
        } else {
            setSuccessFor(email);
        }

        if (passwordValue.length < 6 || passwordValue.length > 50) {
            setErrorFor(password, 'Mật khẩu là chuỗi từ 6-50 kí tự');
            isValid = false;
        } else {
            setSuccessFor(password);
        }

        if (password2Value === '') {
            setErrorFor(password2, 'Mật khẩu không khớp');
            isValid = false;
        } else if (passwordValue !== password2Value) {
            setErrorFor(password2, 'Mật khẩu không khớp');
            isValid = false;
        } else {
            setSuccessFor(password2);
        }

        if (extension != '') {
            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                $("#image-status").css('visibility', 'visible');
                isValid = false;
            } else {
                $("#image-status").css('visibility', 'hidden');
            }
        }

        return isValid;
    }

    function setErrorFor(input, message) {
        let formControl = input.parentElement;
        let small = formControl.querySelector('small');
        formControl.className = 'form-control-custom error';
        small.innerText = message;
    }

    function setSuccessFor(input) {
        let formControl = input.parentElement;
        formControl.className = 'form-control-custom success';
    }

    function resetAllInput() {
        username.parentElement.className = 'form-control-custom';
        email.parentElement.className = 'form-control-custom';
        password.parentElement.className = 'form-control-custom';
        password2.parentElement.className = 'form-control-custom';
    }
});