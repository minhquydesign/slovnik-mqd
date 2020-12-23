

 <?php


// Initialize the session
    session_start();
    
// Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["da_dang_nhap"]) && $_SESSION["da_dang_nhap"] === true){
      header("location: welcome.php");
      exit;
  }
  
// Include config file
  require_once "config.php";
  
// Define variables and initialize with empty values
  $username = $password = "";
  $username_err = $password_err = "";
  
// Processing form data when form is submitted
  if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["da_dang_nhap"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}



?>

<!DOCTYPE html>
<html lang="en">

<?php require 'wg/head.php'; ?>
<body>
	<?php include 'wg/header.php'; ?>
	
  <?php include 'wg/menu-backhome.php'; ?>


<div class="container">
  <div class="card border-0 shadow my-3">
    <div class="card-body p-3">
<p class="text-center">Đăng ký tài khoản thành công!</p>
</div>
  </div>
</div>
  <div class="container">
      <div class="card border-0 shadow my-3">
        <div class="card-body p-3">

            <div class="wrapper">
                <h2>Loginpage</h2>
                <p>Vui lòng điền thông tin đăng nhập của bạn để đăng nhập.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label>Tài khoản</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                        <span class="help-block"><?php echo $username_err; ?></span>
                    </div>    
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control">
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                    <p>Bạn không có tài khoản <a href="register.php">Đăng ký</a>.</p>
                </form>
            </div>



        </div>
    </div>
</div>

<?php include 'wg/footer.php'; ?>
</body>
</html>