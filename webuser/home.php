<div class="row">
    <div class="banner n1">
        <img src="images/banner.png" alt>
    </div>
</div>



<div class="row container" id="tenhh">

    <?php

    $listhh = hang_hoa_select_all();
    foreach ($listhh as $hh) {
        extract($hh);
        echo '<div class="flexsp">';


        $hinhpath = "admin/sanpham/uploads/" . $hinh;
        if (is_file($hinhpath)) {
            $img = "<img src='" . $hinhpath . "'>";
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

        echo '    <a href="#"> ' . $ten_hh . '</a>';

        $gia_ban = $don_gia / 100 * (100 - $giam_gia);

        echo "    <div class='khung_gia'> ";
        echo "    <p class='giahh'> Giá: $gia_ban </p> ";

        if ($giam_gia > 0) {
            $gia_goc = "Giá gốc: " . $don_gia;
            echo "<p class='gia_goc'> $gia_goc </p> ";
        } else {
            echo "<p class='gia_goc'> Không giảm giá </p> ";
        }


        echo '    </div> ';
        echo ' <div> <a href="# "class="cart-button"><i class="fa-solid fa-cart-plus fa-2xl "></i></a>  </div>';
        echo '    </div> ';
        echo '    </div> ';
    }
    ?>




    <!-- <div class="boxsp mr">
                        <div class=" row img"> <img src="images/1.jpg" alt></div>
                        <p>30$</p>
                        <a href="#">dong ho </a>
                    </div> -->




</div>