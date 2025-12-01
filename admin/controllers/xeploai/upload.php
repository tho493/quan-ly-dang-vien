<?php
//load model
require_once('admin/models/xeploai.php');
if (!empty($_POST)) {        
	$nam = isset($_POST['nam']) ? ($_POST['nam']) : '';
	$filename = ''.$nam.'-'.time();
    $config = array(
        'name' => $filename,
        'upload_path'  => 'public/upload/xeploai/',        
    );
    $upl = upload('inputFile', $config);
	
    if($upl){
        $obj_file = array(
            'Nam' => $nam,
            'File' => $upl
        );
        save('xeploai_files', $obj_file);
    }
    header('location:admin.php?controller=xeploai');
} else {
}

$nam = isset($_REQUEST['nam']) ? $_REQUEST['nam'] : '';

$xeploai_files = get_all('xeploai_files', array(
    "where' => '(Nam = '$nam')",
	"order_by' => 'Id ASC"
));

$tb_nam = get_all('nam', array(
    'order_by' => 'Id DESC'
));

$title = 'Tải lên file đính kèm';

//load view
require('admin/views/xeploai/upload.php');