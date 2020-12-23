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


$name_td_nguoisua = 'khách';
$name_td_nguoithem = 'khách';
$msg = "";
$data['name_td_nguoisua'] = "";
$data['name_td_nguoithem'] = "";

// kiểm tra có đăng nhập hay không
if (isset($_SESSION["da_dang_nhap"]) && $_SESSION["da_dang_nhap"] === true){
  //header("location: welcome.php");
 $name_td_nguoisua = htmlspecialchars($_SESSION["username"]);
} else {

    echo "<script>
                    alert('Bạn chưa đăng nhập - không thể chỉnh sửa dữ liệu');
                    window.history.back();
                    //window.location.href = 'index.php';
                    </script>";
                    exit;
    //header("location: index.php");

}

require './require/tatCaCacHam.php';

// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id){
    $data = xemMotTudien($id);
}

// Nếu không có dữ liệu tức không tìm thấy từ điển cần sửa
//if (!$_SESSION["da_dang_nhap"]){
//// header("location: index.php");
//}

// Nếu người dùng submit form
if (!empty($_POST['edit_tudien']))
{
    // Lay data
    $data['td_tv']        = isset($_POST['name']) ? $_POST['name'] : '';

    $data['td_ts']         = isset($_POST['sex']) ? $_POST['sex'] : '';

    $data['td_mt']    = isset($_POST['birthday']) ? $_POST['birthday'] : '';
$data['td_loai']    = isset($_POST['nameloai']) ? $_POST['nameloai'] : '';

    $data['td_id']          = isset($_POST['id']) ? $_POST['id'] : '';


    //$data['destd_ts']          = isset($_POST['ndestd_ts']) ? $_POST['ndestd_ts'] : '';
    $data['tienganh']          = isset($_POST['ntienganh']) ? $_POST['ntienganh'] : '';
    
 

  
    //$data['name_td_nguoithem'] = isset($_POST['name_td_nguoithem']) ? $_POST['name_td_nguoithem'] : '';

    $data['name_td_nguoisua'] =isset($_POST['name_td_nguoisua']) ? $_POST['name_td_nguoisua'] : '';

    // Validate thong tin
    $errors = array();
    if (empty($data['td_tv'])){
        $errors['td_tv'] = 'phần tiếng việt không được bỏ trống';
    }
    
    if (empty($data['td_ts'])){
        $errors['td_ts'] = 'phần tiếng slovak không được bỏ trống';
    }
    
    // Neu ko co loi thi insert i
    if (!$errors){
        suaTudien($data['td_id'], $data['td_tv'], $data['td_ts'], $data['td_mt'], $data['td_loai'], $data['tienganh'],$data['name_td_nguoisua'] );
        $msg = "<div class='container plugin1 bg-darkx text-center mb-2'><p class='text-center alert alert-success'>Cập nhật thành công</p></div>";
// Trở về trang danh sách
        //header("location: index.php");
    }
}



if (!empty($_POST['edit_tudien_backhome']))
{
    // Lay data
    $data['td_tv']        = isset($_POST['name']) ? $_POST['name'] : '';

    $data['td_ts']         = isset($_POST['sex']) ? $_POST['sex'] : '';

    $data['td_mt']    = isset($_POST['birthday']) ? $_POST['birthday'] : '';
$data['td_loai']    = isset($_POST['nameloai']) ? $_POST['nameloai'] : '';
    $data['td_id']          = isset($_POST['id']) ? $_POST['id'] : '';


    $data['destd_ts']          = isset($_POST['ndestd_ts']) ? $_POST['ndestd_ts'] : '';
    $data['tienganh']          = isset($_POST['ntienganh']) ? $_POST['ntienganh'] : '';
    
    // Validate thong tin
    $errors = array();
    if (empty($data['td_tv'])){
        $errors['td_tv'] = 'phần tiếng việt không được bỏ trống';
    }
    
    if (empty($data['td_ts'])){
        $errors['td_ts'] = 'phần tiếng slovak không được bỏ trống';
    }
    
    // Neu ko co loi thi insert i
    if (!$errors){
        suaTudien($data['td_id'], $data['td_tv'], $data['td_ts'], $data['td_mt'], $data['destd_ts'], $data['td_loai'], $data['tienganh']);
        header("location: index.php");
    }
}

