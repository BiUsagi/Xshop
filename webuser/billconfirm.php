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
            margin-top: -10px;
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
                           <h1>Cảm ơn</h1>
                       </div>
                       <div class="boxcontent">
                            <h3>
                                Cảm ơn quý khách đã đặt hàng!
                            </h3>
                       </div>
                   </div>
                   <div class="row">
                   <div class="frmtitle">
                           <h1>Thông tin đơn hàng</h1>
                       </div>
                        <div class="boxcontent">
                            <li>Mã đơn hàng: MA<?=$idbill?></li>
                            <li>Ngày đặt hàng: <?=$ngaydathang?></li>
                            <li>Tổng đơn hàng: <?=$tongdonhang?></li>
                            <li>Phương thức thanh toán: <?=$pttt?></li>
                        </div>
                   </div>
                    <form action="index.php?act=billconfirm" method="post">
                        <div class="row">
                        <div class="frmtitle">
                           <h1>Thông tin người đặt hàng</h1>
                       </div>
                            <div class="row">
                                <?php
                                    if(isset($bill)&&is_array($bill)){
                                        extract($bill);
                                    }
                                ?>
                                <table>
                                    <tr>
                                        <td>Người đặt hàng</td>
                                        <td><?php if(isset($name)){ echo $name;}?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php if(isset($email)){ echo $email;}?></td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại</td>
                                        <td><?php if(isset($tel)){ echo $tel;}?></td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ</td>
                                        <td><?php if(isset($dia_chi)){ echo $dia_chi;}?></td>
                                    </tr>
                                    
                                </table>
                                
                            </div>
                        </div>

                        <div class="row">
                          
                            <div class="frmtitle">
                                <h1>Đơn hàng</h1>
                            </div>
                            <div class="frmcontent">
                               <?php
                                    if(isset($listcart)){
                                        view_bill($listcart); 
                                    }
                               ?>
                                <a href="index.php"><input type="button" value="Đóng"></a>
                            </div>
                        </div>

                    </form>                       
                </div>

                <div class="boxphai">
                    <?php //include "./view/boxright.php"; ?>
                </div>

            </div>