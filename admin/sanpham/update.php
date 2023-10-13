<?php
if (is_array($sp)) {
    extract($sp);

    $hinhpath = "../admin/sanpham/uploads/" . $hinh;
    if (is_file($hinhpath)) {
        $img = "<img src='" . $hinhpath . "' height = '50' >";
    } else {
        $img = "no photo";
    }
}

?>


<div class=" frmtitle">
    <h1> CẬP NHẬT LOẠI HÀNG </h1>
</div>
<div class="frmcontent">
    <form action="index.php?act=addhh&&hanghoa=updatesp" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            Mã loại <br>
            <input type="text" name="ma_loai" value="<?php if (isset($ma_loai))
                echo $ma_loai; ?>" class="form-control">
        </div>
        <div class="mb-3">
            Mã sản phẩm <br>
            <input type="text" name="ma_hh" value="<?php if (isset($ma_hh))
                echo $ma_hh; ?>" class="form-control"
                disabled>
            <input type="hidden" name="ma_hh" value="<?php if (isset($ma_hh))
                echo $ma_hh; ?>">
        </div>
        <div class="mb-3">
            Tên sản phẩm<br>
            <input type="text" name="ten_hh" value="<?php if (isset($ten_hh))
                echo $ten_hh; ?>" class="form-control">
        </div>
        <div class="mb-3">
            Đơn giá<br>
            <input type="text" name="don_gia" value="<?php if (isset($don_gia))
                echo $don_gia; ?>" class="form-control">
        </div>
        <div class="mb-3">
            Giảm giá<br>
            <input type="text" name="giam_gia" value="<?php if (isset($giam_gia))
                echo $giam_gia; ?>"
                class="form-control">
        </div>
        <div class="mb-3">
            Hình ảnh<br>
            <?php if (isset($img))
                echo $img; ?>
            <input type="file" name="hinh" class="form-control-file">
        </div>
        <div class="mb-3">
            Ngày nhập<br>
            <input type="date" name="ngay_nhap" value="<?php if (isset($ngay_nhap))
                echo $ngay_nhap; ?>"
                class="form-control">
        </div>
        <div class="mb-3">
            Mô tả<br>
            <textarea name="mo_ta" rows="10" cols="30"
                class="form-control"><?php if (isset($mo_ta))
                    echo $mo_ta; ?></textarea>
        </div>
        <div class="mb-3">
            <input type="submit" value="CẬP NHẬT" name="capnhat" class="btn btn-primary">
            <input type="reset" value="NHẬP LẠI" class="btn btn-secondary">
            <a href="index.php?act=addhh&&hanghoa=listsp" class="btn btn-primary">DANH SÁCH</a>
        </div>
    </form>
</div>