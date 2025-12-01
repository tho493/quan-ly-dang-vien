<?php
//load model
require_once('admin/models/xeploai.php');
if (!empty($_POST)) {
    $obj = array(
        'Id' => intval($_POST['id']),		
        'HoSoId' => intval($_POST['HoSoId']),
		'Nam' => escape($_POST['Nam']),
		'CBXepLoai' => escape($_POST['CBXepLoai']),
		'DUXepLoai' => escape($_POST['DUXepLoai']),
        'NguoiTao' => $_SESSION['user']['Username']
    );	
    $id = save('xeploai', $obj);
		
	//Chuyển sang trang upload
    header('location:admin.php?controller=xeploai');
} else {
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$options = array(
	'select' => 'xeploai.*, hosodang.HoTen',
	'where' => '(xeploai.HoSoId = hosodang.Id) AND (xeploai.Id='.$id.')',
    'order_by' => 'Id ASC'
);
$object = Select_a_record('xeploai, hosodang', $options);

$options_hoso = array(
    'select' => 'hosodang.Id, hosodang.HoTen, chibo.TenChiBo',
	'where' => '(hosodang.ChiBoId = chibo.Id)',
    'order_by' => 'hosodang.Id ASC'
);
$list_hoso = get_all('hosodang, chibo', $options_hoso);


$title = ($id == 0) ? 'Thêm mới' : 'Sửa';

//load view
require('admin/views/xeploai/edit.php');
