<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["da_dang_nhap"]) || $_SESSION["da_dang_nhap"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php require '../wg/head.php'; ?>
<body>
    <?php include '../wg/header.php';?>

    <div class="container">
      <div class="card border-0 shadow my-3">
        <div class="card-body p-3">
            <div class="page-header">
                <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
            </div>
            <ul class="list-inline HOME">
            <li class="list-inline-item btn btn-primary mb-2">
                <a href="../index.php" class="text-white mb-2"><i class="fas fa-home" aria-hidden="true"></i> Homepage</a></li>
                
            <li class="list-inline-item btn btn-waring mb-2">
                <a href="../reset-password.php" class="text-black mb-2">Reset Your Password</a></li>
                
            <li class="list-inline-item btn btn-primary mb-2">
                <a href="../logout.php" class="text-white mb-2"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>

            <li class="list-inline-item btn btn-primary mb-2">
                <a href="../index-rand.php" class="text-white mb-2"><i class="fas fa-random" aria-hidden="true"></i> Xem ngẫu nhiên</a></li>
                
            <li class="list-inline-item btn btn-primary mb-2">
                <a href="../index-stt-desc.php" class="text-white mb-2"><i class="fas fa-border-all"></i> Xem tất cả từ điển</a></li>
                
                
           </ul>

        </div>
    </div>
</div>
<?php include '../wg/footer.php';?>
</body>
</html>