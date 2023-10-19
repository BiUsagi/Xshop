<?php include "includes/connect.php"; ?>
<?php include "dao/khach-hang.php"; ?>

<div id="page-wrapper" class="full-height bg-white">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">

            <?php


            if (isset($_GET['khachhang'])) {
                $khachhang = $_GET['khachhang'];
                switch ($khachhang) {
                    case 'themdm':
                        if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                            $ten_loai = $_POST['ten_loai'];
                            loai_insert($ten_loai);
                        }
                        include "khachhang/add.php";
                        break;

                    case 'list':
                        include "list.php";
                        break;


                    case 'xoa':
                        if (isset($_GET['makh']) && ($_GET['makh'] > 0)) {
                            $ma_kh = $_GET['makh'];
                            $khach_hang = khach_hang_select_by_id($ma_kh);
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
                                $ma_kh = $_GET['makh']; // Đặt mã hàng hóa cần xóa

                                $sql_delete_comments = "DELETE FROM binh_luan WHERE ma_kh = :ma_kh";
                                $stmt = $conn->prepare($sql_delete_comments);
                                $stmt->bindParam(':ma_kh', $ma_kh, PDO::PARAM_INT);
                                $stmt->execute();

                                // Tiến hành xóa hàng hóa
                                $sql_delete_khach_hang = "DELETE FROM khach_hang WHERE ma_kh = :ma_kh";
                                $stmt = $conn->prepare($sql_delete_khach_hang);
                                $stmt->bindParam(':ma_kh', $ma_kh, PDO::PARAM_INT);
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
                        include "list.php";
                        break;


                    case 'sua':
                      
                        include "update.php";
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