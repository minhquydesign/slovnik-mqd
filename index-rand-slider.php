<?php

// section
session_start();

// bien mac dinh
$thong_bao = "Chào <b>khách</b>, bạn có thể <a class='btn btn-sm btn-primary' href='./login
.php'> Đăng Nhập </a>";

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["da_dang_nhap"]) && $_SESSION["da_dang_nhap"] === true){
  //header("location: welcome.php");
 $ten_nguoi_truy_cap = htmlspecialchars($_SESSION["username"]);
 
 $thong_bao = "Chào <b>$ten_nguoi_truy_cap</b>, bạn đã đăng nhập bạn có thể <button class='list-inline-itemx btn btn-sm btn-primary mb-2'><a href='./welcome.php' class='text-white mb-2 mt-2'><i class='fas fa-chevron-right'></i> Control Panel</a></button> <button class='list-inline-itemx btn btn-sm btn-primary mb-2'><a href='./logout.php' class='text-white mb-2 mt-2'><i class='fas fa-sign-out-alt'></i> Đăng Xuất</a></button>";
};

require './require/tatCaCacHam.php';
////function
$data = ngauNhien10Tudien();
ngatKetNoiCSDL();
?>


<?php require './inc/header.php'; ?>




    <?php //include 'wg/header.php';?>

    <?php //include 'wg/menu-backhome.php';?> 


<div class="container">
      <div class="card border-0 shadow my-3">
        <div class="card-body p-3">
            
            <div class="wrapper">
             <h4 class="class">Slider 10 random word</h4>

<div id="demo" class="carousel slide pt-2" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
    <li data-target="#demo" data-slide-to="4"></li>
    <li data-target="#demo" data-slide-to="5"></li>
    <li data-target="#demo" data-slide-to="6"></li>
    <li data-target="#demo" data-slide-to="7"></li>
    <li data-target="#demo" data-slide-to="8"></li>
    <li data-target="#demo" data-slide-to="9"></li>
    <li data-target="#demo" data-slide-to="10"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/1.jpg" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Xem ngẫu nhiên</h3><h4> với thanh cuộn ngang</h4>
        <p>trượt ngang, bấm phím mũi tên</p>
      </div>   
    </div>
    
    <?php foreach ($data as $ket_qua){ ?>
    
    
    <div class="carousel-item">
      <img src="img/1.jpg" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
         
      <a onclick="copyPreviousSibling(this)" class="float-right float-top btn btn-sm btn-default"><i class="far fa-copy"></i></a><h3><?php echo $ket_qua['td_ts']; ?></h3>
        <h4><?php echo $ket_qua['td_tv']; ?></h4>
        <?php if ($ket_qua['td_mt']) { echo "<pre class='alert alert-success' style='font-family:Roboto'>".$ket_qua['td_mt']."</pre>"; } ?>
      </div>   
    </div>
    <?php } ?>
    
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
  
  </div>
</div>



</div>
</div>
</div>

<?php include './inc/footer.php';?>