<?php
//load model
require_once('admin/models/vanban.php');
if (!empty($_POST)) {        
	if (isset($_POST['vbid'])) $vbid = intval($_POST['vbid']); else $vbid=0;
	$filename = ''.$vbid.'-'.time();
    $config = array(
        'name' => $filename,
        'upload_path'  => 'public/upload/vanban/',        
    );
    $upl = upload('inputFile', $config);
	
    if($upl){
        $obj_file = array(
            'VanBanId' => $vbid,
            'File' => $upl
        );
        save('vanban_files', $obj_file);
    }
    header('location:admin.php?controller=vanban');
} else {
}

if (isset($_GET['id'])) $vbid = intval($_GET['id']); else $vbid=0;

$options = array(
    'select' => 'vanban_files.*',
	'where' => '(vanban_files.VanBanId = '. $vbid .')',
    'order_by' => 'vanban_files.Id ASC'
);
$vanban_files = get_all('vanban_files', $options);

$title = 'Tải lên file đính kèm';

//load view
require('admin/views/vanban/upload.php');