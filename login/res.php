<div class="row mb">
    <div class="boxtitle">ĐĂNG KÝ</div>
    <div class="boxcontent fomttaikhoan">


        <form action="index.php?act=login" method="post">

            <?php
            $res = "index.php?act=login"; //gan
            ?>
            
            <div class="row mb10">
                Họ và tên <br>
                <input type="text" name="ho_ten" id=""><br>
            </div>
            <div class="row mb10">
                Tên Đăng Nhập <br>
                <input type="text" name="ma_kh" id=""><br>
            </div>
            <div class="row mb10">
                Email<br>
                <input type="text" name="email" id=""><br>
            </div>
            <div class="row mb10">
                Mật Khẩu
                <input type="password" name="pass" id=""> <br>
            </div>
            <div class="row mb10">

            
                <?php
                    if(isset($thongbao)){  
                        echo '<p style="color: red; margin-top: -5px; margin-bottom: -5px; ">'.$thongbao.'</p>';     
                    }
                    
                ?>
                <br>
                <input type="submit" value="Đăng Ký" name="dangky">
                
            </div>

        </form>
        <li><a href="#">Quên mật khẩu</a></li>
        <li><?php echo '<a href="' . $res . '">Đã có tài khoản</a>' ?></li>
        
    </div>

</div>