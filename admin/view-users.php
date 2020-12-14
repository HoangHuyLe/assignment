<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | View Users</title>
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
                    <li class="breadcrumb-item" aria-current="page">Quản lý thành viên</li>
                    <li class="breadcrumb-item active" aria-current="page">Xem thành viên</li>
                </ol>
            </nav>

            <h5 class="mb-4">Bảng thành viên hiện có:</h5>

            <form class="form-inline mb-3">
                <button id="search" class="btn btn-outline-success mr-sm-2" type="submit">Tìm kiếm</button>
                <input id="search-value" class="form-control w-50" type="search" placeholder="Tìm kiếm theo tài khoản, email và tên đầy đủ" aria-label="Search">
            </form>

            <table id="tbl-users" class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class='table-primary'>STT</th>
                        <th scope="col" class='table-primary'>Tài khoản</th>
                        <th scope="col" class='table-primary'>Email</th>
                        <th scope="col" class='table-primary'>Tên đầy đủ</th>
                        <th scope="col" class='table-primary'>Phân loại</th>
                        <th scope="col" class='table-primary'>Ảnh</th>
                        <th scope="col" class='table-primary'>Thao tác</th>
                    </tr>
                <tbody id="tbl-users-data"></tbody>
                </thead>

            </table>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="title">Chỉnh sửa dữ liệu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-data-form">
                        <input type="hidden" name='id-edit' id="id-edit" value="">
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Tài khoản</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name='username-edit' id="username-edit" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Email</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name='email-edit' id="email-edit" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Tên đầy đủ</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name='fullname-edit' id="fullname-edit" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Phân loại</label>
                            <div class="col-9 d-flex align-items-center radio">
                                <input type="radio" class='mr-1' id="normal" name="type" value="normal" checked> <span class="mr-4">Normal </span>
                                <input type="radio" class="mr-1" id="vip" name="type" value="VIP"> VIP
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Ảnh</label>
                            <div class="col-9">
                                <img src="../users/images/user-avatar/hoanghuy4_avatar.jpg" width='100px' hight='100px' name='image-edit' id="image-edit" alt="avatar">
                            </div>
                        </div>
                    </form>
                    <div id="respone-msg-edit"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="save-changes" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="title1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="title1">Xóa dữ liệu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-dark">Bạn có chắc chắn muốn xóa dữ liệu?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="confirm" class="btn btn-danger">Xác nhận</button>
                    <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
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
    <script src="js/view-users.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
            $('a#manage-users').addClass('selected');
            $('a#manage-users').attr('aria-expanded', 'true');
            $('#menu-users').addClass('show');
            $('a#view-users').addClass('selected-1');

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