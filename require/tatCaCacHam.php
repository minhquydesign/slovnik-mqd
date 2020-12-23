<?php
// 12-12-20
/// Function
// ketNoiCSDL  // hàm phụ
// ngatKetNoiCSDL  // hàm phụ
/// 
// layTatcaTudienMoiNhat
// __CuNhat
// layTatCaThanhVien
// xoaTudien
// timTudien

// getUserIP

// Biến kết nối toàn cục
global $conn;

//// Hàm Kết Nối Database
function ketNoiCSDL()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Nếu chưa kết nối thì thực hiện kết nối
    if (!$conn){
        $conn = mysqli_connect('localhost', 'minhquy1_admin', 'Quy0355683221', 'minhquy1_qtudien_private2') or die ('Không thể kết nối CSDL');
        // Thiết lập font chữ kết nối
        mysqli_set_charset($conn, 'utf8');
    }
}


/// HÀM NGẮT KẾT NỐI db
function ngatKetNoiCSDL()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Nếu đã kêt nối thì thực hiện ngắt kết nối
    if ($conn){
        mysqli_close($conn);
    }
}

//// HÀM LẤY TẤT CẢ TỪ ĐIỂN default
function lay20TuDienMoiNhat()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    ketNoiCSDL();
    
    // Câu truy vấn lấy tất cả từ điển
    $sql = "select * from tudien ORDER BY td_id DESC LIMIT 20";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    // Mảng chứa kết quả
    $result = array();
    
    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
    
    // Trả kết quả về
    return $result;
}

function layTatCaTuDienMoiNhat()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    ketNoiCSDL();
    
    // Câu truy vấn lấy tất cả từ điển
    $sql = "select * from tudien ORDER BY td_id DESC";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    // Mảng chứa kết quả
    $result = array();
    
    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
    
    // Trả kết quả về
    return $result;
}

function layTatCaTuDienCuNhat()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    ketNoiCSDL();
    
    // Câu truy vấn lấy tất cả từ điển
    $sql = "select * from tudien ORDER BY td_id ASC";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    // Mảng chứa kết quả
    $result = array();
    
    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
    
    // Trả kết quả về
    return $result;
}

//// HÀM LẤY TẤT CẢ user
function layTatCaThanhVien()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    ketNoiCSDL();
    
    // Câu truy vấn lấy tất cả từ điển
    $sql = "select * from users ORDER BY created_at ASC";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    // Mảng chứa kết quả
    $result = array();
    
    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
    
    // Trả kết quả về
    return $result;
}

//// *HÀM LẤY TẤT CẢ TỪ ĐIỂN limit 20row td_id-giam
function layNgauNhienTudien()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    ketNoiCSDL();
    
    // Câu truy vấn lấy tất cả từ điển
    $sql = "select * from tudien ORDER BY td_id DESC LIMIT 20";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    // Mảng chứa kết quả
    $result = array();
    
    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
    
    // Trả kết quả về
    return $result;
}

/// , layTudienNgauNhien()

function layTatCaTudienTheoId()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    ketNoiCSDL();
    
    // Câu truy vấn lấy tất cả từ điển
    $sql = "select * from tudien ORDER BY td_id DESC";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    // Mảng chứa kết quả
    $result = array();
    
    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
    
    // Trả kết quả về
    return $result;
}

//// HÀM LẤY từ điển THEO ID
function xemMotTudien($tudien_id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    ketNoiCSDL();
    
    // Câu truy vấn lấy tất cả từ điển
    $sql = "select * from tudien where td_id = {$tudien_id}";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    // Mảng chứa kết quả
    $result = array();
    
    // Nếu có kết quả thì đưa vào biến $result
    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }
    
    // Trả kết quả về
    return $result;
}



//// HÀM THÊM Từ điển - require tudien-add.php
function add_tudien($tudien_td_tv, $tudien_td_ts, $tudien_td_mt, $tudien_loai,$tudien_nguoithem)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    ketNoiCSDL();
    
    // Chống SQL Injection
    $tudien_td_tv = addslashes($tudien_td_tv);
    $tudien_td_ts = addslashes($tudien_td_ts);
    $tudien_td_mt = addslashes($tudien_td_mt);
    $tudien_loai = addslashes($tudien_loai);
    $tudien_nguoithem = addslashes($tudien_nguoithem);
    
    // Câu truy vấn thêm
    $sql = "
    INSERT INTO tudien(tiengviet, td_ts, td_mt, loai, nguoithem) VALUES
    ('$tudien_td_tv','$tudien_td_ts','$tudien_td_mt','$tudien_loai','$tudien_nguoithem')
    ";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    return $query;
}


// HÀM SỬA TỪ ĐIỂN STUDIENT-EDIT.PHP
function suaTudien($tudien_id, $tudien_td_tv, $tudien_td_ts, $tudien_td_mt, $tudien_loai, $student_tienganh,$tudien_nguoisua)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    ketNoiCSDL();
    
    // Chống SQL Injection
    $tudien_td_tv       = addslashes($tudien_td_tv);
    $tudien_td_ts        = addslashes($tudien_td_ts);
    $tudien_td_mt   = addslashes($tudien_td_mt);

    $tudien_loai   = addslashes($tudien_loai);


    $student_tienganh   = addslashes($student_tienganh);

    $tudien_nguoisua  = addslashes($tudien_nguoisua);
    
    // Câu truy sửa
    $sql = "
    UPDATE tudien SET
    td_tv = '$tudien_td_tv',
    td_ts = '$tudien_td_ts',
    td_mt = '$tudien_td_mt',

    td_loai = '$tudien_loai',

    td_ta = '$student_tienganh',
    td_nguoisua = '$tudien_nguoisua'

    WHERE td_id = $tudien_id
    ";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    return $query;
}


//// HÀM XÓA TỪ DIEN
function xoaTudien($tudien_id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    ketNoiCSDL();
    
    // Câu truy sửa
    $sql = "
    DELETE FROM tudien
    WHERE td_id = $tudien_id
    ";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    return $query;
}



/// ngauNhien10Tudien
function ngauNhien10Tudien()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    ketNoiCSDL();
    
    // Câu truy vấn lấy tất cả từ điển
    $sql = "select * from tudien ORDER BY RAND() LIMIT 10";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    // Mảng chứa kết quả
    $result = array();
    
    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
    
    // Trả kết quả về
    return $result;
}



function tongTuVung()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    ketNoiCSDL();
    
    // Câu truy vấn lấy tất cả từ điển
    $sql = "select * from tudien";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    // Mảng chứa kết quả
    $ket_qua = array();
    
    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $ket_qua[] = $row;
        }
    }
    // đếm số dòng
    $result = count($ket_qua);
    // Trả kết quả về
    
}


// GET IP
function get_user_ip() {
    if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') > 0) {
            $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($addr[0]);
        } else {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

function getCurURL()
{

$uri = $_SERVER['REQUEST_URI'];
//echo $uri; //Outputs: URI

$query = $_SERVER['QUERY_STRING'];
//echo $query; //Outputs: Query String

$domain = $_SERVER['HTTP_HOST'];
//echo $domain; //Outputs: HOST

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$url = $_SERVER['REQUEST_URI'];

return $uri;

}

