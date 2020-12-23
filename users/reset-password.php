<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../lib/bootstrap/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">  

                <!-- Search card -->
                <div class="card mt-5" id="search-card">
                    <div class="card-header font-weight-bold">
                        Tìm tài khoản của bạn
                    </div>
                    <div class="card-body">
                        <p class="card-text">Vui lòng nhập email để tìm kiếm tài khoản của bạn.</p>
                        <form id="search-form">
                            <input type='text' id='email' class='form-control' placeholder="Email" required>                            
                            <div class="mt-3">
                                <input type='submit' class='btn btn-primary' id='search' value='Tìm kiếm'>
                                <button class="btn btn-secondary"> <a href="login.php">Hủy</a> </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Confirm code -->
                <input type='hidden' id="confirm-code">

                <!-- Reset card -->
                <div class="card mt-5" id="reset-card">
                    <div class="card-header font-weight-bold">
                        Đặt lại mật khẩu của bạn
                    </div>
                    <div class="card-body">
                        <p class="card-text">Vui lòng nhập mã và mật khẩu mới.</p>
                        <form id="reset-form">
                            <input type='text' id='code' class='form-control' placeholder="Mã" required> 
                            <input type='password' id='password' class='form-control mt-2' placeholder="Mật khẩu" required>                            
                            <div class="mt-3">
                                <input type='submit' class='btn btn-primary' id='reset' value='Xác nhận'>
                                <button class="btn btn-secondary"> <a href="login.php">Hủy</a> </button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    <!-- loading indicator -->
    <div id="wait">
        <img src='images/ajax-loader.gif' alt="loader">
    </div>

    <!-- ALL JS FILES -->
    <script src="../lib/bootstrap/jquery.min.js"></script>
    <script src="../lib/bootstrap/popper.min.js"></script>
    <script src="../lib/bootstrap/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#reset-card").css('display', 'none');

            $('#search-form').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "send_email_reset.php",
                    data: 'email=' + $("#email").val(),
                    method: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        $('#search').prop('disabled', true);
                    },
                    success: function(data) {                                               
                        if (data.status == 'not exist') {
                            alert("Email không tồn tại!")                        
                        } else {
                            if(data.status == "success"){
                                alert("Chúng tôi đã gửi mã qua email của bạn. Vui lòng kiểm tra và điền thông tin mới vào form dưới.")
                                $("#search-card").css('display', 'none');
                                $("#reset-card").css('display', 'block');
                                $("#confirm-code").val(data.code)                              
                            } else {
                                alert("Gửi mail gặp vấn đề. Vui lòng thử lại sau.")
                            }
                        }
                        $('#search').prop('disabled', false);
                    },
                });
            })
            
            $('#reset-form').on('submit', function(event) {
                event.preventDefault();
                if(validateCodePass()){
                    $.ajax({
                    url: "update_password.php",
                    data: {'password': $("#password").val(), 'email' : $("#email").val()},
                    method: "POST",
                    dataType: 'text',
                    beforeSend: function() {
                        $('#reset').prop('disabled', true);
                    },
                    success: function(data) {                                               
                        if(data = '1'){
                            alert("Thay đổi thành công. Vui lòng đăng nhập lại.")
                            window.location.replace("http://localhost/assignment/users/login.php");
                        } else {
                            alert("Có vấn đề xảy ra. Vui lòng thử lại.")
                        }
                        $('#reset').prop('disabled', false);
                    },
                });
                }
            })

            function validateCodePass(){
                let confirm_code = $("#confirm-code").val();
                let code = $("#code").val();
                let password = $("#password").val();                
                if(code != confirm_code){
                    alert("Mã không đúng! Vui lòng nhập lại!");
                    return false;                    
                }

                // - password: chuối từ 6-50 kí tự
                if(password.length < 6 || password.length > 50){
                    alert("Mật khẩu không hợp lệ");
                    return false;
                }

                return true;
            }



            /* ..............................................
            Ajax indicator
            ................................................. */
            $(document).ajaxStart(function() {
                $("#wait").css("display", "block");
            });
            $(document).ajaxComplete(function() {
                $("#wait").css("display", "none");
            });
        })
    </script>
</body>

</html>