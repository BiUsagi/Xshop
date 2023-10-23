<?php

//60, 69
session_start();
if (!isset($_SESSION['mycart']))
    $_SESSION['mycart'] = array();
// unset($_SESSION['timkiem']);
// session_destroy();
include "includes/connect.php";
include "includes/dao/loai.php";
include "includes/dao/hang-hoa.php";
include "includes/dao/khach-hang.php";
include "includes/dao/binh-luan.php";
include "includes/cart.php";





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

        <div class="row1 mb header ">
            <h1> SIÊU THỊ TRỰC TUYẾN</h1>

        </div>
        <div class="row1 mb menu">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="#">Giới Thiệu</a></li>
                <li><a href="#">Liên Hệ</a></li>
                <li><a href="#">Góp ý</a></li>
                <li><a href="#">Hỏi Đáp</a></li>
                <li id="search">
                    <!-- chuyển trang sau khi tìm kiếm -->

                    
                    <form action="webuser/san_pham_index.php?prd=xuly" method="post" enctype="multipart/form-data">
                        <input type="text" name="tensp"> 
                        <input type="submit" name="tim" value="Tìm kiếm">
                    </form>
                    
                </li>
            </ul>
        </div>

        <div class="row1 mb  ">
            <div class="boxtrai mr demo">

                <?php
                    include "webuser/san_pham_index.php";
                    // echo $_SESSION['prd'];
                ?>

            </div>

            <div class="boxphai">

                
                 
                <?php 
                include "login/login_index.php" ;
                //  if(!isset($_SESSION["user"])){
                //     include "login/login_index.php?";
                //  }
                //  else{ 
                //     echo $_SESSION["user"];
                //     include "login/login_index.php?act=logout?makh=".$_SESSION["user"];
                //  }
                // echo $_SESSION['act']; 
                ?>

                <div class="row1 mb">
                    <div class="boxtitle">DANH MỤC</div>
                    <div class="boxcontent2 menudoc">
                        <ul>

                            <?php
                            $listdm = loai_select_all();
                            foreach ($listdm as $dm) {
                                extract($dm);
                                if($ma_loai == 1) continue;

                                $chuyentrang = "index.php?prd=chuyentrang&maloai=".$ma_loai;
                                echo '<li><a href=" '.$chuyentrang.' ">' . $ten_loai . '</a></li>';
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
                <div class="row1 mb">
                    <div class="boxtitle">TOP 10 YÊU THÍCH</div>

                    
                    <div class=" row1 boxcontent ">

                            <?php
                                $top10 = hang_hoa_select_top10();
                                foreach ($top10 as $sptop10) {
                                    extract($sptop10);


                                    $hinhpath = "admin/sanpham/uploads/" . $hinh;
                                    if (is_file($hinhpath)) {
                                        $img = "<a href='../index.php?prd=chitietsp&product_id= $ma_hh'><img src='" . $hinhpath . "' style='width:30px; height:30px;></a>";
                                    } else {
                                        $img = "no photo";
                                    }

                                    echo '<div class="row1 mb10 top10">';
                                    echo  $img;
                                    echo "<a href='123'> $ten_hh </a>";
                                    echo '</div> ';
                                }
                            ?>


                        <!-- <div class="row1 mb10 top10">
                            <img src="images/6.jpg" alt="">
                            <a href="#">Sir Alex</a>
                        </div> -->
                        


                    </div>
                    

                </div>
            </div>

        </div>
        <!-- <div class="row1 mb footer ">
            Copyright o 2020
        </div> -->

        <div class="footernew row1 mb footer">
            Copyright o 2020
        </div>

    </div>

</body>

</html>
