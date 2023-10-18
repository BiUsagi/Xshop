<?php include "includes/connect.php"; ?>
<?php include "dao/thong-ke.php"; ?>
<?php include "dao/hang-hoa.php"; ?>
<?php include "dao/loai.php"; ?>


<div id="page-wrapper" class="full-height bg-white">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">

            <?php


            if (isset($_GET['thongke'])) {
                $thongke = $_GET['thongke'];
                switch ($thongke) {
                    case 'list':
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