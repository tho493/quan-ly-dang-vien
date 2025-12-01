<?php
//load model
if (!empty($_POST)) {
    $taikhoan = array(
        'Id' => intval($_POST['Id']),
        'Username' => escape($_POST['Username']),		
		'HoSoId' => intval($_POST['HoSoId']),
        'Disable' => intval($_POST['Disable'])		
    );
	
    $id = save('taikhoan', $taikhoan);
    header('location:admin.php?controller=taikhoan');
} else {
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$taikhoan = get_a_record('taikhoan', $id);

$hosodang = get_all('hosodang', array(
    'order_by' => 'Id ASC'
));

$title = ($id == 0) ? 'Thêm tài khoản' : 'Sửa tài khoản';

//load view
require('admin/views/taikhoan/edit.php');
