<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Web Pages</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../lib/bootstrap/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once('include/header.php') ?>

    <div class="wrapper">
        <!-- Side bar -->
        <?php include_once('include/sidebar.php') ?>
        <!-- Page Content  -->
        <div id="content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Web pages</li>
                    <li class="breadcrumb-item active" aria-current="page">Trang chủ</li>
                </ol>
            </nav>

            <div class="card">
                <h5 class="card-header"> Thay đổi slider ở Banner</h5>
                <div class="card-body">
                    <div class="row d-flex align-items-center ml-0">
                        <select class="custom-select mr-2" style="width: 20%" id="slider-number">
                            <option value="1" selected>Slider 1</option>
                            <option value="2">Slider 2</option>
                            <option value="3">Slider 3</option>
                            <option value="4">Slider 4</option>
                            <option value="5">Slider 5</option>
                        </select>
                        <button class="btn btn-success mr-2" id="choose-slider"><i class="fa fa-picture-o mr-1"></i>Chọn ảnh</button>
                        <button class="btn btn-success mr-2" id="upload-image"><i class="fa fa-upload mr-1"></i>Tải ảnh lên</button>
                        <button class="btn btn-success" id="delete-slider"><i class="fa fa-trash-o mr-1"></i>Xóa slider</button>
                        <div style="visibility: hidden">
                            <form id="FileUpload-Form">
                                <input type="file" name="FileUpload" id="FileUpload" accept="image/png, image/jpeg, image/jpg, image/gif" />
                            </form>
                        </div>
                    </div>
                    <div class="row ml-0 mt-3 ">
                        <input type="hidden" id="slider-id">
                        <img src="" id="slider-img" class="img-fluid rounded w-75 mx-auto" alt="slider">
                        <span id="notfound-slider" style="display: none;">Slider chưa được thiết lập</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Choose Image Modal -->
    <div class="modal fade" id="choose-image-modal" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="title">Ảnh đã tải lên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="uploaded-images"></div>
                    <div class="mt-1" id="save-status"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="save" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Image Modal -->
    <div class="modal fade" id="upload-image-modal" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="title">Bạn có xác nhận lưu ảnh này?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="output" class="img-fluid" alt="image">
                </div>
                <div class="modal-footer">
                    <button type="button" id="confirm" class="btn btn-primary">Xác nhận</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Slider Modal -->
    <div class="modal fade" id="delete-slider-modal" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="title">Xóa slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa slider này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="confirm-delete" class="btn btn-primary">Xác nhận</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
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
    <script src="js/manage-pages.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
            $('a#manage-pages').addClass('selected');
            $('a#manage-pages').attr('aria-expanded', 'true');
            $('#menu-pages').addClass('show');
            $('a#page-home').addClass('selected-1');

            $(document).ajaxStart(function() {
                $("#wait").css("display", "block");
            });
            $(document).ajaxComplete(function() {
                $("#wait").css("display", "none");
            });

        });
    </script>

</body>

</html>