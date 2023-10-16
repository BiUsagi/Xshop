<?php


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'logout':
            $tt = "index.php?act=ttkh&&makh=".($_GET['makh']);
            include "logout.php";
            break;

           
        case 'xoass':
                session_destroy();
                echo '<meta http-equiv="refresh" content="0; url=index.php?act=login">';
                // header("location: index.php?act=login");
                break;

        case 'login':

          
            // echo $_SESSION['user'];

            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])){
                $thongbao = '';

                $tendn1 = $_POST['madn'];
                $mk = $_POST['pass']; 
                $listkh = khach_hang_select_all();
                foreach ($listkh as $kh) {
                    extract($kh);
                    if($tendn1 != '' && $mk != ''){
                        if ($ma_kh == $tendn1) {
                            if($mat_khau == $mk){
                                // $ma_kh = $_SESSION["user"] ;
                                $_SESSION["user"] = $ma_kh;
                                // echo $ma_kh;
                                echo '<script>window.location.href = "./index.php?act=logout&makh='.$ma_kh.'";</script>';
                                // header("location: index.php?act=logout&makh=$ma_kh");
                                // echo '<meta http-equiv="refresh" content="0; url=index.php?makh='.$ma_kh.'&act=logout" >';
    
                            }else{ 
                                $thongbao = "Sai mật khẩu";
                            }
                            break;
                        }else{
                            $thongbao = "Tài khoản chưa được đăng ký";
                        }
                    }else $thongbao = "Vui lòng nhập đầy đủ thông tin";


                    
                }
            }
            include "login.php";
            break;

        case 'logouttt':
            include "logout.php";
            break;

        case 'ttkh':
            include "thongtin.php";
            break;

        case 'res':
            include "res.php";
            break;

        case 'setpw':   
            include "setpw.php";
            break;

        default:
            include "login.php";
            break;
    }
} else {
    include "login/login.php";
}


?>