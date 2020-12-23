<?php
session_start();
if (!isset($_SESSION['adminid'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Web Page Home</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../lib/bootstrap/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
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
                <h5 class="card-header bg-info text-white"> Thay đổi slider ở Banner</h5>
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

            <div class="card mt-4">
                <h5 class="card-header bg-info text-white"> Quản lý sản phẩm </h5>
                <div class="card-body">
                    <div class="row ml-0 mb-2">
                        <div class="col-9 pl-0">
                            <label>Số sản phẩm được show trên trang chủ: </label>
                            <input type='text' id="num-product" style="width: 50px; text-align: right;">
                            <input type="button" id="update-num-product" class="btn btn-info" value="Gửi">
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                            <button id="add-product" class="btn btn-info">Thêm sản phẩm</button>
                        </div>

                    </div>

                    <table id="tbl-products" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th scope="col" class='table-success'>STT</th>
                                <th scope="col" class='table-success'>Tiêu đề</th>
                                <th scope="col" class='table-success'>Ảnh</th>
                                <th scope="col" class='table-success'>Link</th>
                                <th scope="col" class='table-success' width="15%">Hoàn thành</th>
                                <th scope="col" class='table-success' width="15%">Thao tác</th>
                            </tr>                        
                        </thead>

                    </table>
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

    <!-- Add Product Modal -->
    <div class="modal fade" id="add-product-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">Thêm sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-product-form">
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Tiêu đề</label>
                            <div class="col-9">
                                <textarea class="form-control" rows='2' name="title" id="add-title"> </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Ảnh</label>
                            <div class="col-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="add-product-image-upload" name="product-image">
                                    <label class="custom-file-label">Chọn ảnh</label>
                                </div>
                                <div class="mt-3 d-flex justify-content-center">
                                    <img id="add-product-image" class="img-fluid" alt="image" style="max-height : 200px">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Link</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="link" id="add-link">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Hoàn thành</label>
                            <div class="col-9">
                                <input type="date" class="form-control" name="completedate" id='add-completedate'>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="add-product-button" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

     <!-- Edit Product Modal -->
     <div class="modal fade" id="edit-product-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">Chỉnh sửa sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-product-form">
                        <input type="hidden" name='id' id="id-edit">
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Tiêu đề</label>
                            <div class="col-9">
                                <textarea class="form-control" rows='2' name="title" id="edit-title"> </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Ảnh</label>
                            <div class="col-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="edit-product-image-upload" name="product-image">
                                    <label class="custom-file-label">Chọn ảnh</label>
                                </div>
                                <div class="mt-3 d-flex justify-content-center">
                                    <img id="edit-product-image" class="img-fluid" alt="image" style="max-height : 200px">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Link</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="link" id="edit-link">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Hoàn thành</label>
                            <div class="col-9">
                                <input type="date" class="form-control" name="completedate" id='edit-completedate'>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="save-changes" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Slider Modal -->
    <div class="modal fade" id="delete-product-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">Xóa sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa sản phẩm này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="confirm-delete-product" class="btn btn-primary">Xác nhận</button>
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
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/page-home.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('a#manage-pages').addClass('selected');
            $('a#manage-pages').attr('aria-expanded', 'true');
            $('#menu-pages').addClass('show');
            $('a#page-home').addClass('selected-1');
        });

        // The name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").html(fileName);
        });
    </script>

</body>

</html>