$(document).ready(function() {

    load_page_contact();

    function load_page_contact() {
        $.ajax({
            url: 'controller/fetch-contact-infor.php',
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $("#pagedesc").val(data[0]['pagedesc']);
                $("#address").val(data[0]['address']);
                $("#email1").val(data[0]['email']);
                $("#email2").val(data[1]['email']);
                $("#phone1").val(data[0]['phone']);
                $("#phone2").val(data[1]['phone']);
            }
        })
    }

    $("#contact-form").on("submit", function(event) {
        event.preventDefault();
        $("#status").html("");
        if (!validateEmail()) {
            alert("Email không hợp lệ")
        } else {
            $.ajax({
                url: "controller/update-contact-infor.php",
                method: "post",
                data: $(this).serialize(),
                success: function(data) {
                    $("#status").html(data);
                }
            })
        }
    })

    function validateEmail() {
        let mailformat = /[a-zA-Z0-9]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+/;
        let emailValue1 = $("#email1").val();
        let emailValue2 = $("#email2").val();
        let isValid = true;
        if (!mailformat.test(emailValue1)) {
            isValid = false;
        }
        if (emailValue2 != "") {
            if (!mailformat.test(emailValue2)) {
                isValid = false;
            }
        }
        return isValid;
    }
});