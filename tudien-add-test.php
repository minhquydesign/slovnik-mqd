<?php
////hàm dùng trong trang
//add_tudien
////các phần gửi POST
//tiengviet, td_ts, td_mt, nguoithem (td_ngaythem đã tự động trong mysql) 

//không cần cấu hình id data[td_id]


session_start();

$nguoithem = 'khách'; 

if(isset($_SESSION["da_dang_nhap"]) && $_SESSION["da_dang_nhap"] === true){
  //header("location: welcome.php");
 $nguoithem = htmlspecialchars($_SESSION["username"]);

};
//requirefile
//require './libs/tudien.php';
// Biến kết nối toàn cục
global $conn;

//// Hàm Kết Nối Database
function connect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Nếu chưa kết nối thì thực hiện kết nối
    if (!$conn){
        $conn = mysqli_connect('localhost', 'minhquy1_qtudien', 'Quy0355683221', 'minhquy1_qtudien') or die ('Can\'t not connect to database');
        // Thiết lập font chữ kết nối
        mysqli_set_charset($conn, 'utf8');
    }
}


//// HÀM NGẮT KẾT NỐI db
function disconnect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Nếu đã kêt nối thì thực hiện ngắt kết nối
    if ($conn){
        mysqli_close($conn);
    }
}


//// HÀM THÊM Từ điển - require tudien-add.php
function add_tudien($tudien_td_tv, $tudien_td_ts, $tudien_td_mt,$tudien_nguoithem)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    connect_db();
    
    // Chống SQL Injection
    $tudien_td_tv = addslashes($tudien_td_tv);
    $tudien_td_ts = addslashes($tudien_td_ts);
    $tudien_td_mt = addslashes($tudien_td_mt);
    $tudien_nguoithem = addslashes($tudien_nguoithem);
    
    // Câu truy vấn thêm vào
    $sql = "
    INSERT INTO tudien(tiengviet, td_ts, td_mt, nguoithem) VALUES
    ('$tudien_td_tv','$tudien_td_ts','$tudien_td_mt','$tudien_nguoithem')
    ";


    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    return $query;
}
////and require tudien.php

//// Nếu người dùng submit form - kiểm tra có $ POST không
if (!empty($_POST['add_tudien']))
{
    // Lay data từ biến $_POST
    $data['td_tv']        = isset($_POST['add_td_tv']) ? $_POST['add_td_tv'] : '';

    $data['td_ts']         = isset($_POST['add_td_ts']) ? $_POST['add_td_ts'] : '';

    $data['td_mt']    = isset($_POST['add_td_mt']) ? $_POST['add_td_mt'] : '';

    $data['nguoithem']    = isset($_POST['add_nguoithem']) ? $_POST['add_nguoithem'] : '';

    // Kiểm tra còn bao loi khong - Validate thong tin
    $errors = array();
    if (empty($data['td_tv'])){
        $errors['td_tv'] = 'Chưa nhập nội dung';
    }
    
    if (empty($data['td_ts'])){
        $errors['td_ts'] = 'Chưa nhập nội dung';
    }
    

// Kiểm tra username hoặc email có bị trùng hay không
$sql = "SELECT * FROM tudien WHERE td_ts = $data['td_ts']";
 

$result = mysqli_query($conn, $sql);
 
// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($result) > 0)
{
// Sử dụng javascript để thông báo
echo '<script language="javascript">alert("Thông tin đăng nhập bị sai"); window.location="index.php";</script>';

$errors['td_ts'] = 'trung';
 
// Dừng chương trình
die ();
}

    // Neu ko co loi thi insert
    if (!$errors){
//chạy hàm add_tudien
        add_tudien($data['td_tv'], $data['td_ts'], $data['td_mt'],$data['nguoithem']);


 // Trở về trang danh sách index
        header("location: index.php");
        
        
    }
}
// ngắt kết nối DATABASE
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
        <!--h2 class="display-4 text-center">Danh sách từ điển</h2-->
        <br/>
        <form method="post" action="tudien-add-test.php">


      
        <div class="form-group row">
            <label class="col-4 col-md-3 col-lg-2 control-label ">Tiếng Slovak*</label>
            <div class="col-8 col-md-9 col-lg-10">
                <input type="text" name="add_td_ts" value="<?php echo !empty($data['td_ts']) ? $data['td_ts'] : ''; ?>" class="form-control "/>
                <?php if (!empty($errors['td_ts'])) echo $errors['td_ts']; ?>
                <small id="emailHelp" class="form-text text-muted">Ràng buộc</small>
            </div>
        </div>

     <div class="form-group row">
            <label class="col-4 col-md-3 col-lg-2 control-label">Tiếng việt*</label>
            <div class="col-8 col-md-9 col-lg-10">
                <input type="text" name="add_td_tv" value="<?php echo !empty($data['td_tv']) ? $data['td_tv'] : ''; ?>" class="form-control"/>
                <?php if (!empty($errors['td_tv'])) echo $errors['td_tv']; ?>
                <small id="emailHelp" class="form-text text-muted">Ràng buộc</small>
            </div>
        </div>

        
        <div class="form-group row">
            <label class="col-4 col-md-3 col-lg-2 control-label">Mô tả tiếng việt</label>
            <div class="col-8 col-md-9 col-lg-10">
                <textarea type="text" name="add_td_mt" value="<?php echo !empty($data['td_mt']) ? $data['td_mt'] : ''; ?>" class="form-control" rows="7"/></textarea>
                <small id="emailHelp" class="form-text text-muted">Có thể bỏ trống</small>
            </div></div>


            <div class="form-group row hide">
                <label class="col-4 col-md-3 col-lg-2 control-label">Người thêm</label>
                <div class="col-8 col-md-9 col-lg-10">
                    <input type="text" name="add_nguoithem" value="<?php echo $nguoithem; ?>" class="form-control hide" readonly/>
                    <small id="x" class="form-text text-muted">Không thể sửa.<a href= "/login.php">đăng nhập</a> có thể sửa</small>
                </div></div>
                
                
                
                <input type="submit" name="add_tudien" value="Lưu vào hệ thống"/ class="btn btn-primary mb-2 text-center">
            </form>
        </div>

<?php include 'wg/wg-huong-dan-add-tu-dien.php';?>
<?php include 'wg/footer.php';?>
</body>
</html>
