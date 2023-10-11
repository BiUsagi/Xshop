<?php include "includes/connect.php"; ?>
<?php include "dao/loai.php"; ?>

<div id="page-wrapper" class="full-height bg-white">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">

            <?php


            if (isset($_GET['danhmuc'])) {
                $danhmuc = $_GET['danhmuc'];
                switch ($danhmuc) {
                    case 'themdm':
                        if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                            $ten_loai = $_POST['ten_loai'];
                            loai_insert($ten_loai);
                        }
                        include "danhmuc/add.php";
                        break;

                    case 'list':
                        include "list.php";
                        break;


                    case 'xoa':
                        if (isset($_GET['maloai']) && ($_GET['maloai'] > 0)) {
                            loai_delete($_GET['maloai']);
                        }
                        include "list.php";
                        break;


                    case 'sua':
                        if (isset($_GET['maloai']) && ($_GET['maloai'] > 0)) {
                            $dm = loai_select_by_id($_GET['maloai']);
                        }

                        include "update.php";
                        break;


                    case 'updatedm':
                        if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                            $ten_loai = $_POST['ten_loai'];
                            $ma_loai = $_POST['ma_loai'];
                            loai_update($ma_loai, $ten_loai);
                        }
                        include "list.php";
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