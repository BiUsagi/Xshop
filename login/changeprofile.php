<?php
    if(!isset($_SESSION["user"])) 
    echo '<script>window.location.href = "./index.php?act=login";</script>';

    $ma_kh = $_SESSION['user'];

    
    // Khởi tạo các biến lưu trữ dữ liệu đã nhập
    $ma_kh_input = '';
    $ho_ten_input = '';
    $email_input = '';
         


    if (isset($_POST['capnhat'])) {
        // Lấy dữ liệu từ biểu mẫu
        $makh = $_POST['ma_kh'];
        $ho_ten = $_POST['ho_ten'];
        $email = $_POST['email'];

        // Lấy thông tin về hình ảnh
        $hinh = $_FILES['hinh']['name']; // Tên tệp
        $hinh_tmp = $_FILES['hinh']['tmp_name']; // Đường dẫn tạm thời

        // Lưu hình ảnh vào thư mục hoặc cơ sở dữ liệu tùy chọn
        $upload_dir = "./admin/khachhang/uploads/";
        move_uploaded_file($hinh_tmp, $upload_dir . $hinh);

        //kiểm tra dữ liệu đầu vào
    if (strlen($ma_kh) < 6 || strlen($ma_kh) > 20) {
        $thongbao = "Tên đăng nhập phải có từ 6 đến 20 ký tự.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $thongbao = "Email không hợp lệ.";
    } else {
        // Truy vấn SQL để cập nhật thông tin, bao gồm cả tên hình ảnh
        $sql = "UPDATE khach_hang SET ma_kh = '$makh', ho_ten = '$ho_ten', email = '$email', hinh = '$hinh' WHERE ma_kh = '$ma_kh'";
        if ($conn->query($sql) === TRUE) {
            $thongbao = "Cập nhật thông tin thành công!";
        } else {
            $thongbao = "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
}

?>

<div class="row mb">
    <div class="boxtitle">THAY ĐỔI THÔNG TIN</div>
    <div class="boxcontent fomttaikhoan">


        <form action="index.php?act=changepf" method="post" enctype="multipart/form-data">

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
            <div class="mb-3">
                <label for="hinh" class="form-label">Hình ảnh</label><br>
                <input type="file" name="hinh" class="kichthuoc">
            </div>

            


            <br> <div class="row mb10">
                <?php
                if (isset($thongbao)) {
                    echo '<p style="color: red; margin-top: -5px; margin-bottom: -5px; ">' . $thongbao . '</p>';
                }

                ?>
                <br>
                <input type="submit" value="Cập Nhật" name="capnhat">

            </div>

        </form>
        <li><a href="#">Đổi mật khẩu</a></li>
        <li>
            <?php echo '<a href="' . $res . '">Đã có tài khoản</a>' ?>
        </li>

    </div>

</div>