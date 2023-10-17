<?php
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $product = hang_hoa_select_by_id($product_id);
} else {
    echo 'Sản phẩm không tồn tại.';
}


$gia_ban = $product['don_gia'] / 100 * (100 - $product['giam_gia']);

?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .img-cover {
        object-fit: cover;
        width: 200px;
        height: 250px;
    }

    .img-title {
        padding: 10px;
        width: 100%;
        position: relative;
        z-index: 1;
    }
    .big-text {
        font-size: 30px; 
        color: #B44D49;
        margin-right: 10px;
    }
    .gia-goc {
        font-size: 15px; 
    }
    .mgr-bot{
        margin-bottom: 20px;
    }
    .m-title{
        font-weight: bold;
        font-size: 13px; 
    }
    .big-size{
        font-size: 13px;
    }
    </style>
</head>

<body>
    <main class="container ">
        <div class="col-md-4">
            <?php
                $hinhpath = "../admin/sanpham/uploads/" . $product['hinh'];
                echo "<img src='" . $hinhpath . "' class=' img-cover'>";
                ?>

        </div>
        <div class="col-md-8">
            <div class="img-title">
                <h1 class="mgr-bot">
                    <?php echo $product['ten_hh']; ?>
                </h1>
                <p>
                    <span class="big-text"><?php echo $gia_ban . "₫"; ?></span>
                    <?php if ($product['giam_gia'] > 0) {
                            echo "<del class='gia-goc'>" . $product['don_gia'] . "₫</del>";
                        } else {
                            echo "";
                        }
                        ; ?>
                </p>
                <p class="big-size"><span class="m-title">Mô tả: </span><br>
                    <?php echo $product['mo_ta']  ?>
                </p>
                <!-- Các thông tin sản phẩm khác -->
            </div>
        </div>
    </main>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>