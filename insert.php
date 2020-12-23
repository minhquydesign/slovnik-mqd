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


$msg = "";
require './require/tatCaCacHam.php';
$nguoithem = get_user_ip();

// kiểm tra đăng nhập
if(isset($_SESSION["da_dang_nhap"]) && $_SESSION["da_dang_nhap"] === true){
  //header("location: welcome.php");
 $nguoithem = htmlspecialchars($_SESSION["username"]);

};

//require

ketNoiCSDL();





if(isset($_POST['add_tudien'])){
    
    // check username and email empty or not
    if(!empty($_POST['name_td_tv']) && !empty($_POST['name_td_ts'])){
        
        // Escape special characters.
        $bienvao_td_tv = mysqli_real_escape_string($conn, htmlspecialchars($_POST['name_td_tv']));
        $bienvao_td_ts = mysqli_real_escape_string($conn, htmlspecialchars($_POST['name_td_ts']));
        
$bienvao_td_mt = mysqli_real_escape_string($conn, htmlspecialchars($_POST['name_dtv']));

$bienvao_td_nguoithem = mysqli_real_escape_string($conn, htmlspecialchars($_POST['name_td_nguoithem']));
        
        //CHECK EMAIL IS VALID OR NOT
       // if (filter_var($bienvao_td_ts, FILTER_VALIDATE_EMAIL)) {
            
            // CHECK IF EMAIL IS ALREADY INSERTED OR NOT
            $kiemtra_sotutrunglap = mysqli_query($conn, "SELECT `td_ts` FROM `tudien` WHERE td_ts = '$bienvao_td_ts'");
            
//nếu số từ trùng lặp lớn hơn 0
            if(mysqli_num_rows($kiemtra_sotutrunglap) > 0){    
                

               echo "<script>
                    alert('Từ vựng đã tồn tại');
                    //window.location.href = 'insert.php';
                    </script>";
                //echo "<h3>Đã tồn tại từ này</h3>";
                
            }else{
                
                // INSER USERS DATA INTO THE DATABASE
                $insert_query = mysqli_query($conn,"INSERT INTO `tudien`(td_tv ,td_ts,td_mt, td_nguoithem) VALUES('$bienvao_td_tv','$bienvao_td_ts','$bienvao_td_mt','$bienvao_td_nguoithem')");

                //CHECK DATA INSERTED OR NOT
                if($insert_query){
                    echo "<script>
                    alert('Từ vựng đã được thêm vào!');
                    window.location.href = 'index.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Lỗi gì rồi.. <a href='mailto:nampk095@gmail.com&subject=Báo Lỗi Website slovnik@MQD'>Báo lỗi</a></h3>";
                }
                
                
            }
            
            
        //}else{
            //echo "Đã tồn";
        //}
        
    }else{
        $msg = "<div class='container plugin1 bg-darkx text-center mb-2'><p class='text-center alert alert-warning'>Điền đầy đủ các trường</p></div>";
    }
    
}else{
    // set header response code
    //http_response_code(404);
    //echo "<h1>404 Page Not Found!</h1>";
}
//end isset add_tudien
?>

<?php include './inc/header.php'; ?>

<div class="container">

    <h6 class="page-header text-center alert alert-success pt-3 pb-3"><?php echo $thong_bao; ?></h6>




</div>

<?php echo $msg;  ?>

<div class="container">
    <div class="card border-0 shadow my-3">
        <div class="card-body p-3">

            <br />


            <form method="post" action="insert.php">




                <div class="form-group row">
                    <label class="col-4x col-md-3 col-lg-2 control-label font-weight-bold">Tiếng Slovak</label>
                    <div class="col-x8 col-md-9 col-lg-10">
                        <input type="text" name="name_td_ts"
                            value="<?php echo !empty($data['td_ts']) ? $data['td_ts'] : ''; ?>"
                            class="form-control text-primary" rows="2" />
                        <?php if (!empty($errors['td_ts'])) echo $errors['td_ts']; ?>
                        <small id="emailHelp" class="form-text text-muted">*Ràng buộc</small>
                    </div>

                </div>

                <div class="form-group row">

                    <label class="col-4x col-md-3 col-lg-2 control-label font-weight-bold">Tiếng việt</label>
                    <div class="col-8x col-md-9 col-lg-10">
                        <input type="text" name="name_td_tv"
                            value="<?php echo !empty($data['td_tv']) ? $data['td_tv'] : ''; ?>"
                            class="form-control text-primary" rows="2" />
                        <?php if (!empty($errors['td_tv'])) echo $errors['td_tv']; ?>
                        <small id="emailHelp" class="form-text text-muted">*Ràng buộc</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-x4 col-md-3 col-lg-2 control-label text-info">Mô tả</label>
                    <div class="col-8x col-md-9 col-lg-10">
                        <textarea type="text" name="name_dtv"
                            value="<?php echo !empty($data['td_mt']) ? $data['td_mt'] : ''; ?>"
                            class="form-control text-info" rows="5" /></textarea>
                        <small id="emailHelp" class="form-text text-muted">Có thể bỏ trống</small>
                    </div>
                </div>


                <div class="form-group row ">
                    <label class="col-4x col-md-3 col-lg-2 control-label">Người thêm</label>
                    <div class="col-8x col-md-9 col-lg-10 ">
                        <input type="text" name="name_td_nguoithem" value="<?php echo $nguoithem; ?>"
                            class="form-control " readonly />
                        <small id="emailHelp" class="form-text text-muted">Không thể sửa.<a href="./login.php">đăng
                                nhập</a></small>
                    </div>
                </div>


                <input type="submit" name="add_tudien" value="Lưu vào hệ thống"
                    class="btn btn-primary mb-2 text-center" />
            </form>
            <hr>

        </div>
    </div>
</div>

<?php require './inc/footer.php'; ?>