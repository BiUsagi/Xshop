<?php
    $listdanhmuc = loai_select_all();
?>

<div class="">
    <div class="">
        <h1> THÊM MỚI SẢN PHẨM </H1>
    </div>
    <div class="">

        <form action="index.php?act=addhh&hanghoa=addsp" method="post" enctype="multipart/form-data">

            <div class="">
                Mã loại<br>
                <select name="ma_loai"> 
                    <?php 
                        
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            echo '<option value="'.$ma_loai.'">'.$ten_loai.'</option>';
                        }
                    ?>
                    
                </select>
            </div>
 
            <div class="">
                Mã sản phẩm <br>
                <input type="text" name="ma_hh" disabled>
            </div>
            <div class="">
                Tên sản phẩm<br>
                <input type="text" name="ten_hh">
            </div>
            <div class="">
                Đơn giá<br>
                <input type="text" name="don_gia">
            </div>
            <div class="">
                Giảm giá<br>
                <input type="text" name="giam_gia">
            </div>
            <div class="">
                Hình ảnh<br>
                <input type="file" name="hinh">
            </div>
            <div class="">
                Ngày nhập<br>
                <input type="date" name="ngay_nhap">
            </div>
            <div class="">
                Mô tả<br>
                <textarea name="mo_ta" rows="10" cols="30"></textarea>
            </div>



            <div class="">
                <input type="submit" value="THÊM MỚI" name="themmoi">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=addhh&hanghoa=list"><input type="button" value="DANH SÁCH"></a>
            </div>
        </form>


    </div>
</div>
</div>