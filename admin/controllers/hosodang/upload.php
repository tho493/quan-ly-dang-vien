<?php
//load model
require_once('admin/models/hosodang.php');
if (!empty($_POST)) {        
	if (isset($_POST['HoSoId'])) $hosoid = intval($_POST['HoSoId']); else $hosoid=0;
	$filename = ''.$hosoid.'-'.time();
    $config = array(
        'name' => $filename,
        'upload_path'  => 'public/upload/files/',        
    );
    $upl = upload('f', $config);
	
    if($upl){
        $hoso_file = array(
            'HoSoId' => $hosoid,
            'File' => $upl
        );
        save('hosodang_files', $hoso_file);
    }
    header('location:admin.php?controller=hosodang');
} else {
}

if (isset($_GET['id'])) $hosoid = intval($_GET['id']); else $hosoid=0;

$options = array(
    'select' => 'hosodang_files.*',
	'where' => '(hosodang_files.HoSoId = '. $hosoid .')',
    'order_by' => 'hosodang_files.Id ASC'
);
$hoso_files = get_all('hosodang_files', $options);

$title = 'Tải lên hồ sơ đảng';

//load view
require('admin/views/hosodang/upload.php');