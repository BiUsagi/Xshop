<?php
include "includes/connect.php";
include "includes/dao/loai.php";
include "includes/dao/hang-hoa.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
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
                <div class="row">

                    <?php

                    $listhh = hang_hoa_select_all();
                    foreach ($listhh as $hh) {
                        extract($hh);


                        $hinhpath = "admin/sanpham/uploads/" . $hinh;
                        if (is_file($hinhpath)) {
                            $img = "<img src='" . $hinhpath . "' height = '50' >";
                        } else {
                            $img = "no photo";
                        }

                        echo '    <div class="boxsp mr"> ';
                        echo '     <div class=" row img">'.$img.'</div> ';
                        echo "     <p> Price:  '.$don_gia.'</p> ";
                        echo '    <a href="#"> name: '.$ten_hh.'</a> ';
                        echo '     </div> ';
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
                <div class="row mb">
                    <div class="boxtitle">TAI KHOAN</div>
                    <div class="boxcontent fomttaikhoan">

                        <form action="#" method="post">
                            <div class="row mb10">
                                Ten Dang Nhap <br>


                                <input type="text" name="user" id=""><br>
                            </div>
                            <div class="row mb10">
                                Mat Khau
                                <input type="password" name="pass" id=""> <br>
                            </div>
                            <div class="row mb10">

                                <input type="checkbox" name="" id=""> Ghi nho tai khoan?
                            </div>
                            <div class="row mb10">
                                <input type="submit" value="dang nhap" id=""><br>
                            </div>

                        </form>
                        <li><a href="#">Quen mat khau</a></li>
                        <li><a href="#">Dang Ky thanh vien</a></li>
                    </div>

                </div>
                <div class="row mb">
                    <div class="boxtitle">DANH MUC</div>
                    <div class="boxcontent2 menudoc">
                        <ul>

                            <?php
                            $listdm = loai_select_all();
                            foreach ($listdm as $dm) {
                                extract($dm);
                                echo '<li><a href="">' . $ten_loai . '</a></li>;';
                            }
                            ?>

                            <!-- <li><a href="">Đồng hồ</a></li>
                                <li><a href="">Laptop</a></li>
                                <li><a href="">Điện Thoại</a></li>
                                <li><a href="">Ba Lô</a></li> -->
                        </ul>
                    </div>
                    <div class="boxfooter searbox">
                        <form action="#" method="post">
                            <input type="text" name="" id="">
                        </form>
                    </div>
                </div>
                <div class="row mb">
                    <div class="boxtitle">TOP 10 YEU THICH</div>
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