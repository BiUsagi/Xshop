<?php
function viewcart($dell)
{
    $tong = 0;
    $i = 0;
    if ($dell == 1) {
        $xoasp_th = '<th>Thao tác</th>';
        $xoasp_td2 = '<td></td>';
    } else {
        $xoasp_th = '';
        $xoasp_td2 = '';
    }
    echo ' <tr>
                                <th>Hình</th>
                                <th>Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                ' . $xoasp_th . '
                                </tr>';

    foreach ($_SESSION['mycart'] as $cart) {
        $thanhtien = $cart[3] * $cart[4];
        $tong = $tong + $thanhtien;
        if ($dell == 1) {
            $xoasp_td = '<td><a href="index.php?prd=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a></td>';
        } else {
            $xoasp_td = '';
        }


        echo '<tr>';
        echo '<td> ' . $cart[2] . '</td>';
        echo '<td>' . $cart[1] . '</td>';
        echo '<td>' . $cart[3] . '</td>';
        echo '<td>' . $cart[4] . '</td>';
        echo '<td>' . $cart[5] . '</td>';
        echo '<td>' . $xoasp_td . '</td>';
        echo '</tr> ';
        $i += 1;
    }

    echo '<tr> 
                                <td colspan="4">Tổng đơn hàng</td>
                                <td>' . $tong . '</td>
                                ' . $xoasp_td2 . '
                                <td></td>
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



     
function insert_bill($name, $email, $address, $tel,$pttt, $ngaydathang, $tongdonhang){
    $sql = "INSERT INTO bill(bill_name, bill_email, bill_address, bill_tel, bill_pttt, ngaydathang,total) VALUES ('$name', '$email', '$address', '$tel','$pttt', '$ngaydathang', '$tongdonhang')";
    return pdo_execute_return_lastIsertId($sql);
}
function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill) {
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







function loadone_bill($id){
    $sql = "SELECT * FROM bill WHERE id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadall_cart($id){
    $sql = "SELECT * FROM cart WHERE idbill=" . $id;
    $bill = pdo_query($sql);
    return $bill;
}


function view_bill($listbill){ //bill chi tiet
    $tong = 0;
    $i = 0;
    echo ' <tr>
                                <th>Hình</th>
                                <th>Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                </tr>';

    foreach ($listbill as $cart) {
        $tong = $tong + $cart['price'];
       
        echo '<tr>';
        echo '<td> ' . $cart['img'] . '</td>';
        echo '<td>' . $cart['name'] . '</td>';
        echo '<td>' . $cart['price'] . '</td>';
        echo '<td>' . $cart['soluong'] . '</td>';
        echo '<td>' . $cart['thanhtien'] . '</td>';
        echo '</tr> ';
        $i += 1;
    }

    echo '<tr> 
                                <td colspan="4">Tổng đơn hàng</td>
                                <td>' . $tong . '</td>
                                </tr>';
}
?>