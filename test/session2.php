<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      
      
<pre class="alert alert-primary" role="alert">
         &#x3C;?php
   session_start();
   
   if (isset($_SESSION[&#x27;counter&#x27;])) {
      $_SESSION[&#x27;counter&#x27;] = 1;
   }
   else {
      $_SESSION[&#x27;counter&#x27;]++;
   }
   
   $msg = &#x22;B&#x1EA1;n &#x111;&#xE3; truy c&#x1EAD;p trang n&#xE0;y &#x22;.  $_SESSION[&#x27;counter&#x27;];
   $msg .= &#x22; l&#x1EA7;n trong session n&#xE0;y.&#x22;;
   
   echo ( $msg );
?&#x3E;
&#x3C;p&#x3E;
   &#x110;&#x1EC3; ti&#x1EBF;p t&#x1EE5;c, m&#x1EDD;i b&#x1EA1;n click v&#xE0;o trang sau: &#x3C;br /&#x3E;
   
   &#x3C;a  href=&#x22;nextpage.php?&#x3C;?php echo htmlspecialchars(SID); ?&#x3E;&#x22;&#x3E;
&#x3C;/p&#x3E;
      </pre>
      
<textarea id="w3mission" rows="4" cols="50" class="alert alert-dark" role="alert">
 &#x3C;?php
   session_start();
   
   if (isset($_SESSION[&#x27;counter&#x27;])) {
      $_SESSION[&#x27;counter&#x27;] = 1;
   }
   else {
      $_SESSION[&#x27;counter&#x27;]++;
   }
   
   $msg = &#x22;B&#x1EA1;n &#x111;&#xE3; truy c&#x1EAD;p trang n&#xE0;y &#x22;.  $_SESSION[&#x27;counter&#x27;];
   $msg .= &#x22; l&#x1EA7;n trong session n&#xE0;y.&#x22;;
   
   echo ( $msg );
?&#x3E;
&#x3C;p&#x3E;
   &#x110;&#x1EC3; ti&#x1EBF;p t&#x1EE5;c, m&#x1EDD;i b&#x1EA1;n click v&#xE0;o trang sau: &#x3C;br /&#x3E;
   
   &#x3C;a  href=&#x22;nextpage.php?&#x3C;?php echo htmlspecialchars(SID); ?&#x3E;&#x22;&#x3E;
&#x3C;/p&#x3E;
</textarea>      

</br>

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>


<?php
   session_start();
   
   if (isset($_SESSION['counter'])) {
      $_SESSION['counter'] = 1;
   }
   else {
      $_SESSION['counter']++;
   }
   
   $msg = "Bạn đã truy cập trang này ".  $_SESSION['counter'];
   $msg .= " lần trong session này.";
   
   echo ( $msg );
?>
<p>
   Để tiếp tục, mời bạn click vào trang sau: <br />
   
   <a  href="nextpage.php?<?php echo htmlspecialchars(SID); ?>">
</p>