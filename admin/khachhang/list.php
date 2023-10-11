
<div class=" fratitle">
    <h1> DANH SÁCH KHÁCH HÀNG </h1>
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
                <th> MÃ KH </th>
                <th>Họ Tên </th>
                <th>Mật Khẩu </th>
                <th>Kich Hoat </th>
                <th>Hinh </th>
                <th>Email </th>
                <th>Vai Trò </th>
                <th>Hành Động</th>
            </tr>
            <?php
            $listkh = khach_hang_select_all();
            foreach ($listkh as $khachhang) {
                extract($khachhang);
                $suakh = "index.php?act=khachhang&khachhang=sua&maloai=" . $ma_kh;
                $xoakh = "index.php?act=khachhang&khachhanh=xoa&maloai=" . $ma_kh;
                echo '<tr>
                    <td><input type="checkbox" name=" id=""></td>
                    <td>' . $ma_kh . '</td>
                    <td>' . $ho_ten . '</td> 
                    <td>' . $mat_khau . '</td> 
                    <td>' . $kich_hoat . '</td> 
                    <td>' . $hinh . '</td> 
                    <td>' . $email . '</td> 
                    <td>' . $vai_tro . '</td> 
                    <td><a href="' . $suakh . '"><input type="button" value="Sửa"></a>   
                    <a href="' . $xoakh . '"><input type="button" value="Xóa"></a></td>
                    </tr>';
            }
            ?>
        </table>
    </div>

</div>