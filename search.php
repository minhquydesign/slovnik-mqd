<?php
//include("config.php"); search2

session_start();


require './require/tatCaCacHam.php';
//$students = get_all_students();
ketNoiCSDL();


?>

<?php include './inc/header.php'; ?>

<!DOCTYPE html>
<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Slovník online </title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
<link rel="stylesheet" href="theme/bootstrap.min.css">
<link rel="stylesheet" href="css/sb-admin-2.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i&display=swap&subset=vietnamese"
    rel="stylesheet">
<script src="https://kit.fontawesome.com/9041096289.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


<body class="x">

    <?php //include 'wg/header.php';?>
    <?php //include 'wg/menu-backhome.php';?>


    <div class="container">
        <div class="card border-0 shadow my-3">
            <div class="card-body text-center">

                <h4 class="class">Searchbox</h4>
                <form class="text-center" action="" method="get">

                    <input type="text" name="search" class="form-control text-center"" placeholder=" Nhập nội dung cần tìm.." />
                    <small id="ema" class="form-text text-muted">Nhập từ khoá liên quan trong tv và word definition.</small>

                    <button type="submit" name="submit" class="btn btn-primary mb-2 mt-2 text-center">TÌM</button>



                </form>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="card border-0 shadow my-3">
            <div class="card-body table-responsive">

                <?php
        if (isset( $_GET['submit']) && $_GET["search"] != '') {
            $search = $_GET['search'];
            $query = "SELECT * FROM tudien WHERE (td_tv like '%$search%') OR (td_ts like '%$search%') ";
            
            $sql = mysqli_query($conn, $query);
 			//echo $sql;
            $num = mysqli_num_rows($sql);
            if ($num > 0) {
                echo $num." kết quả về với từ khoá <mark>".$search."</mark>";

//border="1" cellspacing="0" cellpadding="10" 

                echo '<div class="table table-sm table-borderless table-hover table-striped">';

               // echo '<tr>';
               // echo "<th>Vietnamese</th>";
               // echo "<th>SLOVENČINU</th>";
               // echo "<th>ID</th>";
               // echo "<th>POPIS</th>";
               // echo "<th>Option</th>";
                //echo '</tr>';

                foreach( $sql as $row) {
                    

                    echo "<hr>";
                    echo "<td>{$row['td_id']}</td></br>";
                    
                    echo "<td>{$row['td_ts']}</td</br>";
                    echo " - <small class='blue btn btn-default btn-sm active'>{$row['td_tv']}</small></br>";
                    
                    //echo "<pre>{$row['td_mt']}</pre>";

                    if ($row['td_mt']) { echo "<pre  class='alert alert-success' style='font-family:Roboto'>" . $row['td_mt'] . "</pre>"; }

                    echo "<td><a href='edit.php?id={$row['td_id']}'>edit</a> - <a href='./'>delete</a></td>";

                   
                }
                echo '</div>';
            } 
            else {
                echo "Không tìm thấy kết quả";
            }
        }

        ngatKetNoiCSDL();


        ?>
            </div>
        </div>
    </div>


    <?php include './inc/footer.php'; ?>