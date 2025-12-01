<?php
//load model
require_once('website/models/home.php');

//Lấy thông báo
$options_tb = array(
    'select' => '*',
    'order_by' => 'Id DESC'
);
$thongbao = get_all('thongbao', $options_tb);

$thongbao_files = get_all('thongbao_files', array(
    'order_by' => 'ThongBaoId DESC'
));

//Lấy văn bản
$options_vb = array(
    'select' => 'vanban.*, vanbannhom.TenNhom',
	'where' => '(vanban.NhomVBId = vanbannhom.Id)',
    'order_by' => 'vanban.Id DESC'
);
$vanban = get_all('vanban, vanbannhom', $options_vb);

$vanban_files = get_all('vanban_files', array(
    'order_by' => 'VanBanId DESC'
));

$title = 'Trang chủ';
require('website/views/home/index.php');