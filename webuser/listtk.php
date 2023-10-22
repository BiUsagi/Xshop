<?php
$tim = '';
$tim = $_GET['tim'];
// echo $_SESSION['prd'];
// echo $_SESSION['timkiem'];
// echo $_SESSION['prd'];
$ten_hh = $_GET['tim']; 
if ($ten_hh == '') {
    echo '<div class="row container" id="tenhh">';
    echo 'Vui lòng nhập từ khóa cần tìm';
} else {
    $ten_hh = '%' . $ten_hh . '%';

    // Truy vấn SQL
    $sql = "SELECT * FROM hang_hoa WHERE ten_hh LIKE '$ten_hh'";
    $result = $conn->query($sql);


    // Xử lý kết quả truy vấn

    ?>

    <div><b>Hiển thị tất cả sản phẩm liên quan đến: </b>
        <?php echo $_GET['tim'] ?>
    </div><br>
    <br>

    <div class="row container" id="tenhh">

        <?php
        if ($result->num_rows > 0) {

            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $i++;
                $ten_hh = $row["ten_hh"];
                $ma_hh = $row["ma_hh"];
                $don_gia = $row["don_gia"];
                $giam_gia = $row["giam_gia"];
                $hinh = $row["hinh"];
                $ngay_nhap = $row["ngay_nhap"];
                $mo_ta = $row["mo_ta"];
                $dac_biet = $row["dac_biet"];
                $so_luot_xem = $row["so_luot_xem"];
                $ma_loai = $row["ma_loai"];



                //hien thi
                echo '<div class="flexsp">';


                $hinhpath = "admin/sanpham/uploads/" . $hinh;
                if (is_file($hinhpath)) {
                    $img = "<a href='../index.php?prd=chitietsp&product_id= $ma_hh'><img src='" . $hinhpath . "'></a>";
                } else {
                    $img = "no photo";
                }
                echo '    <div class="boxsp mr"> ';
                echo '    <div class=" img" >' . $img . '</div> ';
                if ($giam_gia > 0) {
                    echo '    <div id="sale"></div>';
                } else {
                    echo "";
                }
                echo '<a href="../index.php?prd=chitietsp&product_id= '.$ma_hh.'">'. $ten_hh . '</a>';
                $gia_ban = $don_gia / 100 * (100 - $giam_gia);
                echo "    <div class='khung_gia'> ";
                echo "    <p class='giahh'> Giá: " . number_format($gia_ban, 0, ',', '.') . "₫ </p> ";
                if ($giam_gia > 0) {
                    $gia_goc = "Giá gốc:" . number_format($don_gia, 0, ',', '.') . "₫";
                    echo "<p class='gia_goc'> $gia_goc </p> ";
                } else {
                    echo "<p class='gia_goc'> Không giảm giá </p> ";
                }
                echo '    </div> ';
                echo   '<form action="index.php?prd=addtocart" method="post">';
                echo    '<input type="hidden" name="id" value="'.$ma_hh.'">';
                echo    '<input type="hidden" name="name" value="'. $ten_hh .'">';
                echo    '<input type="hidden" name="img" value="' . $img . '">';
                echo    '<input type="hidden" name="price" value="'.$gia_ban.'">';
                echo    '<input type="submit" value="+"  class="cart-button fa-solid fa-2xl" name="addtocart" >';
                echo    '</form>'; 
                echo '    </div> ';
                echo '    </div> ';
                if ($i == 3)
                    $i = 0;
                if ($i == 1 || $i == 2) {
                    echo '    <div class="trong"> ';
                    echo '    </div> ';
                }

            }
        } else {
            echo "Không tìm thấy kết quả.";
        }
}




// $listhh = hang_hoa_select_all();
// foreach ($listhh as $hh) {
//     extract($hh);

// }
?>




    <!-- <div class="boxsp mr">
                        <div class=" row img"> <img src="images/1.jpg" alt></div>
                        <p>30$</p>
                        <a href="#">dong ho </a>
                    </div> -->




</div>