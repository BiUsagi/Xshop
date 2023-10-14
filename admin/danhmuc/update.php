<?php
if (is_array($dm)) {
    extract($dm);
}
?>


<div class="col-md-6">
    <div class="frmtitle colortwo">
        <h1>CẬP NHẬT LOẠI HÀNG</h1>
    </div>
    <div class="frmcontent ">
        <form action="index.php?act=adddm&danhmuc=updatedm" method="post" class="colortwo">
            <div class="form-group mb-3">
                <label for="ma_loai">Mã loại</label>
                <input type="text" id="ma_loai" name="ma_loai" value="<?php if (isset($ma_loai))
                    echo $ma_loai; ?>"
                    class="form-control" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="ten_loai">Tên loại</label>
                <input type="text" id="ten_loai" name="ten_loai" value="<?php if (isset($ten_loai))
                    echo $ten_loai; ?>"
                    class="form-control">
            </div>
            <input type="hidden" name="ma_loai" value="<?php if (isset($ma_loai))
                echo $ma_loai; ?>">
            <div class="mb-3" style="margin-top: 20px;">
                <input type="submit" value="CẬP NHẬT" name="capnhat" class="btn btn-primary">
                <input type="reset" value="NHẬP LẠI" class="btn btn-secondary">
                <a href="index.php?act=adddm&danhmuc=list" class="btn btn-primary">DANH SÁCH</a>
            </div>
        </form>
    </div>
</div>