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
                            $ngay_nhap = $_POST['ngay_nhap'];
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
                            hang_hoa_delete($_GET['mahh']);
                        }

                        $listsanpham = hang_hoa_select_all();
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
                            $ten_hh = $_POST['ten_hh'];
                            $ma_hh = $_POST['ma_hh'];
                            $don_gia = $_POST['don_gia'];
                            $giam_gia = $_POST['giam_gia'];
                            $hinh = $_POST['hinh'];
                            $ngay_nhap = $_POST['ngay_nhap'];
                            $mo_ta = $_POST['mo_ta'];
                            hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta);
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