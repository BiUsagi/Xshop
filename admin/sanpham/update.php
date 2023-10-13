<?php

$listdanhmuc = loai_select_all();

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
    <h1> CẬP NHẬT SẢN PHẨM </h1>
</div>
<div class=" frmcontent">

    <form action="index.php?act=addhh&&hanghoa=updatesp" method="post" enctype="multipart/form-data">

        <div class="mb-3">
                <label for="ma_loai" class="form-label">Loại</label>
                <select name="ma_loai" class="form-select">
                <?php
                    $ma_loai2 = $ma_loai;
                    

                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        if($ma_loai2 == $ma_loai){
                            echo '<option value="' . $ma_loai . '">' . $ten_loai . ' - ' . $ma_loai . '</option>';
                            break;
                        }
                    }
                    

                ?>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        if($ma_loai2 == $ma_loai){
                            continue;
                        }
                        echo '<option value="' . $ma_loai . '">' . $ten_loai . ' - ' . $ma_loai . '</option>';
                    }
                    ?>
                </select>
            </div>

        
        <div class=" mb10">
            Mã sản phẩm <br>
            <input type="text" name="ma_hh" value="<?php if(isset($ma_hh)) echo $ma_hh; ?>" disabled>
            <input type="hidden" name="ma_hh" value="<?php if(isset($ma_hh)) echo $ma_hh; ?>">
        </div>
        <div class=" mb10">
            Tên sản phẩm<br>
            <input type="text" name="ten_hh" value="<?php if(isset($ten_hh)) echo $ten_hh; ?>">
        </div>
        <div class="mb10">
            Đơn giá<br>
            <input type="text" name="don_gia" value="<?php if(isset($don_gia)) echo $don_gia; ?>">
        </div>
        <div class=" mb10">
            Giảm giá<br>
            <input type="text" name="giam_gia" value="<?php if(isset($giam_gia)) echo $giam_gia; ?>">
        </div>
        <div class=" mb10">
            Hình ảnh<br>
            <?php
                if(isset($img)) echo $img;
            ?>
            
            <input type="file" name="hinh" value="<?php if(isset($hinh)) echo $hinh; ?>">
            
        </div>
        <div class=" mb10">
            Ngày nhập<br>
            <input type="date" name="ngay_nhap" value="<?php if(isset($ngay_nhap)) echo $ngay_nhap; ?>">
        </div>
        <div class=" mb10">
            Mô tả<br>
            <textarea name="mo_ta" s="10" cols="30"><?php if(isset($mo_ta)) echo $mo_ta; ?></textarea>
        </div>

        

        <div class=" mb10">
            <input type="submit" value="CẬP NHẬT" name="capnhat">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=addhh&&hanghoa=listsp"><input type="button" value="DANH SÁCH"></a>
        </div>
    </form>


</div>