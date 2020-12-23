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


$students = ngauNhien10Tudien();
ngatKetNoiCSDL();

?>

<?php require './inc/header.php'; ?>

<?php //include 'wg/header.php';?>

<?php //include 'wg/menu-home.php';?>

<div class="container">
    <div class="card border-0 shadow my-3">
        <div class="card-body p-3">





            <div id="tableindex" class="containerx tableindex">
                <h4 class="class">RANDOM</h4>
                <div class="table-responsive borderx">

                    <hr>

                    <?php foreach ($students as $ket_qua){ ?>

                    <tr class="text-centerx">
                        <!--ts A tv-->
                        <td><a class=""
                                href='view.php?id=<?php echo $ket_qua['td_id']; ?>'"> <?php echo $ket_qua['td_ts']; ?></a><a onclick="
                                copyPreviousSibling(this)" class="text-primary btn btn-sm btn-default"><i
                                    class="far fa-copy"></i></a></td>
                        <!--th scope=" row"> <?php echo $ket_qua['td_id']; ?></th-->
                        - <small><?php echo $ket_qua['td_tv']; ?></small>

                        <!--td><?php echo $ket_qua['td_id']; ?></td-->
                        <br>

                        <!--td_mt -->
                        <?php if ($ket_qua['td_mt']) { if (strlen($ket_qua['td_mt']) > 300)
                        {
                            $ket_qua['td_mt'] = substr($ket_qua['td_mt'], 0, 300).'';
                            echo "<pre  class='alert alert-success' style='font-family:Roboto'>".$ket_qua['td_mt']." </br><a class='float-right btn btn-sm text-primary' href='view.php?id=".$ket_qua['td_id']."'> <i class='fas fa-expand-alt'></i></a></pre>";
                        }
                        else
                        {
                            $ket_qua['td_mt'] = $ket_qua['td_mt'];
                            echo "<pre  class='alert alert-success' style='font-family:Roboto'>".$ket_qua['td_mt']."</pre>";
                        } } ?>
                        <!--NGUOITHEM -->
                        <?php if ($ket_qua['td_nguoithem']) { echo "<td><i class='fas fa-user'></i> ".$ket_qua['td_nguoithem']."</td>"; } ?>
                        <!--NGUOISUA-->
                        <?php if ($ket_qua['td_nguoisua']) { echo "<td class='mb-2'> <i class='fa fa-user-plus' aria-hidden='true'></i> ".$ket_qua['td_nguoisua']."</td>"; } ?>
                        <!--td_ngaythem-->
                        <?php if ($ket_qua['td_ngaythem']) { echo  "<td> <i class='far fa-calendar-alt'></i> ".date("d-m-Y", strtotime($ket_qua['td_ngaythem']))."</td>"; } ?>
                        <br />


                        <!-- LOAI-->
                        <?php if ($ket_qua['td_loai']) { echo" <td><small><button class='btn btn-sm btn-success'>" . $ket_qua['td_loai'] . "</button></small></td>"; } ?>

                        <!--form method="post" action="index.php"-->

                        <?php if(isset($_SESSION['da_dang_nhap'])) { echo "<a href='edit.php?id=".$ket_qua['td_id']."' class='btn btn-sm btn-primary m-1'>Sửa</a>"; } else  { echo "<button  data-toggle='tooltip' data-placement='top' title='Tooltip on top' type='button'  value='Sửa'
                                    class='btn btn-light m-1 btn-sm'>Đăng nhập để sửa</button>"; } ?>

                        <input onclick="window.location = 'view.php?id=<?php echo $ket_qua['td_id']; ?>'" type="button"
                            value="View" class="btn btn-success m-1 btn-sm" />


                        <input type="hidden" name="id" value="<?php echo $ket_qua['td_id']; ?>" />
                        <input onclick="alert('Không được xóa');" type="submit" name="deletex" value="Delete"
                            class="btn btn-light m-1 btn-sm" />
                        <!--/form-->
                        </td>







                    </tr>
                    <hr>
                    <?php } ?>

                </div><!-- /. responsive-table-sm -->
            </div><!-- /tableindex -->


        </div>
    </div>
</div>

<div class="container">
    <div class="card border-0 shadow my-3">
        <div class="card-body p-3">
            <h4 class="class">10 radom word</h2>
                <hr>

                <div id="demo" class="carousel slide" data-ride="carousel">
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
                                <h3>Xem ngẫu nhiên với thanh cuộn ngang</h3>
                                <p>trượt ngang</p>
                            </div>
                        </div>

                        <?php foreach ($students as $item){ ?>


                        <div class="carousel-item">
                            <img src="img/1.jpg" alt="Chicago" width="1100" height="500">
                            <div class="carousel-caption">
                                <h3><?php echo $item['td_tv']; ?></h3>
                                <h4><?php echo $item['td_ts']; ?></h4>
                                <?php if ($item['td_mt']) { echo "<pre class='alert alert-success' style='font-family:Roboto'>".$item['td_mt']."</pre>"; } ?>

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