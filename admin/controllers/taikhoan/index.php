<?php
//load model
require_once('admin/models/taikhoan.php');

$options = array(
    'select' => 'taikhoan.*, hosodang.HoTen, chibo.TenChiBo',
	'where' => '(taikhoan.HoSoId = hosodang.Id) AND (hosodang.ChiBoId = chibo.Id)',
    'order_by' => 'Username ASC'
);
$taikhoan = get_all('taikhoan, hosodang, chibo', $options);

$title = 'Danh sách tài khoản';
//$user = $_SESSION['user'];
//load view
require('admin/views/taikhoan/index.php');