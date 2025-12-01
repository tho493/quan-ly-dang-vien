<?php
//load model
require_once('admin/models/thongbao.php');

$options = array(
	'select' => 'thongbao.*',
    'order_by' => 'Id ASC'
);
$objects = get_all('thongbao', $options);

$thongbao_files = get_all('thongbao_files', array(
    'order_by' => 'ThongBaoId ASC'
));


$title = 'Thông báo';
//load view
require('admin/views/thongbao/index.php');