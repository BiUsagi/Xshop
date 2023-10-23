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
            padding: 20px;
            background-color: #fff;
        }
        .custom-td-title{
            font-size: 15px; /* Tăng kích thước chữ trong tiêu đề */
            font-weight: bold;
            text-align: center; /* Căn giữa tiêu đề */
        }

        .custom-cart-title {
            font-size: 28px; /* Tăng kích thước chữ trong tiêu đề */
            font-weight: bold;
            padding: 10px 0;
            text-align: center; /* Căn giữa tiêu đề */
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
            font-size: 13px; /* Tăng kích thước chữ trong thẻ th */
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
            margin-top: 3vh;
        }
        .custom-btn-danger1 {
            color: #fff;
            background-color: #FF0000;
        }

        .custom-btn-danger1:hover {
            background-color: #a30000;
        }

        .custom-btn:hover {
            background-color: #0056b3;
        }

        /* Căn giữa tất cả thành phần trong bảng */
        .custom-th, .custom-td, .custom-btn, .custom-btn-danger {
            vertical-align: middle;
        }

        .custom-btn-danger {
            background-color: #FF0000;
            color: #fff;
            padding: 5px 10px; /* Điều chỉnh kích thước của nút "Xóa" */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .custom-btn-danger:hover {
            background-color: #a30000;
        }
      
    </style>
</head>

<?php //session_destroy(); ?>

<body>
    <div class="custom-container">
        <div class="custom-cart-title">GIỎ HÀNG</div>
        <table class="custom-table" border="1">
            <?php
            viewcart(1);
            ?>
        </table>
        <a href="index.php?prd=bill">
            <input type="submit" class="custom-btn" value="ĐẶT HÀNG">
        </a>
        <a href="index.php?prd=delcart">
            <input type="button" class="custom-btn custom-btn-danger1" value="XÓA GIỎ HÀNG">
        </a>
    </div>
</body>