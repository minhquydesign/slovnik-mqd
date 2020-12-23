<div class="container text-center my-3 " >
    
    <button onclick=" window.history.back();" class="btn btn-sm btn-primary" href="index.php">History Back</button>
    <a class="btn btn-sm btn-light" href="index.php">Home</a>
    <button onclick=" window.history.forward();" class="btn btn-sm btn-primary" href="index.php">History Prev</button>
</div>



<div class="container text-center ">
        <div class="card border-0 shadow my-3">
            <div class="card-body p-3">






                <div id="VIEW" class="container plugin1 bg-darkx mb-2">




<h4 class="class">Searchformsite</h4>
<form class="" action="search-all.php" method="get">

<input type="text" name="search" class="form-control text-center " placeholder="Type to search..."/>
<small id="ema" class="form-text text-mutedx">request in all database</small>

            <button type="submit" name="submit" class="btn btn-primary mt-1">Search</button>



        </form>
        </div>
</div>
  </div>
</div>

<script>
$('.alert').alert()
</script>
<script src="./inc/copytext.js"></script>
<?php
// GET IP
function get_user_ip2() {
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
?>
<!-- Footer -->
<footer class="container page-footer font-small blue p-4">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3  card border-0 shadow my-3 ">© 2019 Copyright by
        <a href="https://minhquydesign.com/"> minhquydesign.com</a>
        <small class="text-bold">v <a href="./info.php">4.1</a> -
            <?php date_default_timezone_set('Europe/Bratislava'); echo date('Y/m/d H:i:s',time()); ?>
            <?php echo ' - Your IP '; echo get_user_ip2(); ?></small> <?php echo getCurURL(); ?>
    </div>
    <!-- Copyright -->


</footer>
<!-- Footer -->

