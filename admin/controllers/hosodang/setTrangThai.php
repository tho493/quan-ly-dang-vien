<?php
//load model
require_once('admin/models/hosodang.php');
$status = isset($_GET['status']) ? $_GET['status'] : 0;
$ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
if (is_array($ids)){
	$arrid = $ids;
}else{
	$arrid[0] = $ids;
}
unset($ids);
reset($arrid);
foreach ($arrid as $item){
	hosodang_setTrangThai($item, $status);	
}

header('location:admin.php?controller=hosodang');