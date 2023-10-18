<div class=" fratitle colortwo ">
    <h1> DANH SÁCH BÌNH LUẬN</h1>
</div>
<div class="fracontent">
    <div class="mb-3" style="margin-bottom: 20px;">
        <input type="button" class="btn btn-primary" value="Chọn tất cả" onclick="selectAll()">
        <input type="button" class="btn btn-secondary" value="Bỏ chọn tất cả" onclick="deselectAll()">
        <input type="button" class="btn btn-danger" value="Xóa các mục đã chọn">
        <!-- <a href="index.php?act=khachhang&khachhang=home" class="btn btn-success">
            Nhập thêm
        </a> -->
    </div>
    <div class=" mb10 frmdsloai">
        <table class="table table-bordered  colortable">
            <tr>
                <th></th>
                <th class="vertical-center">Mã BL </th>
                <th class="vertical-center">Nội Dung </th>
                <th class="vertical-center">Mã KH</th>
                <th class="vertical-center">Sản Phẩm </th>
                <th class="vertical-center">Ngày BL</th>
                <th class="vertical-center">Hành Động</th>
            </tr>
            <?php
            $listbl = binh_luan_select_all();
            foreach ($listbl as $binhluan) {
                extract($binhluan);
                $sp = hang_hoa_select_by_id($ma_hh);
                $suakh = "index.php?act=khachhang&khachhang=sua&maloai=" . $ma_kh;
                $xoakh = "index.php?act=khachhang&khachhanh=xoa&maloai=" . $ma_kh;


                echo '<tr>
                    <td class="center-checkbox small-cell-4">
                        <input  class="large-checkbox" type="checkbox" name=" id="">
                    </td>
                    <td class="center-checkbox small-cell-7"> ' . $ma_bl . '</td>
                    <td>' . $noi_dung . '</td> 
                    <td class="center-checkbox small-cell-7">' . $ma_kh . '</td> 
                    <td class="center-checkbox small-cell-13    ">' . $ma_hh . ' - ' . $sp['ten_hh'] . '</td> 
                    <td class="center-checkbox small-cell-9">' . $ngay_bl . '</td> 
                    <td class="small-cell-9 center-checkbox">
                        
                        <a href="' . $xoakh .'"><button class="btn btn-danger">Xóa</button></a>
                    </td>
                    </tr>';
            } 
            ?>
        </table>
    </div>
    <!-- <a href="' . $suakh . '"><button class="btn btn-primary">Sửa</button></a> -->
</div>






