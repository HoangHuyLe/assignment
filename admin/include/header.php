<?php
include_once('dbconnect.php');

$query = "SELECT * FROM contacts WHERE IsRead = 0";
$result = mysqli_query($con, $query);
$num = 0;
$num = mysqli_num_rows($result);

?>

<div id="header" class="container-fluid d-flex align-items-center">
    <button type="button" id="sidebarCollapse" class="btn btn-info">
        <i class="fa fa-bars"></i>
    </button>
    <img src="../images/ultraman_logo.png" width="128" height="50" alt="logo">
    <div class="w-100 d-flex justify-content-end">

        <div class='dropdown mr-2'>
            <button class='btn btn-info' type='button' id='notification' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <i class="fa fa-bell" ></i>
                <span class="badge badge-danger" style="left: -3px; top: -7px;"><?php echo $num ?></span>                
            </button>
            <div class='dropdown-menu' aria-labelledby='notification'>
                <?php 
                    if ($num == 0){
                        echo "<p class='dropdown-item'> Chưa có thông báo mới </p>";
                    } else {
                        $count = 1;
                        while( $row = mysqli_fetch_assoc($result)){
                            $name = "<span class='text-primary'> $row[Name]</span>";
                            $postingdate = "<span class='text-primary'> $row[PostingDate]</span>";
                            if ($count++ == 1) 
                                echo "<a class='dropdown-item' href='contact-details.php?cid={$row['Id']}'>Bạn có yêu cầu liên lạc từ $name vào thời gian $postingdate </a>";
                            else{
                                echo "<div class='dropdown-divider'></div>";
                                echo "<a class='dropdown-item' href='contact-details.php?cid={$row['Id']}'>Bạn có yêu cầu liên lạc từ $name vào thời gian $postingdate </a>";
                            }
                        }
                    }
                ?>                                
            </div>
        </div>

        <div class='dropdown'>
            <button class='btn btn-info dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <i class="fa fa-user-circle mr-1" aria-hidden="true"></i>
                <span style="margin-right: 25px;"><?php echo $_SESSION['adminname'] ?></span>
            </button>
            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                <a class='dropdown-item' href='logout.php'>Đăng xuất</a>
            </div>
        </div>
    </div>
</div>

<?php
mysqli_close($con);
?>