<?php
//load model
require_once('admin/models/vanbannhom.php');
if (!empty($_POST)) {
    $obj = array(
        'Id' => intval($_POST['id']),
		'TenNhom' => escape($_POST['TenNhom']),
        'MoTa' => escape($_POST['MoTa'])		
    );
	
    $id = save('vanbannhom', $obj);
    header('location:admin.php?controller=vanbannhom');
} else {
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$nhomvb = get_a_record('vanbannhom', $id);

$title = ($id == 0) ? 'Thêm mới' : 'Sửa';

//load view
require('admin/views/vanbannhom/edit.php');
