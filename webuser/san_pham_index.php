<?php

if (isset($_GET['prd'])) {
    $prd = $_GET['prd'];
    switch ($prd) {
        case 'home':
            include "webuser/home.php";
            break;

        case 'xuly':
            if (isset($_POST['tim']) && ($_POST['tim']))
            echo '<script>window.location.href = "../index.php?prd=timkiem";</script>';
            break;    

        case 'timkiem':
            if (isset($_POST['tim']) && ($_POST['tim'])){
                
            }

            
            include "webuser/listtk.php";
            break;

        case 'setpw':
            include "setpw.php";
            break;

        default:
            include "webuser/home.php";
            break;
    }
} else {
    include "webuser/home.php";
}


?>