<?php
//load model
require_once('admin/models/vanban.php');
if (!empty($_POST)) {
    $obj = array(
        'Id' => intval($_POST['id']),
		'TenVB' => escape($_POST['TenVB']),
        'NhomVBId' => intval($_POST['NhomVBId']),		
        'NguoiTao' => $_SESSION['user']['Username'],
		'HienThi' => intval($_POST['HienThi'])
    );	
    $id = save('vanban', $obj);
	
	/*
	$filename = ''.$id.'-'.time();
    $config = array(
        'name' => $filename,
        'upload_path'  => 'public/upload/vanban/',        
    );
    $upl = upload('inputFile', $config);	
    if($upl){
        $obj_file = array(
            'VanBanId' => $id,
            'File' => $upl
        );
        save('vanban_files', $obj_file);
    }
	*/
	
    header('location:admin.php?controller=vanban&action=upload&id='.$id.'');
} else {
}

if (isset($_GET['id'])) $id = intval($_GET['id']); else $id = 0;
$vanban = get_a_record('vanban', $id);

$vanbannhom = get_all('vanbannhom', array(
    'order_by' => 'Id ASC'
));

$vanban_files = get_all('vanban_files', array(
    'select' => 'vanban_files.*',
	'where' => '(VanBanId = '. $id .')',
	'order_by' => 'VanBanId DESC'
));

$title = ($id == 0) ? 'Thêm mới' : 'Sửa';

//load view
require('admin/views/vanban/edit.php');
