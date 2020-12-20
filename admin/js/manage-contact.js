$(document).ready(function() {

    load_contacts();

    function load_contacts() {
        $.ajax({
            url: "controller/fetch-contacts.php",
            method: "post",
            dataType: 'json',
            success: function(data) {
                $('#tbl-contacts').DataTable({
                    data: data,
                    columns: [
                        { data: 'ordernum' },
                        { data: 'name' },
                        { data: 'number' },
                        { data: 'subject' },
                        { data: 'postingdate' },
                        { data: 'isread' },
                        { data: 'action' }
                    ]
                });
            }
        })
    }


    // Delete contact
    $(document).on('click', '.delete', function() {
        let id_delete = $(this).attr('id');
        if (confirm("Bạn có chắc chắn muốn xóa?")) {
            $.ajax({
                url: 'controller/delete-contact.php',
                method: 'post',
                data: { 'id': id_delete },
                dataType: 'text',
                success: function(data) {
                    if (data == '1') {
                        let table = $('#tbl-contacts').DataTable();
                        table.destroy();
                        load_contacts();
                    } else {
                        alert('Xóa thất bại');
                    }

                }
            });
        }
    });
});