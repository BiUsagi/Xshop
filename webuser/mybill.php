<head>
    <style>
        .frmtitle {
            color: black;
            text-align: center;
            margin-bottom: 20px;
        }

        .custom-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }

        .custom-td-title {
            font-size: 15px;
            font-weight: bold;
            text-align: center;
        }

        .custom-cart-title {
            font-size: 20px; /* Tăng kích thước chữ trong tiêu đề */
            font-weight: bold;
            padding: 10px 0;
            text-align: center; /* Căn giữa tiêu đề */
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            /* Thêm dòng này để căn giữa bảng */
        }

        .custom-th,
        .custom-td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .custom-th {
            background-color: #333;
            color: #fff;
            font-size: 13px;
        }

        .custom-tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Căn giữa tất cả thành phần trong bảng */
        .custom-th,
        .custom-td {
            vertical-align: middle;
        }
    </style>
</head>
<div class="custom-container">
    <div class="frmtitle custom-cart-title">
        DANH SÁCH ĐƠN HÀNG
    </div>
    <table class="custom-table" border="1">
        <tr>
            <th class="custom-th">Mã đơn hàng</th>
            <th class="custom-th">Ngày đặt</th>
            <th class="custom-th">Số lượng hàng</th>
            <th class="custom-th">Tổng giá trị</th>
            <th class="custom-th">Tình trạng đơn hàng</th>
        </tr>
        <?php
        if (is_array($listbill)) {
            foreach ($listbill as $bill) {
                extract($bill);
                $sl_mh = get_sl_mh($id);


                // Ánh xạ giá trị $bill_status sang văn bản tương ứng
                $status_text = '';
                switch ($bill_status) {
                    case 0:
                        $status_text = 'Đơn hàng mới';
                        break;
                    case 1:
                        $status_text = 'Đang xử lý';
                        break;
                    case 2:
                        $status_text = 'Đang giao hàng';
                        break;
                    case 3:
                        $status_text = 'Thành công';
                        break;
                    default:
                        $status_text = 'Không rõ';
                }

                echo '<tr>
                                                    <td class="custom-td">' . $id . '</td>
                                                    <td class="custom-td">' . $ngaydathang . '</td>
                                                    <td class="custom-td">' . $sl_mh . '</td>
                                                    <td class="custom-td">' . number_format($total, 0, ',', '.') . '₫ </td>
                                                    <td class="custom-td">' . $status_text . '</td>
                                                </tr>';
            }
        }
        ?>
    </table>
</div>