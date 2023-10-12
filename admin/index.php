<?php
include "dao/pdo.php";
include "includes/connect.php";


?>

<!-- Header -->
<?php include "includes/admin_header.php"; ?>
<!-- End Header -->

<div id="wrapper">

    <!-- Navigation - thanh bên -->
    <?php include "includes/admin_navigation.php"; ?>
    <!-- End Navigation-->

    <?php

    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'adddm':
                include "danhmuc/index-danhmuc.php";
                break;

            case 'addhh':
                include "sanpham/index-hanghoa.php";
                break;

            case 'khachhang':
                include "khachhang/index-khachhang.php";
                break;

            case 'thonge':
                include "danhmuc/category.php";
                break;

            default:
                include "includes/admin_home.php";
                break;
        }
    } else {
        include "includes/admin_home.php";
    }


    ?>










    <!-- footer -->
    <?php include "includes/admin_footer.php"; ?>
    <!-- end footer -->