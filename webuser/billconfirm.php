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

        .custom-th,
        .custom-td {
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
        .boxcontent1 {
            color: #333;
            padding: 10px;
            background-color: #ffffff;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border-left: 1px #ccc solid;
            border-right: 1px #ccc solid;
            border-bottom: 1px #ccc solid;
            min-height: 100px;
            padding: 20px;
        }
        .boxcontent1 h3{
            font-size: 15px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<div class="custom-container">
    <div class="frmtitle">
        <h1>Cảm ơn</h1>
    </div>
    <div class="boxcontent1">
        <h3>
            Cảm ơn quý khách đã đặt hàng!
        </h3>
    </div>
    <div class="frmtitle">
        <h1>Thông tin đơn hàng</h1>
    </div>
    <div class="boxcontent1">
        <li>Mã đơn hàng: MA
            <?= $idbill ?>
        </li>
        <li>Ngày đặt hàng:
            <?= $ngaydathang ?>
        </li>
        <li>Tổng đơn hàng:
            <?= $tongdonhang ?>
        </li>
        <li>Phương thức thanh toán:
            <?= $pttt ?>
        </li>
    </div>
    <form action="index.php?act=billconfirm" method="post">
        <div class="frmtitle">
            <h1>Thông tin người đặt hàng</h1>
        </div>
        <?php
        if (isset($bill) && is_array($bill)) {
            extract($bill);
        } ?>
        <div class="boxcontent1">
            <li>Người đặt hàng:
                <?php if (isset($name)) {
                    echo $name;
                } ?>
            </li>
            <li>Email:
                <?php if (isset($email)) {
                    echo $email;
                } ?>
            </li>
            <li>Số điện thoại:
                <?php if (isset($tel)) {
                    echo $tel;
                } ?>
            </li>
            <li>Địa chỉ:
                <?php if (isset($address)) {
                    echo $address;
                } ?>
            </li>
        </div>

        <div class="frmtitle">
            <h1>Đơn hàng</h1>
        </div>
        <table class="custom-table" border="1">
            <?php
            if (isset($billct)) {
                view_bill($billct);
            }
            ?>
        </table>
        <a href="index.php"><input type="button" class="custom-btn" value="Đóng"></a>

    </form>

    <div class="boxphai">
        <?php //include "./view/boxright.php"; ?>
    </div>

</div>