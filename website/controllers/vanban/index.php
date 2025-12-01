<?php
//load model
require_once('website/models/vanban.php');

//.htaccess cho vị trí thứ 2 là biến id
$id = isset($_GET['id']) ? $_GET['id'] : '';

//Lấy văn bản
$options_vb = array(
    'select' => 'vanban.*, vanbannhom.TenNhom',
	'where' => '(vanban.NhomVBId = vanbannhom.Id) AND (vanban.HienThi = 1) AND (vanbannhom.Id = '.$id.')',
    'order_by' => 'vanban.Id DESC'
);
$vanban = get_all('vanban, vanbannhom', $options_vb);

$vanban_files = get_all('vanban_files', array(
    'order_by' => 'VanBanId DESC'
));

$title = 'Văn bản';
require('website/views/vanban/index.php');