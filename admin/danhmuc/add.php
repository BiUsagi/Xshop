<div class="col-md-6 offset-md-3">
    <div class="frmtitle text-center">
        <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
    </div>
    <div class="frmcontent">
        <form action="index.php?act=adddm&danhmuc=themdm" method="post">
            <div class="mb-3">
                <label for="ma_loai" class="form-label">Mã loại</label>
                <input type="text" id="ma_loai" name="ma_loai" class="form-control" disabled>
            </div>
            <div class="mb-3">
                <label for="ten_loai" class="form-label">Tên loại</label>
                <input type="text" id="ten_loai" name="ten_loai" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="submit" value="THÊM MỚI" name="themmoi" class="btn btn-primary">
                <input type="reset" value="NHẬP LẠI" class="btn btn-secondary">
                <a href="index.php?act=adddm&danhmuc=list" class="btn btn-primary">DANH SÁCH</a>
            </div>
        </form>
    </div>
</div>