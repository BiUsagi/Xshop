<div class=" fratitle">
    <h1> DANH SÁCH HÀNG HÓA </h1>
</div>
<div class=" fracontent">
    <div class=" mb10" style="margin-bottom: 10px;">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Bỏ chọn tất cả">
        <input type="button" value=Xóa các mục đã chọn>
        <a href="index.php?act=addhh&hanghoa=addsp"><input type="button" value="Nhập thêm"></a>
    </div>

    <div class=" mb10 frmdsloai">
        <table class="table table-bordered table-hover">
            <tr>
                <th></th>
                <th> MÃ LOẠI </th>
                <th> TÊN LOẠI </th>
                <th> HÌNH </th>
                <th> GIÁ </th>
                <th> LƯỢT XEM </th>
                <th></th>
            </tr>
            <?php
            $listsanpham = hang_hoa_select_all();
            foreach ($listsanpham as $loai) {
                extract($loai);
                $suasp = "index.php?act=addhh&hanghoa=suasp&mahh=" . $ma_hh;
                $xoasp = "index.php?act=addhh&hanghoa=xoasp&mahh=" . $ma_hh;

                // include"./admin/uploads";
                $hinhpath = "../admin/sanpham/uploads/" . $hinh;
                if (is_file($hinhpath)) {
                    $img = "<img src='" . $hinhpath . "' height = '50' >";
                } else {
                    $img = "no photo";
                }


                echo '<tr>
                        <td><input type="checkbox" name=" id=""></td>
                        <td>' . $ma_hh . '</td>
                        <td>' . $ten_hh . '</td> 
                        <td>' . $img . '</td> 
                        <td>' . $don_gia . '</td>
                        <td>' . $so_luot_xem . '</td>  
                        <td><a href="' . $suasp . '"><input type="button" value="Sửa"></a>   
                        <a href="' . $xoasp . '"><input type="button" value="Xóa"></a></td>
                        </tr>';
            }
            ?>
        </table>
    </div>

</div>