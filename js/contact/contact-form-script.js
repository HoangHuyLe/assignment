$("#contactForm").on("submit", function(event) {
    event.preventDefault();
    $("#msgSubmit").removeClass().addClass("hidden");
    if (validateForm()) {
        $.ajax({
            type: "POST",
            url: "controller/contactform-process.php",
            data: $("#contactForm").serialize(),
            beforeSend: function() {
                $("#submit").attr('disabled', 'disabled');
            },
            success: function(msg) {
                if (msg == "success") {
                    formSuccess();
                } else {
                    formError();
                    submitMSG(false, msg);
                }
                $("#submit").attr('disabled', false);
            }
        });
    }

});

// Validate input information
// - All fields: not empty
// - Email: <sth>@<sth>.<sth>
// - Number: string number length 10 character
function validateForm() {
    // Initiate Variables With Form Content
    let email = $("#email").val();
    let number = $("#number").val();
    let mailformat = /[a-zA-Z0-9]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+/;
    let numberformat = /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/;

    if (!mailformat.test(email)) {
        formError();
        submitMSG(false, "Email chưa hợp lệ");
        return false;
    }

    if (!numberformat.test(number)) {
        formError();
        submitMSG(false, "Số điện thoại chưa hợp lệ");
        return false;
    }

    return true;

}

function formSuccess() {
    $("#contactForm")[0].reset();
    submitMSG(true, "Gửi thành công! Vui lòng kiểm tra email của bạn!")
}

function formError() {
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
        $(this).removeClass();
    });
}

function submitMSG(valid, msg) {
    if (valid) {
        var msgClasses = "h5 mt-3 text-center tada animated text-success";
    } else {
        var msgClasses = "h5 mt-3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}