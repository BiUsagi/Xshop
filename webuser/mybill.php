 
<head>
    <style>
        .frmtitle{
            color: black;
            
        }
        table{
            width: 100%;
        }
        .row{
            padding: 5px;
        }
        .listsp{
            border-collapse: collapse;
            width: 100%;
            
        }
       
        .listsp td img{
            width: 50px;
            object-fit: cover;
        }
        .listsp tr:nth-last-of-type(1){
            height: 20px;
        }
    </style>
</head>    
<div class="row mb totle ">    
<div class="boxtrai mr demo">
        <div class="row">
                        <div class="frmtitle">
                            <h1>Đơn hàng của bạn</h1>
                        </div>
                        <div class=" row">
                            <table class="listsp" border="1">
                                <tr>
                                   
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Số lượng mặt hàng</th>
                                    <th>Tổng giá trị</th>
                                    <th>Tình trạng đơn hàng</th>
                                </tr>
                                <?php
                                      
                                    foreach($listbill as $bill){
                                        extract($bill);
                                        $sl_mh=get_sl_mh($id_bill);
                                      
                                        $tinh_trang=get_ttdh($status);
                                        echo '<tr>
                                                <td>'.$id_bill.'</td>
                                                <td>'.$ngay_dat_hang.'</td>
                                                <td>'.$sl_mh['sum(so_luong)'].'</td>
                                                <td>'.$total.'</td>
                                                <td>'.$tinh_trang.'</td>
                                            </tr>';
                                    }
                                ?>

                                
                            </table>
                        </div>
                    </div>
                </div>
                <div class="boxphai">
                    <?php include "./view/boxright.php"; ?>
                </div>
            </div>