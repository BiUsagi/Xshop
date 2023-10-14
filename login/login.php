<div class="row mb">
    <div class="boxtitle">TÀI KHOẢN</div>
    <div class="boxcontent fomttaikhoan">

        <form action="login_index.php?act=login" method="post">

            <?php
            $logout = "index.php?act=logout"; //gan
            ?>

            <div class="row mb10">
                Tên Đăng Nhập <br>


                <input type="text" name="user" id=""><br>
            </div>
            <div class="row mb10">
                Mật Khẩu
                <input type="password" name="pass" id=""> <br>
            </div>
            <div class="row mb10">

                <input type="checkbox" name="" id=""> Ghi nhớ tài khoản?
            </div>
            <div class="row mb10">



                <input type="submit" value="Đăng Nhập" id="">
                <?php echo '<a href="' . $logout . '">logout</a>' ?>
            </div>

        </form>
        <!-- <li><a href="#">Quên mật khẩu</a></li>
            <li><a href="<?php $logout ?>">Đăng ký thành viên</a></li> -->
    </div>

</div>