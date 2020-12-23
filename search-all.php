

<?php

require './require/tatCaCacHam.php';
ketNoiCSDL();


?>

<?php include './inc/header.php'; ?>




    <div class="container">
      <div class="card border-0 shadow my-3">
        <div class="card-body">

            <h4 class="class">Search all from database</h4>
            <form class="text-center" action="search-all.php" method="get">

                <input type="text" name="search" class="form-control text-center"" placeholder="Nhập nội dung cần tìm.."/>
                <small id="ema" class="form-text text-muted">Nhập từ khoá liên quan trong Vietnamese và slovenčinu.</small>

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
            $query = "SELECT * FROM tudien WHERE (td_tv like '%$search%') OR (td_ts like '%$search%') OR (td_id like '%$search%') OR (td_mt like '%$search%') ";
            
            $sql = mysqli_query($conn, $query);
 			//echo $sql;
            $num = mysqli_num_rows($sql);
            if ($num > 0) {
                echo $num." kết quả chúng tôi tìm được từ khoá <button class='btn-sm btn btn-primary'>".$search."</button> trong CSDL</br>";

//border="1" cellspacing="0" cellpadding="10" 

                echo '<table class="table table-sm table-borderless table-hover table-striped">';

                echo '<tr>';
                echo "<th>VIETNAM</th>";
                echo "<th>định nghĩa</th>";
                echo "<th>ID</th>";
                echo "<th>MÔ TẢ</th>";
                echo "<th>Tuỳ chọn</th>";
                echo '</tr>';

                foreach( $sql as $row) {
                    


                    echo '<tr>';
                    echo "<td>{$row['td_tv']}</td>";
                    echo "<td>{$row['td_ts']}</td>";
                    echo "<td>{$row['td_id']}</td>";
                    echo "<td>{$row['td_mt']}</td>";

                    echo "<td><a href='edit.php?id={$row['td_id']}'>edit & require login</a> - <a class='btn btn-sm btn-primary' href='view.php?id={$row['td_id']}'>view</a></td>";

                    echo '</tr>';
                }
                echo '</table>';
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


<?php require './inc/footer.php'; ?>
