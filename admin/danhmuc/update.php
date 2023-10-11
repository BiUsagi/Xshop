<?php
    if(is_array($dm)){
        extract($dm);
    }
?>


    <div class="frmtitle">
        <h1> CẬP NHẬT LOẠI HÀNG </h1>
    </div>
    <div class="frmcontent">

        <form action="index.php?act=adddm&danhmuc=updatedm <?php ?>" method="post">
            <div class="mb10">
                Mã loại <br>
                <input type="text" name="ma_loai" value="<?php if(isset($ma_loai)) echo $ma_loai; ?>" disabled>
            </div>
            <div class="mb10">
                Tên loại<br>
                <input type="text" name="ten_loai" value="<?php if(isset($ten_loai)) echo $ten_loai; ?>">
            </div>
            <div class=" mb10">
                <input type="hidden" name="ma_loai" value="<?php if(isset($ma_loai)) echo $ma_loai; ?>">
                <input type="submit" value="CẬP NHẬT" name="capnhat">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=adddm&danhmuc=list"><input type="button" value="DANH SÁCH"></a>
            </div>
        </form>


    </div>
</div>