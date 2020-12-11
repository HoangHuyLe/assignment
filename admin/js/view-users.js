$(document).ready(function() {

    /* ---------------------
    // 1) Fetch users table data
    ------------------------*/
    fetch_users();

    function fetch_users() {
        $.ajax({
            url: 'controller/fetch-users.php',
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $("#tbl-users-data").html(data);
            }
        });
    }


    /* ---------------------
    // 2) Edit record
    ------------------------*/
    // Show edit modal and display data in edit form 
    $(document).on('click', '.edit', function() {
        let id_edit = $(this).attr('id');
        $.ajax({
            url: 'controller/fetch-user.php',
            method: 'get',
            data: 'id=' + id_edit,
            dataType: 'json',
            success: function(data) {
                $('#id-edit').val(data['id']);
                $('#username-edit').val(data['username']);
                $('#email-edit').val(data['email']);
                $('#fullname-edit').val(data['fullname']);
                if (data['type'] == 'VIP') {
                    $("#vip").attr('checked', true)
                }
                $('#edit-modal').modal('toggle');
            }
        })
    });

    // Send ajax request to server
    $("#save-changes").on('click', function() {
        let id_edit = $("#id-edit").val();
        let radioValue = $("input[name='type']:checked").val();
        $.ajax({
            url: 'controller/update-user.php',
            method: 'get',
            data: { 'id': id_edit, 'type': radioValue },
            dataType: 'text',
            beforeSend: function() {
                $("#save-changes").attr('disabled', 'disabled');
            },
            success: function(data) {
                if (data == "ok") {
                    fetch_users();
                    let html = "<p style='color: green;'> Lưu thành công. </p>";
                    $("#respone-msg-edit").html(html);
                } else {
                    let html = "<p style='color: red;'>" + data + "</p>";
                    $("#respone-msg-edit").html(html);
                }
                $("#save-changes").attr('disabled', false);
            }
        });

    })


    /* ---------------------
    // 3) Delete record
    ------------------------*/
    $(document).on('click', '.delete', function() {
        let id_delete = $(this).attr('id');
        $('#delete-modal').modal('toggle');
        $('#confirm').on('click', function() {
            $.ajax({
                url: 'controller/delete-user.php',
                method: 'get',
                data: { 'id': id_delete },
                dataType: 'text',
                beforeSend: function() {
                    $("#confirm").attr('disabled', 'disabled');
                    $("#cancel").attr('disabled', 'disabled');
                },
                success: function(data) {
                    if (data == 'ok') {
                        fetch_users();
                        alert("Xóa thành công");
                    } else {
                        alert(data);
                    }
                    $("#confirm").attr('disabled', false);
                    $("#cancel").attr('disabled', false);
                    $('#delete-modal').modal('toggle');
                }
            });
        });
    });

});