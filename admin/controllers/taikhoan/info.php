<?php
//load model
require_once('admin/models/taikhoan.php');

$username = isset($_GET['username']) ? intval($_GET['username']): '';

$options = array(
    'select' => 'taikhoan.Username, hosodang.*, chibo.TenChiBo',
	'where' => '(taikhoan.HoSoId = hosodang.Id) AND (hosodang.ChiBoId = chibo.Id) AND (taikhoan.Username ='.$username.')'
);
$user_info = Select_a_record('taikhoan, hosodang, chibo', $options);

$title = 'Thông tin cá nhân';
//load view
require('admin/views/taikhoan/info.php');