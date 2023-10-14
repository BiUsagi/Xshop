<div class=" fratitle colortwo">
    <h1> DANH SÁCH SẢN PHẨM </h1>
</div>
<div class=" fracontent">

    <div class="mb-3" style="margin-bottom: 20px;">
        <input type="button" class="btn btn-primary" value="Chọn tất cả">
        <input type="button" class="btn btn-secondary" value="Bỏ chọn tất cả">
        <input type="button" class="btn btn-danger" value="Xóa các mục đã chọn">
        <a href="index.php?act=addhh&hanghoa=addsp" class="btn btn-success">
            Nhập thêm
        </a>
    </div>

    <div class=" mb10 frmdsloai">
        <table class="table table-bordered colortable">
            <tr>
                <th></th>
                <th> MÃ SẢN PHẨM </th>
                <th> TÊN SẢN PHẨM </th>
                <th> HÌNH </th>
                <th> GIÁ </th>
                <th> GIẢM GIÁ </th>
                <th> LƯỢT XEM </th>
                <th> NGÀY NHẬP</th>
                <th> MÔ TẢ</th>
                <th> LOẠI</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
            <?php
            $listsanpham = hang_hoa_select_all();
            foreach ($listsanpham as $loai) {
                extract($loai);
                $loai_2 = $ma_loai;
                $suasp = "index.php?act=addhh&hanghoa=suasp&mahh=" . $ma_hh;
                $xoasp = "index.php?act=addhh&hanghoa=xoasp&mahh=" . $ma_hh;

                // include"./admin/uploads";
                $hinhpath = "../admin/sanpham/uploads/" . $hinh;
                if (is_file($hinhpath)) {
                    $img = "<img src='" . $hinhpath . "' height = '50' >";
                } else {
                    $img = "no photo";
                }

                $listdm = loai_select_all();
                $tenloai = "no";
                foreach ($listdm as $dm) {
                    extract($dm);
                    if($ma_loai == $loai_2){ $ten_loai_2 = $ten_loai;
                        break;
                    }
                }


                echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>' . $ma_hh . '</td>
                        <td>' . $ten_hh . '</td> 
                        <td>' . $img . '</td> 
                        <td>' . $don_gia . '</td>
                        <td>' . $giam_gia . '</td>
                        <td>' . $so_luot_xem . '</td> 
                        <td>' . $ngay_nhap . '</td> 
                        <td>' . $mo_ta . '</td>  
                        <td>' . 'Loại: ' .$ten_loai_2. "<br>" .'Mã: ' .$ma_loai. '</td>
                        <td><a href="' . $suasp . '"><button class="btn btn-primary">Sửa</button></a>
                        <a href="' . $xoasp .'"><button class="btn btn-danger">Xóa</button></a></td>
                        </tr>';
            }
            ?>
        </table>
    </div>

</div>