<head>
    <style>
        img {
            max-width: 150px;
            max-height: 180px;
            object-fit: cover;
        }

        .custom-container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
        }

        .frmtitle {
            margin-top: 20px;
        }

        .frmtitle h1 {
            font-size: 15px;
            font-weight: bold;
            text-align: center;
        }

        .custom-form {
            width: 100%;
            margin: 20px 0;
        }

        .custom-form table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .custom-form input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .custom-form input[type="radio"] {
            margin-right: 10px;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-th, .custom-td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .custom-th {
            background-color: #333;
            color: #fff;
        }

        .custom-tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .custom-btn {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            margin: 3vh auto;
        }

        .custom-btn:hover {
            background-color: #0056b3;
        }

     
    </style>
</head>

<body>
    <div class="custom-container">
        <form action="index.php?prd=billconfirm" method="post">
            <div class="frmtitle">
                <h1>Thông tin đặt hàng</h1>
            </div>
            <div class="custom-form">
                <table>
                    <tr>
                        <td>Người đặt hàng</td>
                        <td><input type="text" name="ho_ten" id="" value="" required></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" id="" value="" required></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td><input type="text" name="sdt" id="" value="" required></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td><input type="text" name="dia_chi" id="" required></td>
                    </tr>
                </table>
            </div>
            <div class="frmtitle">
                <h1>Phương thức thanh toán</h1>
            </div>
            <div class="custom-form">
                <table>
                    <tr>
                        <td><input type="radio" name="pttt" value="Thanh toán khi nhận hàng" checked>Thanh toán khi nhận
                            hàng</td>
                        <td><input type="radio" name="pttt" value="Chuyển khoản ngân hàng" id="">Chuyển khoản ngân
                            hàng</td>
                        <td><input type="radio" name="pttt" value="Thanh toán online" id="">Thanh toán online</td>
                    </tr>
                </table>
            </div>
            <div class="frmtitle">
                <h1>Đơn hàng</h1>
            </div>
            <table class="custom-table" border="1">
                <?php
                viewcart(0);
                ?>
            </table>
            <a href="index.php?prd=billconfirm">
                <input type="submit" name="dongydathang" class="custom-btn" value="ĐỒNG Ý ĐẶT HÀNG">
            </a>
        </form>
    </div>
</body>