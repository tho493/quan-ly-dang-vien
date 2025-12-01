<?php
//load model
require_once('admin/models/khenthuong.php');

$options = array(
	'select' => 'khenthuong.*, hosodang.HoTen',
	'where' => '(khenthuong.HoSoId = hosodang.Id)',
    'order_by' => 'Id ASC'
);
$objects = get_all('khenthuong, hosodang', $options);

$title = 'Khen thưởng đảng viên';
//load view
require('admin/views/khenthuong/index.php');