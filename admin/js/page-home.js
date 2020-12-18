// function loadFile(event) {
//     var image = document.getElementById('output');
//     image.src = URL.createObjectURL(event.target.files[0]);
// };

$(document).ready(function() {

    // ------------------------------
    // 1) Script for page-home.php
    // ------------------------------    


    load_page_home_data();

    function load_page_home_data() {
        load_slider(1);
        load_products();
    }

    function load_slider(slider_number) {
        $.ajax({
            url: 'controller/load-slider.php',
            method: 'post',
            data: "slider_number=" + slider_number,
            dataType: 'json',
            success: function(data) {
                if (data['id'] != '-1') {
                    $('#slider-id').val(data['id']);
                    let src1 = "../upload/slider/" + data['image'];
                    $('#slider-img').attr("src", src1);
                    $('#slider-img').css('display', 'block');
                    $('#notfound-slider').css('display', 'none');
                } else {
                    $('#slider-id').val(data['id']);
                    let text = "Slider chưa được thiết lập";
                    $('#slider-img').css('display', 'none');
                    $('#notfound-slider').css('display', 'block');
                }
            }
        })
    }

    function load_products() {
        $.ajax({
            url: "controller/fetch-products.php",
            method: "post",
            dataType: 'json',
            success: function(data) {
                $('#tbl-products').DataTable({
                    data: data,
                    columns: [
                        { data: 'ordernum' },
                        { data: 'title' },
                        { data: 'image' },
                        { data: 'link' },
                        { data: 'completedate' },
                        { data: 'action' }
                    ]
                });
            }
        })
    }

    // Load slider when choose slider number on select option
    $('#slider-number').on('change', function() {
        load_slider(this.value);
    });

    // *****************************
    // 1) Choose image modal event
    $("#choose-slider").on("click", function() {
        $.ajax({
            url: 'controller/load-uploaded-slider.php',
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('#save-status').html("");
                $("#uploaded-images").html(data);
                $('#choose-image-modal').modal('toggle');
            }
        })
    })

    // Click Image event
    $("#uploaded-images").on("click", "img", function() {
        $("#uploaded-images img").removeClass("select");
        $(this).addClass("select");
    })

    // Save image event
    $("#save").click(function() {
        let img_select_id = $("#uploaded-images img.select").attr('id');
        let old_slider_id = $('#slider-id').val();
        let slider_number = $('#slider-number').val();
        $.ajax({
            url: 'controller/update-slider.php',
            data: {
                'img_select_id': img_select_id,
                'old_slider_id': old_slider_id,
                'slider_number': slider_number,
            },
            method: 'post',
            success: function(data) {
                $('#save-status').html(data);
                load_slider(slider_number);
            }

        })
    })


    // *****************************
    // 2) Show Upload Images
    $("#upload-image").on("click", function() {
        $("#FileUpload").click();
        $("#FileUpload").change(function(event) {
            let image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
            $('#upload-image-modal').modal('toggle');
        })
    });

    // Confirm upload image
    $("#confirm").click(function() {
        let old_slider_id = $('#slider-id').val();
        let slider_number = $('#slider-number').val();
        if (!validateImage('#FileUpload')) {
            alert("File tải lên không hợp lệ");
        } else {
            var fd = new FormData();
            var files = $('#FileUpload')[0].files[0];
            fd.append('file', files);
            fd.append('old_slider_id', old_slider_id);
            fd.append('slider_number', slider_number);
            $.ajax({
                url: 'controller/update-slider.php',
                data: fd,
                contentType: false,
                processData: false,
                method: 'post',
                success: function(data) {
                    alert(data);
                    load_slider(slider_number);
                }
            })
        }

    })

    // Validate image
    function validateImage(input_id) {
        let ext = $(input_id).val().split('.').pop().toLowerCase();
        let valid_extensions = ['gif', 'png', 'jpg', 'jpeg'];
        let isValid = true;
        if (ext != "") {
            if ($.inArray(ext, valid_extensions) == -1) {
                isValid = false;
            }
        }
        return isValid;
    }

    // *****************************
    // 3) Delete slider
    $("#delete-slider").click(function() {
        $('#delete-slider-modal').modal('toggle');
    })

    $("#confirm-delete").click(function() {
        let old_slider_id = $('#slider-id').val();
        let slider_number = $('#slider-number').val();
        $.ajax({
            url: 'controller/update-slider.php',
            data: "old_slider_id=" + old_slider_id,
            dataType: "text",
            method: "post",
            success: function(data) {
                alert(data);
                $.ajax({
                    url: "controller/fetch-products.php",
                    method: "post",
                    dataType: 'json',
                    success: function(data) {
                        $('#tbl-products').ajax.reload({
                            data: data
                        });
                    }
                })
            }
        })
    })

    // *****************************
    // 4) Add product
    // Show modal
    $("#add-product").click(function() {
        $("#add-product-modal").modal('show');
        $("#add-product-image").css('display', 'none');
    })

    // Show uploaded product image
    $("#add-product-image-upload").change(function(event) {
        let image = document.getElementById('add-product-image');
        image.src = URL.createObjectURL(event.target.files[0]);
        image.style.display = 'block';
    })

    // Insert product to database
    $("#add-product-button").click(function() {
        let title = $("#add-title").val();
        let link = $("#add-link").val();
        let completedate = $("#add-completedate").val();
        let image = $("#add-product-image-upload").val();
        if (title == "" || link == "" || completedate == "" || image == "") {
            alert("Vui lòng nhập đủ thông tin")
        } else {
            if (!validateImage("#add-product-image-upload")) {
                alert("File ảnh không hợp lệ")
            } else {
                data = new FormData(document.getElementById("add-product-form"));
                $.ajax({
                    url: 'controller/insert-product.php',
                    method: 'post',
                    data: data,
                    contentType: false,
                    processData: false,
                    dataType: 'text',
                    beforeSend: function() {
                        $("#add-product-button").attr('disabled', 'disabled');
                    },
                    success: function(data) {
                        alert(data);
                        $("#add-product-button").attr('disabled', false);
                        $("#add-product-form")[0].reset();
                        $(".custom-file-label").html("");
                        let table = $('#tbl-products').DataTable();
                        table.destroy();
                        load_products();
                    }
                });
            }
        }
    })

});