<?php
    $dx = "index.php?act=xoass";
    
    // session_start();
    // echo $_SESSION["user"];
    if(!isset($_SESSION["user"])) 
    echo '<script>window.location.href = "./index.php?act=login";</script>';
    // echo '<meta http-equiv="refresh" content="0; url=index.php?act=login">';
    // header("location: index.php?act=login");
    
?>


<div class="row mb" >
    <div class="boxtitle">THÔNG TIN TÀI KHOẢN</div>
    <div class="boxcontent fomttaikhoan" id="body">



    <div class="container">
        <?php
            extract(khach_hang_select_by_id($_GET['makh']));
            $test1 = ($_GET['makh']);

            $hinhpath = "./admin/sanpham/uploads/" . $hinh;
            if (is_file($hinhpath)) {
                $img =  '<img src="'. $hinhpath .'" alt="" width="100%" height="100%" class="imgkhlogout">';
            } else {
                $img = '<img src="./images/user.png" alt="" width="100%" height="100%" class="imgkhlogout">';
            }
        ?>

        <div class="trai">
            <div class="tronlg"><?php echo $img ?></div>
        </div>



        <div class="phai">
            <div class="tenkh"> <?php echo $ho_ten ?> </div>
            <?php 
                if($vai_tro == 1) $qtv = "Chức vụ: ADMIN";
                else $qtv = "Chức vụ: USER";
            ?>
            <div class="cv"><?php echo $qtv ?></div>
            <a href="<?php echo $tt ?>"><button type="submit" class="kh">Thông tin tài khoản</button></a>

            <?php
                $ad = "./admin/index.php?makh=". $test1;
                if($vai_tro == 1) echo '<a href=" '.$ad.' "><button type="submit" class="kh">Trang Admin</button></a>'
            ?>
            
        </div>

        

        <div class="duoi">
            <li><a href="#">Giỏ hàng</a></li>
            <li><a href="#">Thay đổi thông tin</a></li>
            <li><a href="#">Đổi mật khẩu</a></li>
            <li><a href="<?php echo $dx ?>">Đăng xuất</a></li>

        </div>
        
    </div>

        
        
        
    </div>

</div>