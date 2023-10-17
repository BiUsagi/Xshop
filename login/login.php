<div class="row1 mb">
    <div class="boxtitle">ĐĂNG NHẬP</div>
    <div class="boxcontent fomttaikhoan">


        <form action="index.php?act=login" method="post">

            <?php
            $res = "index.php?act=res"; //gan
            ?>

            <div class="row1 mb10">
                Tên Đăng Nhập: <br>
                <input type="text" name="madn" id=""><br>
            </div>
            <div class="row1 mb10">
                Mật Khẩu
                <input type="password" name="pass" id=""> <br>
            </div>
            <div class="row1 mb10">

                <input type="checkbox" name="" id=""> Ghi nhớ tài khoản?
            </div>
            <div class="row1 mb10">

            
                <?php
                    if(isset($thongbao)){  
                        echo '<p style="color: red; margin-top: -5px; margin-bottom: -5px; ">'.$thongbao.'</p>';     
                    }
                    
                ?>
                <br>
                <input type="submit" value="Đăng Nhập" name="dangnhap">
                
            </div>

        </form>
        <li><a href="#">Quên mật khẩu</a></li>
        <li><?php echo '<a href="' . $res . '">Đăng ký thành viên</a>' ?></li>
        
    </div>

</div>