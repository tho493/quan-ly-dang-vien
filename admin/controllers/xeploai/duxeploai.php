<?php
//load model
require_once('admin/models/xeploai.php');
if (!empty($_POST)) {
    
	$arr = $_POST['XepLoai'];
	
	/*
	echo '<pre>';
	print_r($arr);	
	echo '</pre>';
	die();
	*/
	
	foreach ($arr as $key => $value){
		foreach ($value as $k => $v){
			$obj = array(
				'Id' => $k,		
				'HoSoId' => $key,
				'Nam' => escape($_POST['Nam']),
				'DUXepLoai' => $v,
				'NguoiTao' => $_SESSION['user']['Username']
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

$title = 'Đảng ủy xếp loại đảng viên';

//load view
require('admin/views/xeploai/duxeploai.php');
