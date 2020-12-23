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
$data = lay20TudienMoiNhat();

$data_thanh_vien = layTatCaThanhVien();


$tong_so_tu_vung = count(layTatCaTudienMoiNhat());

ngatKetNoiCSDL()


?>


<?php include './inc/header.php'; ?>


<div class="container">

    <h6 class="page-header text-center alert alert-success pt-3 pb-3"><?php echo $thong_bao; ?></h6>




</div>



<div class="container">
    <div class="card border-0 shadow my-3">
        <div class="card-body p-3">








            <div id="tableindex" class="containerx tableindex">
                <h4 class="class">Common Word</h4>
                <hr>

                <div class="table-responsive borderx">


                    <?php foreach ($data as $ket_qua){ ?>

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
                            echo "<pre  class='alert alert-success' style='font-family:Roboto'>".$ket_qua['td_mt']."</br><a class='float-right btn btn-sm text-primary' href='view.php?id=".$ket_qua['td_id']."'><i class='fas fa-expand-alt'></i></a></pre>";
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


            <ul class="list-inline list-inline text-center">
                <li class="list-inline-itemx mb-2 btn btn-outline-primary m-1"><a class="text-wwhite"
                        href="./index-stt-desc.php"><i class="fa fa-arrows-alt" aria-hidden="true"></i> Xem tất cả</a>
                </li>
            </ul>




        </div>
    </div>
</div>



<div class="container">
    <div class="card border-0 shadow my-3">
        <div class="card-body p-3 table-responsive">
            <h2 class="class">Thành viên</h2>

            <table class="table table-sm table-hover table-striped">

                <caption class="text-right">bảng thành viên</caption>
                <thead class="thead-darkx">
                    <tr>
                        <th scope="col">UserNAme</th>
                        <th scope="col">DATEcREATED</th>


                    </tr>
                </thead>
                <?php foreach ($data_thanh_vien as $ket_qua_thanh_vien){ ?>
                <tbody>
                    <tr class="text-centerx">
                        <th scope="row"> <?php echo $ket_qua_thanh_vien['username']; ?></th>
                        <td><?php echo $ket_qua_thanh_vien['created_at']; ?></td>
                        <!--?td>xxxxxxxxxx<php echo $ket_qua_thanh_vien['password']; ?></td-->

                    </tr>
                </tbody>
                <?php } ?>
            </table>


        </div>
    </div>
</div>




<!--?php require 'wg/embed-video.php';?-->


<div class="container">
    <div class="card border-0 shadow my-3 alert alert-info">
        <div class="card-body p-3 text-center">
            <button class="btn btn-default  ">Hiện tại có <?php echo $tong_so_tu_vung; ?> cụm từ</button>
        </div>
    </div>
</div>




<?php include './inc/footer.php'; ?>