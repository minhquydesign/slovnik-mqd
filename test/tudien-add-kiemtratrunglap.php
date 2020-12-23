<?php

$servername = "localhost";
$username = "minhquy1_qtudien";
$password = "Quy0355683221";
$db_name = "minhquy1_qtudien";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);


mysqli_set_charset($conn, 'utf8');
// Check connection.
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}


if(isset($_POST['add_tudien'])){
    
    // check username and email empty or not
    if(!empty($_POST['name']) && !empty($_POST['sex'])){
        
        // Escape special characters.
        $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['name']));
        $user_email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['sex']));
        
        //CHECK EMAIL IS VALID OR NOT
       // if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            
            // CHECK IF EMAIL IS ALREADY INSERTED OR NOT
            $check_email = mysqli_query($conn, "SELECT `td_ts` FROM `tudien` WHERE td_ts = '$user_email'");
            
            if(mysqli_num_rows($check_email) > 0){    
                
                echo "<h3>Đã tồn tại từ này.</h3>";
                
            }else{
                
                // INSER USERS DATA INTO THE DATABASE
                $insert_query = mysqli_query($conn,"INSERT INTO `tudien`(tiengviet,td_ts) VALUES('$username','$user_email')");

                //CHECK DATA INSERTED OR NOT
                if($insert_query){
                    echo "<script>
                    alert('Data inserted');
                    window.location.href = 'tudien-add-kiemtratrunglap.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Opps something wrong!</h3>";
                }
                
                
            }
            
            
        //}else{
            //echo "Đã tồn";
        //}
        
    }else{
        echo "<h4>Please fill all fields</h4>";
    }
    
}else{
    // set header response code
    //http_response_code(404);
    //echo "<h1>404 Page Not Found!</h1>";
}
//end isset add_tudien
?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Không trùng lặp</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php include 'wg/header.php';?>
<?php include 'wg/menu-backhome.php';?>


  <div class="container">
      
       <!-- INSERT DATA -->
        <div class="form">
            <h2>Insert Data khong trung lap</h2>
            <form action="tudien-add-kiemtratrunglap.php" method="post">
                <strong>Tiếng việt*</strong><br>
                <input type="text" name="name" placeholder="Tiếng việt" required><br>
                <strong>Tiếng slovak*</strong><br>
                <input type="text" name="sex" placeholder="Tiếng slovak" required><br>
                <input type="submit" value="Insert" name="add_tudien">
            </form>
        </div>
        <!-- END OF INSERT DATA SECTION -->
        <hr>

</body>

</html>
