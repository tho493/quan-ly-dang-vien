<?php
//load model
if (!empty($_POST)) {
    $chibo = array(
        'Id' => intval($_POST['Id']),
        'TenChiBo' => escape($_POST['TenChiBo']),
		'BiThu' => intval($_POST['BiThu']),
        'MoTa' => escape($_POST['MoTa'])		
    );
	
    $id = save('chibo', $chibo);
    header('location:admin.php?controller=chibo');
} else {
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$chibo = get_a_record('chibo', $id);

$options_hoso = array(
    'select' => 'hosodang.Id, hosodang.HoTen, chibo.TenChiBo',
	'where' => '(hosodang.ChiBoId = chibo.Id) AND (chibo.Id = '.$id.')',
    'order_by' => 'hosodang.Id ASC'
);
$list_hoso = get_all('hosodang, chibo', $options_hoso);


$title = ($id == 0) ? 'Thêm chi bộ' : 'Sửa chi bộ';

//load view
require('admin/views/chibo/edit.php');
