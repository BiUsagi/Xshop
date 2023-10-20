<?php
// include "includes/dao/khach-hang.php";

    $check = 0;
    $back = "index.php?act=login";
    $i = 0;
    $thongbao1 ='';
    // $dem0 = 'text';
    // $dem1 = 'disabled';
    // $dem2 = 'hidden';
    // $dem3 = 'submit';
    // $valuetdn  = "";
    // $valueemail = "";

   

    if (isset($_POST['doimk']) && ($_POST['doimk'])){
        $tdn = $_POST["tdn"];
        $emaildn = $_POST["email"];
        $mkm1= $_POST["mkm1"];
        $mkm2 = $_POST["mkm2"];


        $listkh = khach_hang_select_all();
        foreach ($listkh as $kh) {
            extract($kh);

            if($tdn == $ma_kh){
                $i++;
                if($emaildn == $email){
                    if(strlen($mkm1) < 6) $thongbao1 = "Mật khẩu không được dưới 6 kí tự!";
                    else{
                        if($mkm1 == $mkm2){
                            khach_hang_change_password($ma_kh,$mkm1);
                            $thongbao1 = "Đổi mật khẩu thành công";
                        }else $thongbao1 = "Mật khẩu không khớp!";
                    }
                }else $thongbao1 = "Email không chính xác!";
            }
        }
        // echo $i;
        if($i == 0) $thongbao1 = "Tên đăng nhập không tồn tại.";

        
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

<div class="row1 mb">
    <div class="boxtitle">QUÊN MẬT KHẨU</div>
    <div class="boxcontent fomttaikhoan">

        <form action="index.php?act=quenmk" method="post">
            <label class="ipmk">
                Tên đăng nhập <br>
                <input type="text" name="tdn" id="" required><br>
            </label>
            <label class="ipmk">
                Email <br>
                <input type="text" name="email" id="" required><br>
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
            <?php echo "<div style='color:red'> $thongbao1 </div>" ?>
            <input type="submit" name="doimk" value="Đổi mật khẩu" width="100%" class="ipmk">


        </form>

        <li>
            <?php echo '<a href="' . $back . '">Trở về</a>' ?>
        </li>
        
        
    </div>

</div>