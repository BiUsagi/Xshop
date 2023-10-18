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
                            khach_hang_delete($_GET['makh']);
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