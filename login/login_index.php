<?php

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'logout':
            include "logout.php";
            break;

        case 'login':
            include "login.php";
            break;

        case 'khachhang':
            include "khachhang/index-khachhang.php";
            break;

        case 'thonge':
            include "danhmuc/category.php";
            break;

        default:
            include "includes/login.php";
            break;
    }
} else {
    include "login/login.php";
}


?>