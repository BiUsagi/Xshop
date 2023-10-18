<?php include "includes/connect.php"; ?>
<?php include "dao/binh-luan.php"; ?>
<?php include "dao/hang-hoa.php"; ?>

<div id="page-wrapper" class="full-height bg-white">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">

            <?php


            if (isset($_GET['binhluan'])) {
                $binhluan = $_GET['binhluan'];
                switch ($binhluan) {
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