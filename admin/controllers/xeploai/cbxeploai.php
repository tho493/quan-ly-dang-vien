<?php
//load model
require_once('admin/models/xeploai.php');
if (!empty($_POST)) {
    
	$arr = $_POST['XepLoai'];
	
	/*	
	echo '<pre>';
	print_r($arr);	
	echo '</pre>';
	*/
	
	foreach ($arr as $key => $value){
		foreach ($value as $k => $v){
			$obj = array(
				'Id' => $k,		
				'HoSoId' => $key,
				'Nam' => escape($_POST['Nam']),
				'CBXepLoai' => $v
			);	
			$id = save('xeploai', $obj);			
		}
	}
		
	//Chuyển sang trang upload
    //header('location:admin.php?controller=xeploai&action=upload&id='.$id.'');
	header('location:admin.php?controller=xeploai');
} else {
}

$chiboid = isset($_GET['chiboid']) ? $_GET['chiboid'] : 0;
$nam = isset($_GET['nam']) ? $_GET['nam'] : date('Y');

$objects = getby_chibo_nam($chiboid, $nam);

$chibo = get_a_record('chibo', $chiboid);

$title = 'Chi bộ xếp loại đảng viên';

//load view
require('admin/views/xeploai/cbxeploai.php');
