<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <style>
      
    </style>

</head>

<body>
    <div class="row mb">
        <div class="boxtitle">logout</div>
        <div class="boxcontent fomttaikhoan">

            <form action="login_index.php?act=logout" method="post">
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
                    <input type="submit" value="Đăng Nhập" id=""><br>
                </div>

            </form>
            <li><a href="#">Quên mật khẩu</a></li>
            <li><a href="#">Đăng ký thành viên</a></li>
        </div>

    </div>
</body>

</html>