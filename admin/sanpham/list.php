<div class=" fratitle colortwo">
    <h1> DANH SÁCH SẢN PHẨM </h1>
</div>
<div class=" fracontent">

    <div class="mb-3" style="margin-bottom: 20px;">
        <input type="button" class="btn btn-primary" value="Chọn tất cả" onclick="selectAll()">
        <input type="button" class="btn btn-secondary" value="Bỏ chọn tất cả" onclick="deselectAll()">
        <input type="button" class="btn btn-danger" value="Xóa các mục đã chọn">
        <a href="index.php?act=addhh&hanghoa=addsp" class="btn btn-success">
            Nhập thêm
        </a>
    </div>

    <div class=" mb10 frmdsloai">
        <table class="table table-bordered colortable">
            <tr>
                <th></th>
                <th class="vertical-center"> MÃ SẢN PHẨM </th>
                <th class="vertical-center"> TÊN SẢN PHẨM </th>
                <th class="vertical-center"> HÌNH </th>
                <th class="vertical-center"> GIÁ </th>
                <th class="vertical-center"> GIẢM GIÁ </th>
                <th class="vertical-center"> LƯỢT XEM </th>
                <th class="vertical-center"> NGÀY NHẬP</th>
                <th class="vertical-center"> MÔ TẢ</th>
                <th class="vertical-center"> LOẠI</th>
                <th class="vertical-center">HÀNH ĐỘNG</th>
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
                        <td class="center-checkbox small-cell-4">
                            <input class="large-checkbox" type="checkbox" name="" id="" >
                        </td>
                        <td class="center-checkbox">' . $ma_hh . '</td>
                        <td class=" small-cell-9">' . $ten_hh . '</td> 
                        <td class="center-checkbox small-cell-9">' . $img . '</td> 
                        <td class="center-checkbox">' . $don_gia . '</td>
                        <td class="center-checkbox">' . $giam_gia . '   % </td>
                        <td class="center-checkbox">' . $so_luot_xem . '</td> 
                        <td class="center-checkbox">' . $ngay_nhap . '</td> 
                        <td class=" small-cell-9">' . $mo_ta . '</td>  
                        <td class=" small-cell-9">' . 'Loại: ' .$ten_loai_2. "<br>" .'Mã: ' .$ma_loai. '</td>
                        <td class="small-cell-9 center-checkbox">
                            <a href="' . $suasp . '"><button class="btn btn-primary">Sửa</button></a>
                            <a href="' . $xoasp .'"><button class="btn btn-danger">Xóa</button></a>
                            </td>
                        </tr>';
            }
            ?>
        </table>
    </div>

</div>