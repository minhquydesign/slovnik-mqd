<?php include './inc/header.php'; ?>


<div class="container">

    <h6 class="page-header text-center alert alert-success pt-3 pb-3">Đây là trang thông tin Website</h6>




</div>

<div class="container">
    <div class="card border-0 shadow my-3">
        <div class="card-body p-3">








            <div id="tableindex" class="containerx tableindex">
                <h4 class="class">CSDL mới</h4>
                <hr>
                <h6 class="class">tbl_tudien (tudien)</h6>
                    <ul>
                        <li>td_id INT AUTOINCREMENT PRIMARY KEY not null </li>
                        <li>td_tv varchar</li>
                        <li>td_ts - </li>
                        <li>td_mt text</li>
                        <li>tienganh varchar</li>
                        <li>nguoithem varchar</li>
                        <li>nguoisua varchar</li>
                        <li>td_ngaythem varchar created_at </li>
                        <li>ngaysua varchar updated_at</li>


                        <li>loai varchar</li>
                        <li>chude varchar</li>
                        <li>...</li>

                    </ul>
                    <h6>CÁC LIÊN KẾT</h6>
                    <ul>
                        
                        <li>index.php</li>
                        <li>view.php?id=xxxx - xem 1row</li>
                        <li>edit.php?id=xxxx lấy từ id và cập nhật theo id, báo lỗi trong tvts</li>
                        <li>insert.php - báo lỗi trong tvts, báo lỗi trùng cột td_ts</li>
                        <li>search.php / search.php?search=XXXX&submit= - lấy theo tv và ts</li>
                        <li>search-all.php / search-all.php?search=XXXX&submit= - lấy theo * </li>

                        <li>index-stt-asc.php / index-stt-desc.php</li>
                        <li></li>
                        <li>login.php</li>
                        <li>register.php</li>
                        <li>register.php</li>


                    </ul>


                  


            </div>
        </div>
    </div>



    <?php require './inc/footer.php'; ?>