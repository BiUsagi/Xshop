<?php

if (isset($_GET['prd'])) {
    $prd = $_GET['prd'];
    switch ($prd) {
        case 'home':
            $_SESSION['prd'] = $_GET['prd'];
            include "webuser/home.php";
            break;

        case 'xuly':
            unset($_SESSION['timkiem']);
            // $_SESSION['timkiem'] = $_POST['tim'];
            if (isset($_POST['tim']) && ($_POST['tim'])){
            echo '<script>window.location.href = "../index.php?prd=timkiem&tim='.$_POST['tensp'].'";</script>';
            // $_SESSION['timkiem'] = $_POST['tensp'];
            // echo $_POST['tim'];
            // $_SESSION['prd'] = $_GET['prd'];
            // $_SESSION['timkiem'] = $_POST['tim'];
            include "webuser/home.php";
            break;
            }
            break;    

        case 'timkiem':
            $_SESSION['prd'] = $_GET['prd'];
            
            
          
            include "webuser/listtk.php" ;
            break;

        case 'chitietsp':
            include "chitietsp.php";
            break;

        default:
            include "webuser/home.php";
            break;
    }
} else {
    $_SESSION['prd'] = 'home    ';
    include "webuser/home.php";
}


?>