
<div class="row mb" >
    <div class="boxtitle">CHI TIẾT TÀI KHOẢN</div>
    <div class="boxcontent fomttaikhoan" id="body">



    <div class="containertt">

        

        <?php

            extract(khach_hang_select_by_id($_GET['makh']));
            $hinhpath = "./admin/khachhang/uploads/" . $hinh;
                if (is_file($hinhpath)) {
                    $img = "<img src='" . $hinhpath . "' height = '50' >";
                } else {
                    $img = '<img src="./images/user.png" alt="" width="60px" height="60px"><br>';
                }
                
            $back = "index.php?act=logout&&makh=".$ma_kh;
            if($vai_tro == 1) $qtv = "Admin";
            else $qtv = "User";
            
            
            echo "<div class='tronlg'> .$img. </div>"; 
            echo "<br>";
            echo "<b>Mã đăng nhập:</b> $ma_kh<br>";
            echo "<b>Họ và tên :</b> $ho_ten<br>";
            echo "<b>Email :</b> $email<br>";
            echo "<b>Chức vụ :</b> $qtv <br>";

            echo '<button><a href="'.$back.'">Quay lại</a></button>';
        ?>
        

        
        
    </div>

</div>