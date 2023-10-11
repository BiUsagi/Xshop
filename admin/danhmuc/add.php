    <div class="frmtitle">
        <h1> THÊM MỚI LOẠI HÀNG HÓA </H1>
    </div>
    <div class="frmcontent">

        <form action="index.php?act=adddm&danhmuc=themdm" method="post">
            <div class="mb10">
                Mã loại <br>
                <input type="text" name="ma_loai" disabled>
            </div>
            <div class="mb10">
                Tên loại<br>
                <input type="text" name="ten_loai">
            </div>
            <div class=" mb10">
                <input type="submit" value="THÊM MỚI" name="themmoi">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=adddm&danhmuc=list"><input type="button" value="DANH SÁCH"></a>
            </div>
        </form>


    </div>
</div>