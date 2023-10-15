<?php
session_start();
include "includes/connect.php";
include "includes/dao/loai.php";
include "includes/dao/hang-hoa.php";
include "includes/dao/khach-hang.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="login/logout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
</head>


<body>
    <div class="boxcenter">

        <div class="row mb header ">
            <h1> SIÊU THỊ TRỰC TUYẾN</h1>

        </div>
        <div class="row mb menu">
            <ul>
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Giới Thiệu</a></li>
                <li><a href="#">Liên Hệ</a></li>
                <li><a href="#">Góp ý</a></li>
                <li><a href="#">Hỏi Đáp</a></li>
            </ul>
        </div>

        <div class="row mb  ">
            <div class="boxtrai mr demo">
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
                            $img = "<img src='" . $hinhpath .   "'>";
                        } else {
                            $img = "no photo";
                        }

                        echo '    <div class="boxsp mr"> ';
                        
                        echo '    <div class=" img" >'.$img.'</div> ';

                        if ($giam_gia > 0) {
                            echo '    <div id="sale"></div>';
                        }else{
                            echo "";
                        } 

                        echo '    <a href="#"> '.$ten_hh.'</a>';

                        $gia_ban = $don_gia /100 * (100-$giam_gia);

                        echo "    <div class='khung_gia'> ";
                        echo "    <p class='giahh'> Giá: $gia_ban </p> ";

                        if ($giam_gia > 0) {
                            $gia_goc = "Giá gốc: " .  $don_gia;
                            echo "<p class='gia_goc'> $gia_goc </p> ";
                        }else{
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

            </div>

            <div class="boxphai">

            
                <?php include"login/login_index.php" ?>  


                <div class="row mb">
                    <div class="boxtitle">DANH MỤC</div>
                    <div class="boxcontent2 menudoc">
                        <ul>

                            <?php
                            $listdm = loai_select_all();
                            foreach ($listdm as $dm) {
                                extract($dm);
                                echo '<li><a href="">' . $ten_loai . '</a></li>';
                            }
                            ?>

                            <!-- <li><a href="">Đồng hồ</a></li>
                                <li><a href="">Laptop</a></li>
                                <li><a href="">Điện Thoại</a></li>
                                <li><a href="">Ba Lô</a></li> -->
                        </ul>
                    </div>
                    <!-- <div class="boxfooter searbox">
                        <form action="#" method="post">
                            <input type="text" name="" id="">
                        </form>
                    </div> -->
                </div>
                <div class="row mb">
                    <div class="boxtitle">TOP 10 YÊU THÍCH</div>
                    <div class=" row boxcontent ">
                        <div class="row mb10 top10">
                            <img src="images/6.jpg" alt="">
                            <a href="#">Sir Alex</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/6.jpg" alt="">
                            <a href="#">Sir Alex</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/6.jpg" alt="">
                            <a href="#">Sir Alex</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/6.jpg" alt="">
                            <a href="#">Sir Alex</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/6.jpg" alt="">
                            <a href="#">Sir Alex</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="row mb footer ">
            Copyright o 2020
        </div>

    </div>

</body>

</html>