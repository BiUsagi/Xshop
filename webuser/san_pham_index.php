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
            if (isset($_POST['tim']) && ($_POST['tim'])) {
                echo '<script>window.location.href = "../index.php?prd=timkiem&tim=' . $_POST['tensp'] . '";</script>';
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



            include "webuser/listtk.php";
            break;

        case 'chitietsp':
            include "chitietsp.php";
            break;

        case 'xoacmt':
            $mabl = $_GET['mabl'];
            binh_luan_delete($mabl);
            include "chitietsp.php";
            break;

        case 'guicmt':
            if (isset($_POST['guicmt'])) {
                $mahhbl = $_POST['ma_hh'];
                $makhbl = $_POST['ma_kh'];
                $ngayvietbl = date('d/m/Y');
                $noidung = $_POST['binhluan'];

                // Sử dụng Prepared Statements để tránh lỗi trích dẫn chuỗi
                $sql = "INSERT INTO binh_luan (ma_hh, ma_kh, ngay_bl, noi_dung) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param("ssss", $mahhbl, $makhbl, $ngayvietbl, $noidung);

                    if ($stmt->execute()) {
                        $tbbl = "Thêm thành công!";
                    } else {
                        echo "Lỗi khi thêm bình luận: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo "Lỗi khi chuẩn bị truy vấn: " . $conn->error;
                }
            }
            // echo 1234;
            include "chitietsp.php";
            break;

            case 'chuyentrang':
                include "listdm.php";
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