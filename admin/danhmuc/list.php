<div class=" fratitle">
    <h1> DANH SÁCH LOẠI HÀNG </h1>
</div>
<div class="fracontent">
    <div style="margin-bottom: 10px;">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Bỏ chọn tất cả">
        <input type="button" value="Xóa các mục đã chọn">
        <a href="index.php?act=adddm&danhmuc=themdm"><input type="button" value="Nhập thêm"></a>
    </div>
    <div class=" mb10 frmdsloai">
        <table class="table table-bordered table-hover">
            <tr>
                <th></th>
                <th> MÃ LOẠI </th>
                <th>TÊN LOẠI </th>
                <th></th>
            </tr>
            <?php
            $listdanhmuc = loai_select_all();
            foreach ($listdanhmuc as $loai) {
                extract($loai);
                $suadm = "index.php?act=adddm&danhmuc=sua&maloai=" . $ma_loai;
                $xoadm = "index.php?act=adddm&danhmuc=xoa&maloai=" . $ma_loai;
                echo '<tr>
                    <td><input type="checkbox" name=" id=""></td>
                    <td>' . $ma_loai . '</td>
                    <td>' . $ten_loai . '</td> 
                    <td><a href="' . $suadm . '"><input type="button" value="Sửa"></a>   
                    <a href="' . $xoadm . '"><input type="button" value="Xóa"></a></td>
                    </tr>';
            }
            ?>
        </table>
    </div>

</div>