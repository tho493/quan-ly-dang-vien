<?php
//.htaccess mặc định vị trí thứ 3 là biến id
$q = isset($_GET['id']) ? $_GET['id'] : '';

//Lấy văn bản
$options_vb = array(
    'select' => 'vanban.*, vanbannhom.TenNhom',
	'where' => '(vanban.NhomVBId = vanbannhom.Id) AND (vanban.TenVB like \'%'.$q.'%\' )',
    'order_by' => 'vanban.Id DESC'
);
$vanban = get_all('vanban, vanbannhom', $options_vb);

$vanban_files = get_all('vanban_files', array(
    'order_by' => 'VanBanId DESC'
));

$title = 'Kết quả tìm kiếm';
//load view
require('website/views/search/index.php');