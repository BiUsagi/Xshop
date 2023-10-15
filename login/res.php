<?php
include "connect.php";

// Khởi tạo các biến lưu trữ dữ liệu đã nhập
$ma_kh_input = '';
$ho_ten_input = '';
$email_input = '';

// Dữ liệu từ form
if (isset($_POST['dangky']) && ($_POST['dangky'])) {

    $ma_kh_input = $_POST['ma_kh'];
    $ho_ten_input = $_POST['ho_ten'];
    $email_input = $_POST['email'];


    // Dữ liệu từ form
    $ma_kh = $_POST['ma_kh'];
    $ho_ten = $_POST['ho_ten'];
    $email = $_POST['email'];
    $mat_khau = $_POST['pass'];
    $checkpass = $_POST['checkpass'];

    //sử dụng hình ảnh mặc định
    $hinh = "user_img.png";
    $kich_hoat = 0;
    $vai_tro = 0;


    //kiểm tra dữ liệu đầu vào
    if (strlen($ma_kh) < 6 || strlen($ma_kh) > 20) {
        $thongbao = "Tên đăng nhập phải có từ 6 đến 20 ký tự.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $thongbao = "Email không hợp lệ.";
    } elseif ($mat_khau !== $checkpass) {
        $thongbao = "Mật khẩu và xác nhận mật khẩu không khớp!";
    } elseif (strlen($mat_khau) < 6) {
        $thongbao = "Mật khẩu phải chứa ít nhất 6 ký tự.";
    } elseif (!preg_match('/[A-Za-z]/', $mat_khau)) {
        $thongbao = "Mật khẩu phải chứa ít nhất một chữ cái.";
    } else {
        // Mã hóa mật khẩu (tùy theo cách bạn mã hóa)
        // $hashed_password = password_hash($mat_khau, PASSWORD_DEFAULT);

        // Thực hiện truy vấn SQL để chèn dữ liệu
        $sql = khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
        $thongbao = "Đăng ký thành công!";
        echo '<script>window.location.href = "./index.php?act=login";</script>';
        exit; // Kết thúc việc thực hiện mã PHP
    }


}


?>


<div class="row mb">
    <div class="boxtitle">ĐĂNG KÝ</div>
    <div class="boxcontent fomttaikhoan">


        <form action="index.php?act=res" method="post">

            <?php
            $res = "index.php?act=login"; //gan
            ?>

            <div class="row mb10">
                Tên Đăng Nhập <br>
                <input type="text" name="ma_kh" id="" value="<?php echo $ma_kh_input; ?>"><br>
            </div>
            <div class="row mb10">
                Họ và tên <br>
                <input type="text" name="ho_ten" id="" value="<?php echo $ho_ten_input; ?>"><br>
            </div>
            <div class="row mb10">
                Email<br>
                <input type="text" name="email" id="" value="<?php echo $email_input; ?>"><br>
            </div>
            <div class="row mb10">
                Mật Khẩu
                <input type="password" name="pass" id=""> <br>
            </div>
            <div class="row mb10">
                Xác Nhận Mật Khẩu
                <input type="password" name="checkpass" id=""> <br>
            </div>


            <div class="row mb10">
                <?php
                if (isset($thongbao)) {
                    echo '<p style="color: red; margin-top: -5px; margin-bottom: -5px; ">' . $thongbao . '</p>';
                }

                ?>
                <br>
                <input type="submit" value="Đăng Ký" name="dangky">

            </div>

        </form>
        <li><a href="#">Quên mật khẩu</a></li>
        <li>
            <?php echo '<a href="' . $res . '">Đã có tài khoản</a>' ?>
        </li>

    </div>

</div>