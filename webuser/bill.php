            <?php
                if(isset($_SESSION['user'])){
                    $ho_ten = $_SESSION['user']['user'];
                    // $email=$_SESSION['user']['email'];
                }else{
                    $ho_ten="";
                    $email="";
                }
                
            ?>
<head>
    <style>
        img{
            height: 70px;
            width: 120px;
            object-fit: cover;
        }
        .frmtitle{
            color: black;
            
        }
        table{
            width: 100%;
        }
        table input[type*="text"]{
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
                   
                    <form action="index.php?prd=billconfirm" method="post">
                        <div class="row">
                            <div class="frmtitle">
                                <h1>Thông tin đặt hàng</h1>
                            </div>
                            <div class="row">
                                <table>
                                    <tr>
                                        <td>Người đặt hàng</td>
                                        <td><input type="text" name="ho_ten" id="" value="<?php if(isset($ho_ten)){ echo $ho_ten;}?>" ></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><input type="text" name="email" id="" value="<?php if(isset($email)){ echo $email;}?>" ></td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại</td>
                                        <td><input type="text" name="sdt" id="" value="<?php if(isset($sdt)){ echo $sdt;}?>" ></td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ</td>
                                        <td><input type="text" name="dia_chi" id="" value="<?php if(isset($dia_chi)){ echo $dia_chi;}?>" ></td>
                                    </tr>
                                </table>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="frmtitle">
                                <h1>Phương thức thanh toán</h1>
                            </div>
                            <div class="row">
                                <table>
                                        <tr>
                                            <td><input type="radio" name="pttt" value="Thanh toán khi nhận hàng" checked>Thanh toán khi nhận hàng</td>
                                            <td><input type="radio" name="pttt" value="Chuyển khoản ngân hàng" id="">Chuyển khoản ngân hàng</td>
                                            <td><input type="radio" name="pttt" value="Thanh toán online" id="">Thanh toán online</td>
                                            
                                        </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                          
                            <div class="frmtitle">
                                <h1>Đơn hàng</h1>
                            </div>
                            <div class="frmcontent">
                               <?php viewcart(0); ?>
                                <input type="submit" name="dongydathang" value="ĐỒNG Ý ĐẶT HÀNG"></a>
                            </div>
                        </div>

                    </form>                       
                </div>

                <div class="boxphai">
                    <?php //include "./view/boxright.php"; ?>
                </div>

            </div>