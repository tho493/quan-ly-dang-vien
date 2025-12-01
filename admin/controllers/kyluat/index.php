<?php
//load model
require_once('admin/models/kyluat.php');

$options = array(
	'select' => 'kyluat.*, hosodang.HoTen',
	'where' => '(kyluat.HoSoId = hosodang.Id)',
    'order_by' => 'Id ASC'
);
$objects = get_all('kyluat, hosodang', $options);

$title = 'Kỷ luât đảng viên';
//load view
require('admin/views/kyluat/index.php');