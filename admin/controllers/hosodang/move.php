<?php
//load model
require_once('admin/models/hosodang.php');
if (!empty($_POST)) {
    $hoso = array(
        'Id' => intval($_POST['id']),
        'NgayChuyenSH' => date('Y-m-d', strtotime($_POST['NgayChuyenSH'])),
        'NoiChuyenSH' => escape($_POST['NoiChuyenSH']),
		'TrangThai' => 1
    );
    $id = save('hosodang', $hoso);    
	
	$hosoid = intval($_POST['id']);
    header('location:admin.php?controller=hosodang&action=upload&id='.$hosoid.'');
} else {
}

if (isset($_GET['id'])) $id = intval($_GET['id']); else $id=0;
$title = 'Đảng viên chuyển sinh hoạt';

//load view
require('admin/views/hosodang/move.php');