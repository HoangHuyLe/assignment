<header class="top-header">
    <nav class="navbar header-nav navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html"><img src="images/ultraman_logo.png" alt="image"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                <ul class="navbar-nav">
                    <li><a class="nav-link" href="index.php" id="home">Trang chủ</a></li>
                    <li><a class="nav-link" href="about.php" id="about">Giới thiệu</a></li>
                    <li><a class="nav-link" href="services.php" id="services">Dịch vụ</a></li>
                    <li><a class="nav-link" href="pricelist.php" id="pricelist">Bảng giá</a></li>
                    <li><a class="nav-link" href="contact.php" id="contact">Liên hệ</a></li>
                    <?php
                    if (isset($_SESSION['logged']) and $_SESSION['logged'] == true) {
                        echo "
                                <div class='dropdown'>
                                    <button class='btn dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>"
                            . '<i class="fa fa-user-circle mr-2" aria-hidden="true"></i>'
                            . $_SESSION['username']
                            . "</button>
                                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                        <a class='dropdown-item' href='edit_information.php'>Trang cá nhân</a>
                                        <a class='dropdown-item' href='users/logout.php'>Đăng xuất</a>                                        
                                    </div>
                                </div>                                
                                ";
                    } else {
                        echo "
                                <li><a class='nav-link' style='background:#f2184f;color:#fff;' href='users/login.php'>Đăng nhập</a>
                                </li>
                                ";
                    }
                    ?>

                </ul>
            </div>
            <div class="search-box">
                <input type="text" class="search-txt" placeholder="Search">
                <a class="search-btn">
                    <img src="images/search_icon.png" alt="#" />
                </a>
            </div>
        </div>
    </nav>
</header>