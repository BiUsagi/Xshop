<?php
if (isset($_GET['makh']) && ($_GET['makh'] > 0)) {
    $ma_kh = $_GET['makh'];
    $kh = khach_hang_select_by_id($ma_kh);
    if (is_array($kh)) {
        extract($kh);

        $hinhpath = "../admin/khachhang/uploads/" . $hinh;
        if (is_file($hinhpath)) {
            $img = "<img src='" . $hinhpath . "' height='50'>";
        } else {
            $img = "no photo";
        }
    }
}
if (isset($_POST['submit']) && ($_POST['submit'])) {
    $ma_kh = $_POST['ma_kh'];
    $kich_hoat = $_POST['kich_hoat'];
    $vai_tro = $_POST['vai_tro'];
    $sql = "UPDATE khach_hang SET kich_hoat = $kich_hoat, vai_tro = $vai_tro WHERE ma_kh = '$ma_kh' ";
    $conn->query($sql);
  
}

?>

<div class="col-md-6 offset-md-3">
    <div class=" frmtitle colortwo">
        <h1> CẬP NHẬT NGƯỜI DÙNG</h1>
    </div>
    <div class=" frmcontent">

        <form action="index.php?act=khachhang&khachhang=sua" class="colortwo" method="post"
            enctype="multipart/form-data">

            <div class=" mb-3">
                <label for="ma_kh" class="form-label">Mã Khách Hàng</label>
                <input type="text" name="ma_kh" class="form-control" value="<?php if (isset($ma_kh))
                    echo $ma_kh; ?>" disabled>
                <input type="hidden" name="ma_kh" class="form-control" value="<?php if (isset($ma_kh))
                    echo $ma_kh; ?>">
            </div>
            <div class=" mb-3">
                <label for="kich_hoat" class="form-label">Trạng Thái</label>
                <select name="kich_hoat" class="form-control">
                    <option value="0" <?php if (isset($kich_hoat) && $kich_hoat == 0)
                        echo "selected"; ?>>0 - Bình thường
                    </option>
                    <option value="1" <?php if (isset($kich_hoat) && $kich_hoat == 1)
                        echo "selected"; ?>>1 - Khóa
                    </option>
                </select>
            </div>
            <div class=" mb-3">
                <label for="vai_tro" class="form-label">Vai Trò</label>
                <select name="vai_tro" class="form-control">
                    <option value="0" <?php if (isset($vai_tro) && $vai_tro == 0)
                        echo "selected"; ?>>0 - Khách hàng
                    </option>
                    <option value="1" <?php if (isset($vai_tro) && $vai_tro == 1)
                        echo "selected"; ?>>1 - Admin</option>
                </select>
            </div>
            


            <div class=" mb-3" style="margin-top: 20px;">
                <input type="submit" value="CẬP NHẬT" name="submit" class="btn btn-primary">
                <input type="reset" value="NHẬP LẠI" class="btn btn-secondary">
                <a href="index.php?act=khachhang&&khachhang=list" class="btn btn-primary">DANH SÁCH</a>
            </div>
        </form>


    </div>
</div>