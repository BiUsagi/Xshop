
<?php


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'logout':
            include "logout.php";
            break;

        case 'login':
            
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
                                header("location: index.php?act=logout&&makh=".$ma_kh);
                            }else{ 
                                $thongbao = "Sai mật khẩu";
                            }
                            break;
                        }else{
                            $thongbao = "Email chưa được đăng ký";
                        }
                    }else $thongbao = "Vui lòng nhập đầy đủ thông tin";


                    
                }
            }
            include "login.php";
            break;

        case 'res':
            include "res.php";
            break;

        case 'thonge':
            include "danhmuc/category.php";
            break;

        default:
            include "includes/login.php";
            break;
    }
} else {
    include "login/login.php";
}


?>