<?php
$listdanhmuc = loai_select_all();
?>

<div class="col-md-6 offset-md-3">
    <div class="frmtitle ">
        <h1>THÊM SẢN PHẨM</h1>
    </div>
    <div class="frmcontent">
        <form action="index.php?act=addhh&hanghoa=addsp" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="ma_loai" class="form-label">Loại</label>
                <select name="ma_loai" class="form-select">
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value="' . $ma_loai . '">' . $ten_loai . ' - ' . $ma_loai . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="ma_hh" class="form-label">Mã sản phẩm</label>
                <input type="text" name="ma_hh" class="form-control" disabled>
            </div>
            <div class="mb-3">
                <label for="ten_hh" class="form-label">Tên sản phẩm</label>
                <input type="text" name="ten_hh" class="form-control">
            </div>
            <div class="mb-3">
                <label for="don_gia" class="form-label">Đơn giá</label>
                <input type="text" name="don_gia" class="form-control">
            </div>
            <div class="mb-3">
                <label for="giam_gia" class="form-label">Giảm giá</label>
                <input type="text" name="giam_gia" class="form-control">
            </div>
            <div class="mb-3">
                <label for="hinh" class="form-label">Hình ảnh</label>
                <input type="file" name="hinh" class="form-control">
            </div>
            <div class="mb-3">
                <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                <input type="date" name="ngay_nhap" class="form-control">
            </div>
            <div class="mb-3">
                <label for="mo_ta" class="form-label">Mô tả</label>
                <textarea name="mo_ta" rows="10" cols="30" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <input type="submit" value="THÊM MỚI" name="themmoi" class="btn btn-primary">
                <input type="reset" value="NHẬP LẠI" class="btn btn-secondary">
                <a href="index.php?act=addhh&hanghoa=list" class="btn btn-primary">DANH SÁCH</a>
            </div>
        </form>
    </div>
</div>