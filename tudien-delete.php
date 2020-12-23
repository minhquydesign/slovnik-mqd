<?php
//require
require './require/tatCaCacHam.php';

// Thực hiện xóa
$id = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($id){
	xoaTudien($id);
}

// Trở về trang danh sách
header("location:index.php");