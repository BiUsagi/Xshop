<?php
    if(!isset($_SESSION["user"])) 
    echo '<script>window.location.href = "./index.php?act=login";</script>';

    $thongbao ='';
    $listtt = khach_hang_select_by_id($_SESSION["user"]);
    extract($listtt);
    if (isset($_POST['doimk']) && ($_POST['doimk'])){
        $mkc = $_POST["mkc"];
        $mkm1 = $_POST["mkm1"];
        $mkm2 = $_POST["mkm2"];

        
        if($mkc == $mat_khau){
            if($mkm1 = $mkm2){
                if(strlen($mkm1) < 6 || strlen($mkm1) > 20) $thongbao = "Tên đăng nhập phải có từ 6 đến 20 ký tự.";
                else{
                    if(!preg_match('/[A-Za-z]/', $mkm1)){
                        $thongbao = "Mật khẩu phải chứa ít nhất một chữ cái.";
                    }else if($mkc == $mkm1){
                        $thongbao = "Mật khẩu mới không được trùng với mật khẩu cũ!";
                    }else{
                        khach_hang_change_password($ma_kh, $mkm1);
                        $thongbao = "Đổi mật khẩu thành công <br> Tự động chuyển sang trang người dùng sau 3s.";
                        echo '<meta http-equiv="refresh" content="3; url=index.php?act=logout&makh='.$ma_kh.'">';
                    }
                }
            }else $thongbao = "Mật khẩu và xác nhận mật khẩu không khớp!";
        }else $thongbao = "Mật khẩu cũ không chính xác!";
    }
?>

<style>
    .ipmk{
        width: 100%;
        margin-top: 10px;
    }
    input{
        margin-bottom: 10px;
    }
</style>

<div class="row mb">
    <div class="boxtitle">ĐỔI MẬT KHẨU</div>
    <div class="boxcontent fomttaikhoan">

        <form action="index.php?act=setpw" method="post">
            <label class="ipmk">
                Mật khẩu cũ <br>
                <input type="text" name="mkc" id=""><br>
            </label>
            <label class="ipmk">
                Mật khẩu mới <br>
                <input type="text" name="mkm1" id=""><br>
            </label>
            <label class="ipmk">
                Nhập lại mật khẩu <br>
                <input type="text" name="mkm2" id=""><br>
            </label>
            
            <!-- <br> -->
            <?php echo "<div style='color:red'> $thongbao </div>" ?>
            <input type="submit" name="doimk" value="Đổi mật khẩu" width="100%" class="ipmk">


        </form>
        
        
    </div>

</div>