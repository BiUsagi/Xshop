<?php
if (!isset($_SESSION["user"]))
    echo '<script>window.location.href = "./index.php?act=login";</script>';

    
$ma_kh = $_SESSION['user'];
$res = "index.php?act=logout&makh=" . $_SESSION['user']; //gan  


// Truy vấn cơ sở dữ liệu để lấy thông tin của khách hàng
$sql = "SELECT * FROM khach_hang WHERE ma_kh = '$ma_kh'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Lấy thông tin khách hàng từ kết quả truy vấn
    $row = $result->fetch_assoc();
    $ho_ten = $row['ho_ten'];
    $email = $row['email'];
}

// Các biến lưu trữ dữ liệu đã nhập
$ma_kh_input = $ma_kh;
$ho_ten_input = $ho_ten;
$email_input = $email;





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
    if (strlen($makh) < 6 || strlen($makh) > 20) {
        $thongbao = "Tên đăng nhập phải có từ 6 đến 20 ký tự.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $thongbao = "Email không hợp lệ.";
    } else {
        // Truy vấn SQL để cập nhật thông tin, bao gồm cả tên hình ảnh
        if ($hinh == '') {


            $sql = "UPDATE khach_hang SET ma_kh = '$makh', ho_ten = '$ho_ten', email = '$email' WHERE ma_kh = '$ma_kh'";
            if ($conn->query($sql) === TRUE) {
                $thongbao = "Cập nhật thông tin thành công!";
            } else {
                $thongbao = "Lỗi: " . $sql . "<br>" . $conn->error;
            }
            $_SESSION['user'] = $makh;
            // echo $_SESSION['user'];
            $res = "index.php?act=logout&makh=" . $_SESSION['user']; //gan
        } else {
            $sql = "UPDATE khach_hang SET ma_kh = '$makh', ho_ten = '$ho_ten', email = '$email', hinh = '$hinh' WHERE ma_kh = '$ma_kh'";
            if ($conn->query($sql) === TRUE) {
                $thongbao = "Cập nhật thông tin thành công!";
            } else {
                $thongbao = "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        }

    }
}

?>

<div class="row mb">
    <div class="boxtitle">THAY ĐỔI THÔNG TIN</div>
    <div class="boxcontent fomttaikhoan">


        <form action="index.php?act=changepf" method="post" enctype="multipart/form-data">

            <?php
            
            // $back = "index.php?act=logout&&makh=".$ma_kh;
            ?>

            <div class="row mb10">
                Tên Đăng Nhập <br>
                <input type="text" name="ma_kh" id="" value="<?php echo $ma_kh; ?>"><br>
            </div>
            <div class="row mb10">
                Họ và tên <br>
                <input type="text" name="ho_ten" id="" value="<?php echo $ho_ten; ?>"><br>
            </div>
            <div class="row mb10">
                Email<br>
                <input type="text" name="email" id="" value="<?php echo $email; ?>"><br>
            </div>
            <div class="mb-3">
                <label for="hinh" class="form-label">Hình ảnh</label><br>
                <input type="file" name="hinh" class="kichthuoc">
            </div>



            <br>
            <div class="row mb10">
                <?php
                if (isset($thongbao)) {
                    echo '<p style="color: red; margin-top: -5px; margin-bottom: -5px; ">' . $thongbao . '</p>';
                }

                ?>
                <br>
                <input type="submit" value="Cập Nhật" name="capnhat" style="width: 100%;">

            </div>

        </form>
        <!-- <li><a href="#">Đổi mật khẩu</a></li> -->

        <li>
            <?php echo '<a href="' . $res . '">Trở về</a>' ?>
        </li>

    </div>

</div>