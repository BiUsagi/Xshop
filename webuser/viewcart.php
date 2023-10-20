<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        img{
            height: 70px;
            width: 120px;
            object-fit: cover;
        }
    </style>
</head>
<?php //session_destroy(); ?>
<body>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="boxtrai mr-4 col-md-12">
                <div class="row mb-4">
                    <div class="boxtitle">GIỎ HÀNG</div>
                    <div class="row boxcontent cart">
                        <div class="table-responsive">
                            <table class="table">
                               
                                <?php
                                viewcart(1);
                                ?>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 bill">
                    <a href="index.php?prd=bill">
                        <input type="submit" class="btn btn-primary" value="ĐỒNG Ý ĐẶT HÀNG">
                    </a>
                    <a href="index.php?act=delcart"><input type="button" class="btn btn-danger" value="XÓA GIỎ HÀNG"></a>
                </div>
            </div>
        </div>
    </div>
</body>