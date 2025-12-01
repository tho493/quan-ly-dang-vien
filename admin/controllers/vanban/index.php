<?php
//load model
require_once('admin/models/vanban.php');

$options = array(
	'select' => 'vanban.*, vanbannhom.TenNhom',
	'where' => '(vanban.NhomVBId = vanbannhom.Id)',
    'order_by' => 'Id DESC'
);
$vanban = get_all('vanban, vanbannhom', $options);

$vanban_files = get_all('vanban_files', array(
    'order_by' => 'VanBanId DESC'
));


$title = 'Danh sách văn bản';
//load view
require('admin/views/vanban/index.php');