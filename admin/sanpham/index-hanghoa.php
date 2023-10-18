<?php include "includes/connect.php"; ?>
<?php include "dao/hang-hoa.php"; ?>
<?php include "dao/loai.php"; ?>

<div id="page-wrapper" class="full-height bg-white">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">

            <?php


            if (isset($_GET['hanghoa'])) {
                $hanghoa = $_GET['hanghoa'];
                switch ($hanghoa) {
                    /* Quản trị sản phẩm */
                    case 'addsp':
                        if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                            $ten_hh = $_POST['ten_hh'];
                            $don_gia = $_POST['don_gia'];
                            $giam_gia = $_POST['giam_gia'];
                            $hinh = $_FILES['hinh']['name'];
                            $target_dir = dirname(__FILE__) . '/uploads/';
                            $target_file = $target_dir . basename($_FILES["hinh"]["name"]);

                            if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                                // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                            } else {
                                // echo "Sorry, there was an error uploading your file.";
                            }


                            $ma_loai = $_POST['ma_loai'];
                            $ngay_nhap = date('d/m/Y');
                            $mo_ta = $_POST['mo_ta'];
                            $so_luot_xem = 1;
                            $dac_biet = 1;

                            hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta);

                        }
                        $listhanghoa = loai_select_all();
                        // var_dump($listhanghoa);
                        include "sanpham/add.php";
                        break;

                    case 'listsp':
                        include "sanpham/list.php";
                        break;

                    case 'xoasp':
                        if (isset($_GET['mahh']) && ($_GET['mahh'] > 0)) {
                            try {
                                $db_host = "localhost";
                                $db_name = "xshop";
                                $db_user = "root";
                                $db_pass = "";

                                // Kết nối đến cơ sở dữ liệu
                                $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                // Bắt đầu giao dịch
                                $conn->beginTransaction();

                                // Xóa tất cả bình luận của hàng hóa
                                $ma_hh = $_GET['mahh']; // Đặt mã hàng hóa cần xóa
                                $sql_delete_comments = "DELETE FROM binh_luan WHERE ma_hh = :ma_hh";
                                $stmt = $conn->prepare($sql_delete_comments);
                                $stmt->bindParam(':ma_hh', $ma_hh, PDO::PARAM_INT);
                                $stmt->execute();

                                // Tiến hành xóa hàng hóa
                                $sql_delete_hang_hoa = "DELETE FROM hang_hoa WHERE ma_hh = :ma_hh";
                                $stmt = $conn->prepare($sql_delete_hang_hoa);
                                $stmt->bindParam(':ma_hh', $ma_hh, PDO::PARAM_INT);
                                $stmt->execute();

                                // Commit giao dịch
                                $conn->commit();

                                echo "Xóa hàng hóa thành công!";
                            } catch (PDOException $e) {
                                // Nếu có lỗi, rollback giao dịch
                                $conn->rollBack();
                                echo "Lỗi: " . $e->getMessage();
                            }
                        }
                        include "sanpham/list.php";
                        break;



                    case 'suasp':

                        if (isset($_GET['mahh']) && ($_GET['mahh'] > 0)) {
                            $sp = hang_hoa_select_by_id($_GET['mahh']);
                        }


                        include "sanpham/update.php";
                        break;


                    case 'updatesp':
                        if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                            $ma_loai = $_POST['ma_loai'];
                            $ten_hh = $_POST['ten_hh'];
                            $ma_hh = $_POST['ma_hh'];
                            $don_gia = $_POST['don_gia'];
                            $giam_gia = $_POST['giam_gia'];

                            //để tạm
                            $so_luot_xem = 1;
                            $dac_biet = 1;

                            $hinh = $_FILES['hinh']['name'];
                            $target_dir = dirname(__FILE__) . '/uploads/';
                            $target_file = $target_dir . basename($_FILES["hinh"]["name"]);

                            if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                                // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                            } else {
                                // echo "Sorry, there was an error uploading your file.";
                            }

                            $ngay_nhap = date('d/m/Y');
                            $mo_ta = $_POST['mo_ta'];

                            // hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta);
            

                            if ($hinh != "") {
                                hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $mo_ta);
                            } else {
                                hang_hoa_update_noimg($ma_hh, $ten_hh, $don_gia, $giam_gia, $ma_loai, $dac_biet, $so_luot_xem, $mo_ta);
                            }

                        }


                        $listsanpham = hang_hoa_select_all();
                        include "sanpham/list.php";
                        break;


                    default:
                        include "list.php";
                        break;
                }
            }
            ?>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->