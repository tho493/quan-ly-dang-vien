<?php
//load model
require_once('admin/models/hosodang.php');

$options = array(
    'select' => 'hosodang.*, chibo.TenChiBo',
	'where' => '(hosodang.ChiBoId = chibo.Id)',
    'order_by' => 'hosodang.ChiBoId ASC'
);
$list_hoso = get_all('hosodang, chibo', $options);

$options = array(
    'select' => 'hosodang_files.*',
    'order_by' => 'hosodang_files.HoSoId ASC'
);
$hoso_files = get_all('hosodang_files', $options);

$title = 'Danh sách đảng viên';

//load view
require('admin/views/hosodang/index.php');