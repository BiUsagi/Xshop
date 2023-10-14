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

<div class="col-md-6 offset-md-3">
    <div class=" frmtitle colortwo">
        <h1> CẬP NHẬT SẢN PHẨM </h1>
    </div>
    <div class=" frmcontent">

        <form action="index.php?act=addhh&&hanghoa=updatesp" class="colortwo" method="post"
            enctype="multipart/form-data">

            <div class="mb-3">
                <label for="ma_loai" class="form-lable">Loại</label>
                <select name="ma_loai" class="form-select colorselect" >
                    <?php
                    $ma_loai2 = $ma_loai;


                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        if ($ma_loai2 == $ma_loai) {
                            echo '<option value="' . $ma_loai . '">' . $ma_loai. ' - ' .  $ten_loai . '</option>';
                            break;
                        }
                    }


                    ?>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        if ($ma_loai2 == $ma_loai) {
                            continue;
                        }
                        echo '<option value="' . $ma_loai . '">' . $ma_loai. ' - ' .  $ten_loai . '</option>';
                    }
                    ?>
                </select>
            </div>


            <div class=" mb-3">
                <label for="ma_hh" class="form-label">Mã sản phẩm</label>
                <input type="text" name="ma_hh" class="form-control" value="<?php if (isset($ma_hh))
                    echo $ma_hh; ?>" disabled>
                <input type="hidden" name="ma_hh" class="form-control" value="<?php if (isset($ma_hh))
                    echo $ma_hh; ?>">
            </div>
            <div class=" mb-3">
                <label for="ten_hh" class="form-label">Tên sản phẩm</label>
                <input type="text" name="ten_hh" class="form-control" value="<?php if (isset($ten_hh))
                    echo $ten_hh; ?>">
            </div>
            <div class="mb-3">
                <label for="don_gia" class="form-label">Đơn giá</label>
                <input type="text" name="don_gia" class="form-control" value="<?php if (isset($don_gia))
                    echo $don_gia; ?>">
            </div>
            <div class=" mb-3">
                <label for="giam_gia" class="form-label">Giảm giá</label>
                <input type="text" name="giam_gia" class="form-control" value="<?php if (isset($giam_gia))
                    echo $giam_gia; ?>">
            </div>
            <div class=" mb-3">
                <label for="hinh" class="form-label">Hình ảnh</label>
                <?php
                if (isset($img))
                    echo $img;
                ?>

                <input type="file" name="hinh" class="form-control" value="<?php if (isset($hinh))
                    echo $hinh; ?>">

            </div>
            <div class=" mb-3">
                <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                <input type="date" name="ngay_nhap" class="form-control" value="<?php if (isset($ngay_nhap))
                    echo $ngay_nhap; ?>">
            </div>
            <div class=" mb-3">
                <label for="mo_ta" class="form-label">Mô tả</label>
                <textarea name="mo_ta" s="10" cols="30" class="form-control"><?php if (isset($mo_ta))
                    echo $mo_ta; ?></textarea>
            </div>



            <div class=" mb-3" style="margin-top: 20px;">
                <input type="submit" value="CẬP NHẬT" name="capnhat" class="btn btn-primary">
                <input type="reset" value="NHẬP LẠI" class="btn btn-secondary">
                <a href="index.php?act=addhh&&hanghoa=listsp" class="btn btn-primary">DANH SÁCH</a>
            </div>
        </form>


    </div>
</div>