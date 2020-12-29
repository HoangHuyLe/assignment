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
        alert("Email chưa hợp lệ!");
        return false;
    }

    if (!numberformat.test(number)) {
        alert("Số điện thoại chưa hợp lệ!");
        return false;
    }

    return true;
}