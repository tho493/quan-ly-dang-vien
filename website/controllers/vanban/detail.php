<?php
//load model
require_once('website/models/vanban.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';

//Lấy văn bản
$options_vb = array(
    'select' => 'vanban.*, vanbannhom.TenNhom',
	'where' => '(vanban.NhomVBId = vanbannhom.Id) AND (vanban.HienThi = 1) AND (vanban.Id = '.$id.')'
);
$vanban = Select_a_record('vanban, vanbannhom', $options_vb);

$opt_vb_file = array(
    'select' => 'vanban_files.*',
	'where' => '(VanBanId = '. $id .')',
	'order_by' => 'Id ASC'
);
$vanban_files = get_all('vanban_files', $opt_vb_file);

$title = 'Chi tiết';
require('website/views/vanban/detail.php');