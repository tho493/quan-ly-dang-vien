<?php
//load model
require_once('admin/models/thongbao.php');
if (!empty($_POST)) {        
	$thongbaoid = isset($_POST['thongbaoid']) ? intval($_POST['thongbaoid']) : 0;
	$filename = ''.$thongbaoid.'-'.time();
    $config = array(
        'name' => $filename,
        'upload_path'  => 'public/upload/thongbao/',        
    );
    $upl = upload('inputFile', $config);
	
    if($upl){
        $obj_file = array(
            'ThongBaoId' => $thongbaoid,
            'File' => $upl
        );
        save('thongbao_files', $obj_file);
    }
    header('location:admin.php?controller=thongbao');
} else {
}

$thongbaoid = isset($_GET['id']) ? intval($_GET['id']) : 0;

$options = array(
    'select' => '*',
	'where' => '(ThongBaoId = '. $thongbaoid .')',
    'order_by' => 'Id ASC'
);
$object_files = get_all('thongbao_files', $options);

$title = 'Tải lên file đính kèm';

//load view
require('admin/views/thongbao/upload.php');