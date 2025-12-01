<?php
//load model
require_once('admin/models/hosodang.php');

if (isset($_GET['id'])) $id = intval($_GET['id']); else $id=0;

$options = array(
    'select' => 'hosodang.*, chibo.TenChiBo',
	'where' => '(hosodang.ChiBoId = chibo.Id) AND (hosodang.Id ='.$id.')'
);
$user_info = Select_a_record('hosodang, chibo', $options);

$title = 'Thông tin hồ sơ đảng viên';

//load view
require('admin/views/hosodang/info.php');