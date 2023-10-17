<?php
    if (isset($_POST['tim']) && ($_POST['tim'])) {
        echo '<script>window.location.href = "timkiemsp.php&tim=' . $_POST['tensp'] . '";</script>';
        // $tim = $_POST['tim'];
    }
    
?>