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

        case "viewcart":
            include "viewcart.php";
            break;

        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = 1;
                $thanhtien = $soluong * $price;
                $spadd = [$id, $name, $img, $price, $soluong, $thanhtien];
                array_push($_SESSION['mycart'], $spadd);
            }   
            include "viewcart.php";
            break;
        case "delcart":
            if (isset($_GET['idcart'])) {
                $idcart = $_GET['idcart'];
                if (isset($_SESSION['mycart'][$idcart])) {
                    unset($_SESSION['mycart'][$idcart]); // Xóa sản phẩm ra khỏi mảng
                }
            }else{
                $_SESSION['mycart'] = array();
            }
            // Làm cho các chỉ số trong mảng liên tiếp lại
            $_SESSION['mycart'] = array_values($_SESSION['mycart']);
            // include "viewcart.php";
            header('Location: index.php?prd=viewcart');
            break;
        case 'bill':
            include 'bill.php';
            break;

        case 'billconfirm':
            // Kiểm tra xem có dữ liệu trong phiên hay không
            if (isset($_POST['dongydathang'])&&$_POST['dongydathang']) {
                if(isset($_SESSION['user'])) $iduser = $_SESSION['user'];
                else $iduser = 0;
                $name = $_POST['ho_ten'];
                $email =  $_POST['email'];
                $address =  $_POST['dia_chi'];
                $tel =  $_POST['sdt'];
                $ngaydathang = date('h:i:sa d/m/Y');
                $tongdonhang = tongdonhang();
                $pttt = $_POST['pttt'];
                $idbill = 0;
                $idbill = insert_bill($iduser, $name, $email, $address, $tel,$pttt, $ngaydathang, $tongdonhang);
                $ma_kh = $_SESSION['user'];

                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($ma_kh, $cart[0], $cart[2],$cart[1], $cart[3], $cart[4], $cart[5], $idbill );
                }


                $_SESSION['cart'] = array();

            }
            $listbill = loadone_bill($idbill);
            $billct = loadall_cart($idbill);
            include 'billconfirm.php';;
            break;  
        case 'mybill':
            $listbill = loadall_bill($_SESSION['user']);
            include 'mybill.php';
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