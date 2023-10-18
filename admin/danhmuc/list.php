<div class=" fratitle colortwo">
    <h1> DANH SÁCH LOẠI HÀNG </h1>
</div>
<div class="fracontent">
    <div class="mb-3" style="margin-bottom: 20px;">
        <input type="button" class="btn btn-primary" value="Chọn tất cả" onclick="selectAll()">
        <input type="button" class="btn btn-secondary" value="Bỏ chọn tất cả" onclick="deselectAll()">
        <input type="button" class="btn btn-danger" value="Xóa các mục đã chọn">
        <a href="index.php?act=adddm&danhmuc=themdm" class="btn btn-success">
            Nhập thêm
        </a>
    </div>
    <div class="mb10 frmdsloai">
        <table class="table table-bordered  colortable">
            <tr >
                <th></th>
                <th  class="vertical-center"> MÃ LOẠI </th>
                <th class="vertical-center">TÊN LOẠI </th>
                <th class="vertical-center">HÀNH ĐỘNG</th>
            </tr>
            <?php
            $listdanhmuc = loai_select_all();
            foreach ($listdanhmuc as $loai) {
                extract($loai);
                $suadm = "index.php?act=adddm&danhmuc=sua&maloai=" . $ma_loai;
                $xoadm = "index.php?act=adddm&danhmuc=xoa&maloai=" . $ma_loai;
                echo '<tr>
                    <td class="center-checkbox small-cell-4 "><input class="large-checkbox" type="checkbox" name=" id=""></td>
                    <td class="center-checkbox small-cell-7 ">' . $ma_loai . '</td>
                    <td>' . $ten_loai . '</td> 
                    <td class="small-cell-15 center-checkbox">
                        <a href="' . $suadm . '"><button class="btn btn-primary">Sửa</button></a>
                        <a href="' . $xoadm .'"><button class="btn btn-danger">Xóa</button></a>
                    </td>
                    </tr>';
            }
            ?>
        </table>
    </div>

</div>