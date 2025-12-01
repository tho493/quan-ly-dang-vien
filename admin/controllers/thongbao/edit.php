<?php
//load model
require_once('admin/models/thongbao.php');
if (!empty($_POST)) {
    $obj = array(
        'Id' => intval($_POST['id']),		
		'ThongBao' => escape($_POST['ThongBao']),
        'NguoiTao' => $_SESSION['user']['Username']
    );	
    $id = save('thongbao', $obj);
		
	//Chuyển sang trang upload
    header('location:admin.php?controller=thongbao&action=upload&id='.$id.'');
} else {
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$options = array(
	'select' => 'thongbao.*',
	'where' => '(thongbao.Id='.$id.')',
    'order_by' => 'Id ASC'
);
$object = Select_a_record('thongbao', $options);

$title = ($id == 0) ? 'Thêm mới' : 'Sửa';

//load view
require('admin/views/thongbao/edit.php');
