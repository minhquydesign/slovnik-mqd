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

//// HÀM LẤY từ điển THEO ID
    // function xemMotTudien($tudien_id)
    // {
    //     // Gọi tới biến toàn cục $conn
    //     global $conn;
        
    //     // Hàm kết nối
    //     ketNoiCSDL();
        
    //     // Câu truy vấn lấy tất cả từ điển
    //     $sql = "select * from tudien where td_id = {$tudien_id}";
        
    //     // Thực hiện câu truy vấn
    //     $query = mysqli_query($conn, $sql);
        
    //     // Mảng chứa kết quả
    //     $result = array();
        
    //     // Nếu có kết quả thì đưa vào biến $result
    //     if (mysqli_num_rows($query) > 0){
    //         $row = mysqli_fetch_assoc($query);
    //         $result = $row;
    //     }
        
    //     // Trả kết quả về
    //     return $result;
    // }


// Lấy thông tin hiển thị lên để người dùng sửa
$tudien_id = isset($_GET['id']) ? (int)$_GET['id'] : '';

$tudien_id_cong_mot = $tudien_id + 1;
if ($tudien_id > 11) { $tudien_id_tru_mot = $tudien_id - 1; } else {
    echo "<script>
                    alert('Đây là số từ điển cuối cùng - không thể PREVS');
                    window.history.back();
                    //window.location.href = 'index.php';
                    </script>";
    $tudien_id_tru_mot = $tudien_id;
}

if ($tudien_id){
    $ket_qua = xemMotTudien($tudien_id);
}

// Nếu không có dữ liệu tức không tìm thấy từ điển cần sửa
if (!$ket_qua){
    echo "<script>
                    alert('Không có MÃ SỐ từ điển này trong CSDL.');
                    window.history.back();
                    //window.location.href = 'index.php';
                    </script>";
                    exit;
    // header("location: index.php");
}



ngatKetNoiCSDL();
?>

<?php include './inc/header.php'; ?>

<div class="container">

    <h6 class="page-header text-center alert alert-success pt-3 pb-3"><?php echo $thong_bao; ?></h6>




</div>


<div class="container">
    <div class="card border-0 shadow my-3">
        <div class="card-body p-3">






            <div id="VIEW" class="container plugin1 bg-darkx text-center mb-2">


                <!-- next prev -->
                <div class="FIELD alertx alert-infox m-1  pt-3 p-1 ">
                    <span class="float-left"><a class="btn btn-primary"
                            href='view.php?id=<?php echo $tudien_id_cong_mot; ?>'"><i class=" fa fa-chevron-left"
                            aria-hidden="true"></i> NEXT</a></span>
                    <span onclick="window.location='edit.php?id=<?php echo $ket_qua['td_id']; ?>'" type="button"
                        class="btn btn-primary">Edit</span>
                    <span class="float-right"><a class="btn btn-primary"
                            href='view.php?id=<?php echo $tudien_id_tru_mot; ?>'">PREV <i class=" fa fa-chevron-right"
                            aria-hidden="true"></i></a></span>

                </div>
                <hr>





                <div class="alert alert-dark">
                    <small class="control-label ">Definition </small>

                    <p>
                        <?php if ($ket_qua['td_ts']) { echo $ket_qua['td_ts']; } ?></p>
                    <a onclick="copyPreviousSibling(this)" class="is-pulled-right btn btn-sm btn-default"><i
                            class="far fa-copy"></i></a>

                </div>
                <hr>

                <!-- TV -->
                <div class="alert alert-info">

                    <small class=" text-center">Vietnamese </small>

                    <p><?php echo $ket_qua['td_tv']; ?></p><a onclick='copyPreviousSibling(this)'
                        class='btn-sm p-0 m-0'><i class='far fa-copy'></i></a>
                </div>

                <!-- MT -->
                <?php if ($ket_qua['td_mt']) { echo " <div class='VIEW-MT alert alert-success'><small class='control-label '>Comment</small><pre class='text-left' style='font-family:Roboto'>" . $ket_qua['td_mt'] . "</pre><a onclick='copyPreviousSibling(this)' class='btn-sm p-0 m-0'><i class='far fa-copy'></i></a></div>"; } ?>

                <!-- ID -->
                <div class="alert alert-light alert-dismissible fade show" role="alert">
                    <strong><?= $ket_qua['td_id']; ?></strong> is ID Definition.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- LOAI -->
                <?php if ($ket_qua['td_loai']) { echo " <div class='VIEW-LOAI alert alert-info'><small class='control-label '>Type </small><button class='btn btn-sm btn-success'  style='font-family:Roboto'>" . $ket_qua['td_loai'] . "</button></div>"; } ?>

                <!-- CHUDE -->
                <?php if ($ket_qua['td_chude']) { echo "<hr><div class='VIEW-CHUDE alert alert-info'><small class='control-label '>Categri</small><button  style='font-family:Roboto'>" . $ket_qua['td_chude'] . "</button></div>"; } ?>



                <!-- TA -->
                <?php if ($ket_qua['td_ta']) { echo "<hr><div class='FIELD alert alert-dark'>
                        <small class='FIELD-TITLE '> EN</small>
                        <p>" . $ket_qua['td_ta'] . "</p></div>"; } ?>



                <!-- 	td_ngaythem	 -->
                <hr>
                <div class="FIELD alert alert-warning">
                    <small class="FIELD-TITLE badge badge-info">DATE CREATED </small>
                    <span><?php echo $ket_qua['td_ngaythem']; ?></span>
                </div>


                <!-- NGUOITHEM -->
                <?php if ($ket_qua['td_nguoithem']) { echo "<hr><div class='FIELD alert alert-dark'>
                        <small class='FIELD-TITLE '>Author</small>
                        <span class='badge badge-light'>" . $ket_qua['td_nguoithem'] . "</span></div>"; } ?>

                <!-- nguoi sua -->
                <?php if ($ket_qua['td_nguoisua']) { echo "<hr><div class='FIELD alert alert-primary'>
                        <small class='FIELD-TITLE '>Editor</small>
                        <span class='badge badge-light'>" . $ket_qua['td_nguoisua'] . "</span></div><hr>"; } ?>


                <!-- next prev -->
                <div class="FIELD alertx alert-infox m-1 p-1">
                    <span class="float-left"><a class="btn btn-primary"
                            href='view.php?id=<?php echo $tudien_id_cong_mot; ?>'"><i class=" fa fa-chevron-left"
                            aria-hidden="true"></i> NEXT</a></span>
                    <span class="float-right"><a class="btn btn-primary"
                            href='view.php?id=<?php echo $tudien_id_tru_mot; ?>'">PREV <i class=" fa fa-chevron-right"
                            aria-hidden="true"></i></a></span>

                </div>
                <hr>


                <!-- BUTTON EDIT -->
                <div class="FIELD text-center">
                    <button onclick="window.location='edit.php?id=<?php echo $ket_qua['td_id']; ?>'" type="button"
                        class="btn btn-primary m-1">Edit</button>
                </div>





            </div>
        </div>
    </div>
</div>






<?php require './inc/footer.php'; ?>