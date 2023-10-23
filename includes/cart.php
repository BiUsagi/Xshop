<?php
function viewcart($dell)
{
    $tong = 0;
    $i = 0;
    if ($dell == 1) {
        $xoasp_th = '<th class="custom-th">Thao tác</th>';

        echo ' <tr>
        <th class="custom-th">Hình</th>
        <th class="custom-th">Sản phẩm</th>
        <th class="custom-th">Đơn giá</th>
        <th class="custom-th">Số lượng</th>
        <th class="custom-th">Thành tiền</th>
        ' . $xoasp_th . '
        </tr>';
    } else {
        echo ' <tr>
        <th class="custom-th">Hình</th>
        <th class="custom-th">Sản phẩm</th>
        <th class="custom-th">Đơn giá</th>
        <th class="custom-th">Số lượng</th>
        <th class="custom-th">Thành tiền</th>
        </tr>';
    }


    foreach ($_SESSION['mycart'] as $cart) {
        $thanhtien = $cart[3] * $cart[4];
        $tong = $tong + $thanhtien;
        if ($dell == 1) {
            $xoasp_td = '<a href="index.php?prd=delcart&idcart=' . $i . '"><input type="button" value="Xóa" class="custom-btn-danger"></a>';
            echo '<tr>';
            echo '<td class="custom-td"> ' . $cart[2] . '</td>';
            echo '<td class="custom-td"> ' . $cart[1] . '</td>';
            echo '<td class="custom-td">' . number_format($cart[3], 0, ',', '.') . '₫ </td>';
            echo '<td class="custom-td">' . $cart[4] . '</td>';
            echo '<td class="custom-td">' . number_format($cart[5], 0, ',', '.') . '₫ </td>';
            echo '<td class="custom-td">' . $xoasp_td . '</td>';
            echo '</tr> ';
        } else {
            echo '<tr>';
            echo '<td class="custom-td"> ' . $cart[2] . '</td>';
            echo '<td class="custom-td"> ' . $cart[1] . '</td>';
            echo '<td class="custom-td">' . number_format($cart[3], 0, ',', '.') . '₫ </td>';
            echo '<td class="custom-td">' . $cart[4] . '</td>';
            echo '<td class="custom-td">' . number_format($cart[5], 0, ',', '.') . '₫ </td>';
            echo '</tr> ';
        }
        $i += 1;
    }

    echo '<tr> 
                                <td colspan="4" class="custom-td custom-td-title">Tổng đơn hàng</td>';
    echo '<td class="custom-td">' . number_format($tong, 0, ',', '.') . '₫ </td>';
    if ($dell == 1) {
        echo '<td class="custom-td"></td>';
    }
    echo '</tr>';
}

function view_bill($listbill)
{ //bill chi tiet
    $tong = 0;
    $i = 0;
    echo ' <tr>
                                <th  class="custom-th">Hình</th>
                                <th  class="custom-th">Sản phẩm</th>
                                <th  class="custom-th">Đơn giá</th>
                                <th  class="custom-th">Số lượng</th>
                                <th  class="custom-th">Thành tiền</th>
                                </tr>';

    foreach ($listbill as $cart) {
        $tong = $tong + $cart['price'];

        echo '<tr>';
        echo '<td class="custom-td"> ' . $cart['img'] . '</td>';
        echo '<td class="custom-td">' . $cart['name'] . '</td>';
        echo '<td class="custom-td">' . number_format($cart['price'], 0, ',', '.') . '₫ </td>';
        echo '<td class="custom-td">' . $cart['soluong'] . '</td>';
        echo '<td class="custom-td">' . number_format($cart['thanhtien'], 0, ',', '.') . '₫ </td>';
        echo '</tr> ';
        $i += 1;
    }

    echo '<tr> 
                                <td colspan="4" class="custom-td custom-td-title">Tổng đơn hàng</td>';
    echo '<td class="custom-td">' . number_format($tong, 0, ',', '.') . '₫ </td>
                                </tr>';
}


function tongdonhang()
{
    $tong = 0;

    foreach ($_SESSION['mycart'] as $cart) {
        $thanhtien = $cart[3] * $cart[4];
        $tong = $tong + $thanhtien;
    }
    return $tong;
}




function insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "INSERT INTO bill(iduser, bill_name, bill_email, bill_address, bill_tel, bill_pttt, ngaydathang,total) VALUES ('$iduser','$name', '$email', '$address', '$tel','$pttt', '$ngaydathang', '$tongdonhang')";
    return pdo_execute_return_lastIsertId($sql);
}
function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
{
    try {
        $conn = pdo_get_connection();
        $sql = "INSERT INTO cart (ma_kh, ma_hh, img, name, price, soluong, thanhtien, idbill) VALUES (:ma_kh, :ma_hh, :img, :name, :price, :soluong, :thanhtien, :idbill)";
        $stmt = $conn->prepare($sql);

        // Kiểm tra xem Prepared Statements đã chuẩn bị thành công chưa
        if ($stmt) {
            // Bind các giá trị vào truy vấn
            $stmt->bindParam(':ma_kh', $iduser);
            $stmt->bindParam(':ma_hh', $idpro);
            $stmt->bindParam(':img', $img);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':soluong', $soluong);
            $stmt->bindParam(':thanhtien', $thanhtien);
            $stmt->bindParam(':idbill', $idbill);

            // Thực hiện truy vấn
            $stmt->execute();
        } else {
            $errorInfo = $conn->errorInfo();
            echo "Lỗi khi chuẩn bị truy vấn: " . $errorInfo[2];
        }
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}







function loadone_bill($id)
{
    $sql = "SELECT * FROM bill WHERE id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadall_cart($id)
{
    $sql = "SELECT * FROM cart WHERE idbill=" . $id;
    $bill = pdo_query($sql);
    return $bill;
}

function loadall_bill($iduser)
{
    $sql = "SELECT * FROM bill WHERE iduser=" . "'$iduser'";
    $listbill = pdo_query($sql);
    return $listbill;
}

function get_ttdh($status)
{
    switch ($status) {
        case 0:
            $status = "Đơn hàng mới";
            break;
        case 1:
            $status = "Đang xử lý";
            break;
        case 2:
            $status = "Đang giao hàng";
            break;
        case 3:
            $status = "Hoàn tất";
            break;
        default:
            $status = "Đơn hàng mới";
            break;  
    }
    return $status;
}

function get_sl_mh($sl){
    $sql = "SELECT * FROM cart WHERE idbill=" . $sl;
    $check = pdo_query($sql);
    return sizeof($check);
}



?>