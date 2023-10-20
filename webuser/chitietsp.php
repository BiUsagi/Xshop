<?php
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $product = hang_hoa_select_by_id($product_id);
    hang_hoa_tang_so_luot_xem($product_id);
} else {
    echo 'Sản phẩm không tồn tại.';
}
$bienxoa = $_GET['product_id'];


$gia_ban = $product['don_gia'] / 100 * (100 - $product['giam_gia']);

?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .img-cover {
            object-fit: cover;
            width: 260px;
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

        .mgr-bot {
            margin-bottom: 20px;
        }

        .m-title {
            font-weight: bold;
            font-size: 13px;
        }

        .big-size {
            font-size: 13px;
        }

        /* CSS cho phần bình luận */
        .comment-container {
            border: 1px solid #ccc;
            margin: 10px 0;
            padding: 10px;
            position: relative;
        }

        .comment-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            /* Chiều rộng của đường thẳng trên */
            background: #ccc;
            z-index: -1;
        }

        .user-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            float: left;
            margin-right: 10px;
            object-fit: cover;
        }

        .user-info {
            width: 87%;
            float: right;
        }

        .user-name {
            font-weight: bold;
            font-size: 13px;
        }

        .comment-date {
            color: #777;
        }

        .comment-content {
            float: left;
            margin-top: 5px;
            font-size: 13px;
        }

        .giaifl {
            clear: both;
        }
    </style>
</head>

<body>
    <main class="container mt-4 ">
        <div class="col-md-5">
            <?php
            $hinhpath = "../admin/sanpham/uploads/" . $product['hinh'];
            echo "<img src='" . $hinhpath . "' class=' img-cover'>";
            ?>

        </div>
        <div class="col-md-7">
            <div class="img-title">
                <h1 class="mgr-bot">
                    <?php echo $product['ten_hh']; ?>
                </h1>
                <p>
                    <span class="big-text">
                        <?php echo number_format($gia_ban, 0, ',', '.') . "₫"; ?>
                    </span>
                    <?php if ($product['giam_gia'] > 0) {
                        echo "<del class='gia-goc'>" . number_format($product['don_gia'], 0, ',', '.') . "₫</del>";
                    } else {
                        echo "";
                    }
                    ; ?>
                </p>
                <p class="big-size"><span class="m-title">Loại: </span>
                    <?php
                    $bloai = loai_select_by_id($product['ma_loai']);
                    echo $bloai['ten_loai'];
                    ?>
                </p>



                <p class="big-size"><span class="m-title">Mô tả: </span><br>
                    <?php echo $product['mo_ta'];
                    if ($product['mo_ta'] == '')
                        echo "Không có mô tả.";
                    ?>
                </p>

                <!-- Thêm nút "Thêm vào giỏ hàng" và "Mua ngay" -->
                <div class="btn-group">
                    <button class="btn btn-primary btn-lg">Thêm vào giỏ hàng</button>
                    <div class="mx-2"></div> <!-- Thêm khoảng cách giữa hai nút -->
                    <button class="btn btn-success btn-lg">Mua ngay</button>
                </div>


            </div>
        </div>
    </main>
    <!-- Form bình luận -->
    <div class="container mt-4">
        <h2>Bình luận sản phẩm</h2>
        <div class="col-md-12">
            <form action="index.php?prd=guicmt&product_id=<?php echo $_GET['product_id'] ?>" method="post">
                <!-- <div class="form-group">
                        <label for="ten">Tên:</label>
                        <input type="text" class="form-control" id="ten" name="ten" required>
                    </div> -->

                <?php
                if (isset($_SESSION['user'])) {
                    ?>
                    <input type="hidden" name="ma_hh" value="<?php echo $_GET['product_id'] ?>">
                    <input type="hidden" name="ma_kh" value="<?php echo $_SESSION['user'] ?>">
                    <!-- <?php echo $_SESSION['user'] ?> -->
                    <input type="hidden" name="ngay_bl" value="<?php date('d/m/Y') ?>">


                    <div class="form-group">
                        <label for="binhluan">Bình luận:</label>
                        <textarea class="form-control" id="binhluan" name="binhluan" rows="4" required></textarea>
                    </div>
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <button type="submit" class="btn btn-primary" name="guicmt">Gửi bình luận</button>
                    <?php
                    if (isset($tbbl))
                        echo "<div><br> $tbbl </div>";
                    ?>
                    <?php
                } else { ?>

                    <div class="form-group">
                        <label for="binhluan">Bình luận:</label>
                        <textarea class="form-control" id="binhluan" name="binhluan" rows="4" required></textarea disabled>
                                            </div>
                                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                            <button type="submit" class="btn btn-primary" disabled>Đăng nhập mới có thể bình luận</button>

                                    <?php
                } ?>

                        <div >
                            <?php
                            $listcmt = binh_luan_select_by_hang_hoa($_GET['product_id']);

                            $i = 1;
                            foreach ($listcmt as $cmt) {
                                $i = 0;
                                extract($cmt);
                                // echo $ma_kh;
                                $khbl = khach_hang_select_by_id($ma_kh);
                                $makh = $ma_kh;
                                extract($khbl);

                                $hinhpath = "../admin/khachhang/uploads/" . $hinh;
                                $imgkh = "<img class='user-avatar' src='" . $hinhpath . "' class='anhkh'>";
                                ?>
                                <div class="comment-container">
                                    <div>
                                        <?php echo $imgkh ?>
                                    </div>
                                    <div class="user-info">
                                        <div class="user-name"><?php echo $ho_ten ?></div>
                                        <div class="comment-date">
                                            Đăng ngày: <?php echo $ngay_bl ?> 
                                            <?php $xoabl = "index.php?prd=xoacmt&mabl=$ma_bl&product_id=$bienxoa";
                                            if (isset($_SESSION['user'])) {
                                                if ($makh == $_SESSION['user']) {
                                                    echo '<a href="' . $xoabl . '"> - Xóa</a>';
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="comment-content"><?php echo $noi_dung ?></div>
                                    </div>
                                <div class="giaifl"></div>
                                
                                </div>
                                <?php
                            }
                            if ($i == 1)
                                echo "Không có bình luận";
                            ?>
                            
                        </div>



                   
                </form>
            </div>
    </div>
    

    <?php
    // include "binh_luan.php";
    ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>