<div class=" fratitle colortwo ">
    <h1> DANH SÁCH KHÁCH HÀNG </h1>
</div>
<div class="fracontent">
    <div class="mb-3" style="margin-bottom: 20px;">
        <input type="button" class="btn btn-primary" value="Chọn tất cả">
        <input type="button" class="btn btn-secondary" value="Bỏ chọn tất cả">
        <input type="button" class="btn btn-danger" value="Xóa các mục đã chọn">
        <a href="index.php?act=khachhang&khachhang=home" class="btn btn-success">
            Nhập thêm
        </a>
    </div>
    <div class=" mb10 frmdsloai">
        <table class="table table-bordered  colortable">
            <tr>
                <th></th>
                <th> MÃ KH </th>
                <th>Họ Tên </th>
                <th>Mật Khẩu </th>
                <th>Trạng thái </th>
                <th>Hinh </th>
                <th>Email </th>
                <th>Vai Trò </th>
                <th>Hành Động</th>
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

                $suakh = "index.php?act=khachhang&khachhang=sua&maloai=" . $ma_kh;
                $xoakh = "index.php?act=khachhang&khachhanh=xoa&maloai=" . $ma_kh;

                if($vai_tro == 1) $qtv = "Admin";
                else $qtv = "User";

                if($kich_hoat == 1) $block = "Chặn";
                else $block = "Mở";

                echo '<tr>
                    <td><input type="checkbox" name=" id=""></td>
                    <td>' . $ma_kh . '</td>
                    <td>' . $ho_ten . '</td> 
                    <td>' . $mat_khau . '</td> 
                    <td>' . $block . '</td> 
                    <td style="width: 120px;">' . $img . '</td> 
                    <td>' . $email . '</td> 
                    <td>' . $qtv . '</td> 
                    <td>
                        <a href="' . $suakh . '"><button class="btn btn-primary">Sửa</button></a>
                        <a href="' . $xoakh .'"><button class="btn btn-danger">Xóa</button></a>
                    </td>
                    </tr>';
            } 
            ?>
        </table>
    </div>

</div>