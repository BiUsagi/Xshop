
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

.mySlides img{
    /* width: 23px; */
    height: 255px;

}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 8px;
  width: 8px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
  margin-bottom: 10px;
}

.text{
    text-shadow: 0px 1px 5px black;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
</head>
<body>

<!-- <h2>Automatic Slideshow</h2>
<p>Change image every 2 seconds:</p> -->

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="images/slide1.png" style="width:100%">
  <div class="text">Tiện nghi</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="images/slide2.jpg" style="width:100%">
  <div class="text">Thiết kế đẹp mắt</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="images/slide3.jpg" style="width:100%">
  <div class="text">Phù hợp cho ngôi nhà của bạn</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>



    <!-- <div class="banner n1">
        <img src="images/111.jpg" alt>
    </div> -->



<div class="container" id="tenhh">

    <?php

    $listhh = hang_hoa_select_all();
    $i = 0;
    foreach ($listhh as $hh) {
        extract($hh);
        $i++;
        echo '<div class="flexsp">';


        $hinhpath = "admin/sanpham/uploads/" . $hinh;
        if (is_file($hinhpath)) {
            $img = "<a href='../index.php?prd=chitietsp&product_id= $ma_hh'><img src='" . $hinhpath . "'></a>";
        } else {
            $img = "no photo";
        }

        echo '    <div class="boxsp mr"> ';

        echo '    <div class=" img" >' . $img . '</div> ';

        if ($giam_gia > 0) {
            echo '    <div id="sale"></div>';
        } else {
            echo "";
        }

        echo '<a href="../index.php?prd=chitietsp&product_id= '.$ma_hh.'">' . $ten_hh . '</a>';

        $gia_ban = $don_gia / 100 * (100 - $giam_gia);

        echo "    <div class='khung_gia'> ";
        echo "    <p class='giahh'> Giá: " . number_format($gia_ban, 0, ',', '.') . "₫ </p> ";
        

        if ($giam_gia > 0) {
            $gia_goc = "Giá gốc:" . number_format($don_gia, 0, ',', '.') . "₫";
            echo "<p class='gia_goc'> $gia_goc </p> ";
        } else {
            echo "<p class='gia_goc'> Không giảm giá </p> ";
        }


        echo '    </div> ';
        echo   '<form action="index.php?prd=addtocart" method="post">';
        echo    '<input type="hidden" name="id" value="'.$ma_hh.'">';
        echo    '<input type="hidden" name="name" value="'. $ten_hh .'">';
        echo    '<input type="hidden" name="img" value="' . $img . '">';
        echo    '<input type="hidden" name="price" value="'.$gia_ban.'">';
        echo    '<input type="submit" value="+"  class="cart-button fa-solid fa-2xl" name="addtocart" >';
        echo    '</form>'; 
        echo '    </div> ';
        echo '    </div> ';
        
        if($i==3) $i=0;
        if($i==1 || $i==2){
                echo '    <div class="trong"> ';
                echo '    </div> ';
        }
    }
    ?>



    <!-- <div class="boxsp mr">
                        <div class=" row1 img"> <img src="images/1.jpg" alt></div>
                        <p>30$</p>
                        <a href="#">dong ho </a>
                    </div> -->




</div>

</body>
</html> 