ngatKetNoiCSDL();
?>

<?php include './inc/header.php'; ?>

    <?php echo $msg;  ?>

    <div class="container">
    <div class="card border-0 shadow my-3">
        <div class="card-body p-3">

        <form method="post" action="edit.php?id=<?php echo $data['td_id']; ?>">


            <div class="form-group">

                <label class="control-label text-primary">Definition*</label>

                <input type="text" name="sex" value="<?php echo $data['td_ts']; ?>" class="form-control" />
                <?php if (!empty($errors['td_ts'])) echo $errors['td_ts']; ?>

            </div>

            <div class="form-group">

                <label class="control-label text-primary">Vietnamese* </label>

                <input type="text" name="name" value="<?php echo $data['td_tv']; ?>" class="form-control" />
                <?php if (!empty($errors['td_tv'])) echo $errors['td_tv']; ?>

            </div>

            <div class="form-group">
                <label class="control-label text-primary">Mô tả</label>

                <textarea type="text" name="birthday" value="<?php echo htmlspecialchars($data['td_mt']); ?>"
                    class="form-control" rows="10"
                    cols="30"><?php echo htmlspecialchars($data['td_mt']); ?></textarea>

            </div>


            <div class="form-group">
                <label class="control-label ">Loại</label>

                <select name="nameloai" class="form-control">
                    <option value="<?php echo $data['td_loai']; ?>" selected><?php echo $data['td_loai']; ?> - (đây là giá
                        trị ban đầu)</option>
                    <option value="từ">word</option>
                    <option value="câu">sentence</option>
                    <option value="danh từ">noun </option>
                    <option value="tính từ">adj</option>
                    <option value="trạng từ">adv</option>
                    <option value="động từ">verb</option>
                    <option value="">không biết - null</option>
                    <option value="khác">khác</option>
                    <option value="PHP">PHP</option>
                    <option value="JS">JavaScript</option>
                    <option value="Programing Languages">Programing Languages</option>>
                </select>
            </div>


            <div class="form-group">
                <label class="control-label ">ID</label>
                <input type="text" name="id" value="<?php echo $data['td_id']; ?>" class="form-control-plaintext" />
            </div>

            <div class="form-group">
                <label class="control-label ">Ngày thêm</label>
                <input type="text" name="td_ngaythem" value="<?php echo $data['td_ngaythem']; ?>"
                    class="form-control" />
            </div>

            <div class="form-group">
                <label class="control-label text-primary">Người sửa</label>
                <input type="text" name="name_td_nguoisua" value="<?php if ($name_td_nguoisua ) { echo $name_td_nguoisua ; } ?>" class="form-control text-primary"
                    readonly />
            </div>

            <div class="form-group">
                <label class="control-label ">Người thêm</label>
                <input type="text" name="name_td_nguoithem" value="<?php if ($data['td_nguoithem']) { echo $data['td_nguoithem']; } ?>" class="form-control"
                    readonly />
            </div>

           
            <div class="form-group">
                <label class="control-label ">Angličtina</label>
                <input type="text" name="ntienganh" value="<?php echo $data['td_ta']; ?>" class="form-control" />
            </div>

            <input type="submit" name="edit_tudien" value="Update" class="btn btn-primary m-2" />
            <input type="submit" name="edit_tudien_backhome" value="Update And BackHome" class="btn btn-primary m-2" />

             <!-- NOTICE -->
             <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
            <strong>ENTER để xác nhận chỉnh sửa</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

            

        </form>
        </div>
    </div>
</div>

    <?php //include 'wg/footer.php';?>
</body>

</html>