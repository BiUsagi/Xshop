<div class=" fratitle colortwo ">
    <h1> DANH SÁCH KHÁCH HÀNG </h1>
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
                <th class="vertical-center"> MÃ KH </th>
                <th class="vertical-center">Họ Tên </th>
                <th class="vertical-center">Mật Khẩu </th>
                <th class="vertical-center">Trạng thái </th>
                <th class="vertical-center">Hinh </th>
                <th class="vertical-center">Email </th>
                <th class="vertical-center">Vai Trò </th>
                <th class="vertical-center">Hành Động</th>
            </tr>
            <?php
            //in dskh
            $listkh = khach_hang_select_all();
            foreach ($listkh as $khachhang) {
                extract($khachhang);

                $hinhpath = "../admin/khachhang/uploads/" . $hinh;
                if (is_file($hinhpath)) {
                    $img = "<img src='". $hinhpath."' style='width: 100%;'>";
                } else {
                    $img = "no photo";
                }

                $suakh = "index.php?act=khachhang&khachhang=sua&makh=" . $ma_kh;
                $xoakh = "index.php?act=khachhang&khachhang=xoa&makh=" . $ma_kh;

                if($vai_tro == 1) $qtv = "Admin";
                else $qtv = "User";

                if($kich_hoat == 1) $block = "Chặn";
                else $block = "Mở";

                echo '<tr>
                    <td class="center-checkbox small-cell-4">
                        <input  class="large-checkbox" type="checkbox" name=" id="">
                    </td>
                    <td class="center-checkbox"> ' . $ma_kh . '</td>
                    <td>' . $ho_ten . '</td> 
                    <td>' . $mat_khau . '</td> 
                    <td class="center-checkbox">' . $block . '</td> 
                    <td  class="center-checkbox small-cell-9">' . $img . '</td> 
                    <td>' . $email . '</td> 
                    <td class="center-checkbox">' . $qtv . '</td> 
                    <td class="small-cell-9 center-checkbox">
                        <a href="' . $suakh . '"><button class="btn btn-primary">Sửa</button></a>
                        
                    </td>
                    </tr>';
            } 
            ?>
        </table>
    </div>

</div>