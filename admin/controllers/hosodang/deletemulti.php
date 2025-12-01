<?php
//load model
require_once('admin/models/hosodang.php');
require_once('admin/models/taikhoan.php');

$ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
if (is_array($ids)){
	$arrid = $ids;
}else{
	$arrid[0] = $ids;
}
unset($ids);
reset($arrid);
foreach ($arrid as $item){
	taikhoan_delete_byhosoid($item);
	hosodang_files_delete_by_hosoid($item);
	hosodang_delete($item);
	//echo $item .'<br>';
}

header('location:admin.php?controller=hosodang');