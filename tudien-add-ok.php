<?php



session_start();





$nguoithem = 'khách'; 
if(isset($_SESSION["da_dang_nhap"]) && $_SESSION["da_dang_nhap"] === true){
  //header("location: welcome.php");
 $nguoithem = htmlspecialchars($_SESSION["username"]);

};
//require
require './libs/tudien.php';


// Nếu người dùng submit form
if (!empty($_POST['add_tudien']))
{

   
    // Lay data
    $data['td_tv']        = isset($_POST['name']) ? $_POST['name'] : '';
    $data['td_ts']         = isset($_POST['sex']) ? $_POST['sex'] : '';
    $data['td_mt']    = isset($_POST['birthday']) ? $_POST['birthday'] : '';

    $data['td_loai']    = isset($_POST['nameloai']) ? $_POST['nameloai'] : '';


    $data['nguoithem']    = isset($_POST['anguoithem']) ? $_POST['anguoithem'] : '';
    // Validate thong tin
    $errors = array();
    if (empty($data['td_tv'])){
        $errors['td_tv'] = 'Chưa nhập nội dung';
    }
    
    if (empty($data['td_ts'])){
        $errors['td_ts'] = 'Chưa nhập nội dung';
    }
    

  


    // Neu ko co loi thi insert - tv tt dtv l nt
    if (!$errors){
        add_tudien($data['td_tv'], $data['td_ts'], $data['td_mt'], $data['td_loai'], $data['nguoithem']);
        // 
        header("location: tudien-add-ok.php");
        
        
    }
}

disconnect_db();

?>

<!DOCTYPE html>
<html>
<?php require 'wg/head.php'; ?>



<body class="TUDIEN-ADDADD">


    <?php include 'wg/header.php';?>
    <?php include 'wg/menu-backhome.php';?>

    <?php include 'menu-backhome.php';?>


<div class="container">
  
<h6 class="text-center alert alert-success">Thêm thành công!</h6>

</div>




    <div class="container">
        <!--h2 class="display-4 text-center">Danh sách từ điển</h2-->
        <br/>
        <form method="post" action="tudien-add.php">


           <div class="form-group row">
            
            <label class="col-4 col-md-3 col-lg-2 control-label">Tiếng việt*</label>
            <div class="col-8 col-md-9 col-lg-10">
                <input type="text" name="name" value="<?php echo !empty($data['td_tv']) ? $data['td_tv'] : ''; ?>" class="form-control"/>
                <?php if (!empty($errors['td_tv'])) echo $errors['td_tv']; ?>
                <small id="emailHelp" class="form-text text-muted">....</small>
            </div>
        </div>
        <div class="form-group row">
         
            <label class="col-4 col-md-3 col-lg-2 control-label ">Tiếng Slovak*</label>
            <div class="col-8 col-md-9 col-lg-10">
                <input type="text" name="sex" value="<?php echo !empty($data['td_ts']) ? $data['td_ts'] : ''; ?>" class="form-control "/>
                <?php if (!empty($errors['td_ts'])) echo $errors['td_ts']; ?>
                <small id="emailHelp" class="form-text text-muted">...</small>
            </div>
            
        </div>
        
        <div class="form-group row">
            <label class="col-4 col-md-3 col-lg-2 control-label">Mô tả</label>
            <div class="col-8 col-md-9 col-lg-10">
                <textarea type="text" name="birthday" value="<?php echo !empty($data['td_mt']) ? $data['td_mt'] : ''; ?>" class="form-control" rows="5"/></textarea>
                <small id="emailHelp" class="form-text text-muted">Có thể bỏ trống</small>
            </div></div>


            <div class="form-group row">
            <label class="col-4 col-md-3 col-lg-2 control-label">Loại</label>
            <div class="col-8 col-md-9 col-lg-10">
            <select name="nameloai" class="form-control">
    <option value="từ">từ - word</option>
    <option value="câu">câu - sentence</option>
     <option value="danh từ">danh từ - noun </option>
    <option value="tính từ">tính từ - adj</option>
    <option value="trạng từ">trạng từ - adv</option>
    <option value="động từ">động từ - verb</option>
    <option value="không biết">không biết - null</option>
    <option value="khác">khác</option>
  </select>
  <small id="x" class="form-text text-muted">...</small>
            </div></div>


            <div class="form-group row hide">
                <label class="col-4 col-md-3 col-lg-2 control-label">Người thêm</label>
                <div class="col-8 col-md-9 col-lg-10">
                    <input type="text" name="anguoithem" value="<?php echo $nguoithem; ?>" class="form-control hide" row="5" readonly/>
                    <small id="emailHelp" class="form-text text-muted">Không thể sửa.<a href= "/login.php">đăng nhập</a></small>
                </div></div>
                
    
                <input type="submit" name="add_tudien" value="Lưu"/ class="btn btn-primary mb-2 text-center">
            </form>
        </div>

        <?php include 'wg/wg-huong-dan-add-tu-dien.php';?>



        <?php include 'wg/footer.php';?>
    </body>
    </html>
