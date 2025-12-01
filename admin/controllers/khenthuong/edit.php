<?php
//load model
require_once('admin/models/khenthuong.php');
if (!empty($_POST)) {
    $obj = array(
        'Id' => intval($_POST['id']),		
        'HoSoId' => intval($_POST['HoSoId']),
		'Nam' => escape($_POST['Nam']),
		'LyDo' => escape($_POST['LyDo']),
		'GhiChu' => escape($_POST['GhiChu'])
    );	
    $id = save('khenthuong', $obj);
	
	$filename = ''.$id.'-'.time();
    $config = array(
        'name' => $filename,
        'upload_path'  => 'public/upload/khenthuong/',        
    );
    $upl = upload('inputFile', $config);	
    if($upl){
        $obj_upl = array(
            'Id' => $id,
            'File' => $upl
        );
        save('khenthuong', $obj_upl);
    }
	
    header('location:admin.php?controller=khenthuong');
} else {
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$options = array(
	'select' => 'khenthuong.*, hosodang.HoTen',
	'where' => '(khenthuong.HoSoId = hosodang.Id) AND (khenthuong.Id='.$id.')',
    'order_by' => 'Id ASC'
);
$object = Select_a_record('khenthuong, hosodang', $options);

$options_hoso = array(
    'select' => 'hosodang.Id, hosodang.HoTen, chibo.TenChiBo',
	'where' => '(hosodang.ChiBoId = chibo.Id)',
    'order_by' => 'hosodang.Id ASC'
);
$list_hoso = get_all('hosodang, chibo', $options_hoso);


$title = ($id == 0) ? 'Thêm mới' : 'Sửa';

//load view
require('admin/views/khenthuong/edit.php');
