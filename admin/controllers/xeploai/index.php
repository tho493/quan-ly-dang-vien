<?php
//load model
require_once('admin/models/xeploai.php');

$chiboid = isset($_REQUEST['chiboid']) ? $_REQUEST['chiboid'] : 0;
$nam = isset($_REQUEST['nam']) ? $_REQUEST['nam'] : '';

if ($chiboid !=0) {
	$objects = getby_chibo_nam($chiboid, $nam);
} else {
	$objects = getall();
}

$xeploai_files = get_all('xeploai_files', array(
    "where' => '(Nam = '$nam')",
	"order_by' => 'XepLoaiId ASC"
));

$tb_nam = get_all('nam', array(
    'order_by' => 'Id DESC'
));

$tb_chibo = get_all('chibo', array(
    'order_by' => 'TenChiBo ASC'
));

$title = 'Xếp loại đảng viên';
//load view
require('admin/views/xeploai/index.php');