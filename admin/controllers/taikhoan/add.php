<?php
//load model
if (!empty($_POST)) {
    $taikhoan = array(
        'Id' => intval($_POST['Id']),
        'Username' => escape($_POST['Username']),
		'Password' => MD5($_POST['Password']),		
		'HoSoId' => intval($_POST['HoSoId']),
        'Disable' => intval($_POST['Disable'])		
    );
	
    $id = save('taikhoan', $taikhoan);
    header('location:admin.php?controller=taikhoan');
} else {
}

$hosoid = isset($_GET['hosoid']) ? $_GET['hosoid'] : '';

$hosodang = get_all('hosodang', array(
    'order_by' => 'Id ASC'
));

$title = 'Thêm tài khoản';

//load view
require('admin/views/taikhoan/add.php');
