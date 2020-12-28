### Thông tin về project
- Tên: Assignment - Lập trình web
- Ngôn ngữ sử dụng: PHP
- Database: MySQL
- Thiết kế giao diện: HTML, CSS, JS
- Công nghệ sử dụng: AJAX, jQuery
- Phầm mềm hỗ trợ: XAMPP
---
### Danh sách các tính năng thiết kế:
Chú thích: (v) - đã hoàn thành
#### 1. Khách 
- Xem các thông tin public trên trang web -- (v)(huy)
- Đăng ký -- (v)(huy)
- Đăng nhập -- (v)(huy)
- Đăng nhập với Facebook, Google --(v)(huy)
- Reset mật khâu qua email  -- (v)(huy)
- Thực hiện kiểm tra dữ liệu đầu vào ở Clien side và Server side -- (v)(huy)
#### 2. Thành viên -- (đang làm)(Bảo)
- Thiết kế giao diện trang cá nhân
- Thay đổi thông tin cá nhân
- Thay đổi mật khẩu
- Thay đổi hình đại diện
- Viết bình luận, đăng tin
- Đặt yêu cầu gói dịch vụ
#### 3. Quản trị viên
- Thiết kế giao diện trang quản trị -- (v)(huy)
- Quản lý thành viên: xem, thêm, sửa, xóa, tìm kiếm -- (v)(huy)
- Tính năng quản lý (xem, thêm, sửa, xóa) các tài nguyên của ứng dụng web như thông tin liên hệ, sản phẩm, slider, ...: 
    - Slider ở trang chủ: xem, thêm, thay đổi slider bằng chọn ảnh đã từng uploaded hoặc tải ảnh từ máy, xóa slider -- (v) (huy)
    - Sản phẩm ở trang chủ: xem, thêm, sửa, xóa, tìm kiếm sản phẩm; thay đổi số lượng sản phẩm được hiển thị -- (v) (huy)
    - Xem và thay đổi thông tin ở trang liên hệ -- (v)(huy)
    - Quản lý thông tin liên hệ từ khách hàng: -- (v) (huy)
        - Hệ thống gửi mail xác nhận cho khách hàng
        - Admin nhận thông báo về yêu cầu khách hàng gửi
        - Admin xem bảng yêu cầu, xem chi tiết từng yêu cầu, cập nhật yêu cầu và xóa yêu cầu. 
    - Thay đổi mật khẩu (v)(huy)
- Hiện thực phân trang hiển thị cho các tính năng quản lý -- (v)(huy)
#### 4. Tìm kiếm
- Tính năng tìm kiếm sản phẩm đơn giản -- (v)(huy)
#### 5. Tính năng khác
---
### Hướng dẫn chạy Project
1. Download the zip file or clone this repo
2. Extract the file and copy **assignment** folder
3. Paste inside root directory (xampp/htdocs)
4. Open PHPMyAdmin (http://localhost/phpmyadmin)
5. Create a database with name **assignment**
6. Import **assignment.sql** file (in SQL folder)
7. Run the script http://localhost/assignment (frontend)
8. Access admin page with script http://localhost/admin

Tài khoản test:
- User: Username - hoanghuy , Pass - 123456
- Admin: Username - admin , Pass - admin
---
### Cấu trúc mã nguồn
```
assignment
|
└───admin
│   └───controller
│   │   │   check-availability.php
│   |   │   delete-contact.php
│   |   │   ...
│   └───css
│   │   │   add-user.css
│   |   │   jquery.dataTables.css
│   |   |   login.css
│   |   |   style.css
|   └───images
│   │   │   ajax-loader.gif
│   |   │   sort_asc_disabled.png
│   |   |   ...
|   └───include
│   │   │   dbconnect.php
│   |   │   header.php
│   |   |   sidebar.php
|   └───js
│   │   │   add-user.js
│   |   │   chang-password.js
│   |   |   ...
│   └───change-password.php
|   └───contact-details.php
|   └─── ...
└───controller
|   │   contactform-process.php
└───css
|   │   ...
└───fonts
|   │   ...
└───images
|   │   ...
└───include
|   │   dbconnect.php
|   │   footer.php
|   │   header.php
└───js
|   │   ...
└───lib
|   │   ...
└───SQL
|   │   assignment.sql
└───upload
│   └───products
│   └───slider
│   └───user-avatar
└───user
│   └───css
│   └───facebook_lib
│   └───google_lib
|   └───images
|   └───include
|   └───js
│   └───check_availability.php
|   └───facebook_login.php
|   └─── ...
└───about.php
└───contact.php
└───index.php
└───pricelist.php
└───Readme.md
└───search-result.php
└───services.php    
```
---
### Hướng dẫn config mail server để gửi nhận email
- https://www.youtube.com/watch?v=9W644cyDyNM
- https://www.youtube.com/watch?v=L5uCc8Hab-I
---
### Nguồn tham khảo đăng nhập bằng Facebook và Google
- https://www.webslesson.info/2019/10/how-to-implement-login-using-facebook-account-in-php.html
- https://www.webslesson.info/2019/09/how-to-make-login-with-google-account-using-php.html
- https://www.9lessons.info/2012/10/login-with-facebook-and-google.html (xử lý xung đột $_GET['code'] của FB và GG)