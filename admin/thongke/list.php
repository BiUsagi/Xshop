<div class=" fratitle colortwo ">
    <h1>THỐNG KÊ</h1>
</div>
<div class="fracontent">
    <h5 style="color: white; margin-top: 40px;">Thống kê loại hàng</h5>
    <div class=" mb10 frmdsloai">
        <table class="table table-bordered  colortable">
            <tr>
                <!-- <th></th> -->
                <th class="vertical-center">Mã Loại Hàng </th>
                <th class="vertical-center">Tên Loại Hàng </th>
                <th class="vertical-center">Số Lượng</th>
                <th class="vertical-center">Giá Thấp Nhất</th>
                <th class="vertical-center">Giá Cao Nhất</th>
                <th class="vertical-center">Giá Trung Bình</th>
            </tr>


            <?php
                $list = thong_ke_hang_hoa();
                foreach ($list as $tk) {
                    extract($tk);
                    if($ma_loai == 1) continue;
                    echo '<tr>';
                    echo '<th> '.$ma_loai.' </th>';
                    echo '<th> '.$ten_loai.' </th>';
                    echo '<th> '.$so_luong.' </th>';
                    echo '<th> '.$gia_min.' </th>';
                    echo '<th> '.$gia_max.' </th>';
                    echo '<th> '.$gia_avg.' </th>';
                    echo '</tr>';
                    }
                
            ?>
         
        </table>
    </div>



</div>






