<?php
//load model
require_once('lib/model.php');

// Kiểm tra đăng nhập
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}

$user_session = $_SESSION['user'];
$hosoid = $user_session['HoSoId'];

// Lấy thông tin đảng viên
$options = array(
    'select' => 'hosodang.*, chibo.TenChiBo',
    'where' => '(hosodang.ChiBoId = chibo.Id) AND (hosodang.Id =' . $hosoid . ')'
);
$user_info = Select_a_record('hosodang, chibo', $options);

if (!$user_info) {
    header('Location: index.php');
    exit();
}

// Lấy danh sách các mục hồ sơ
$list_muc_hoso = get_all('hosodang_muc', array(
    'order_by' => 'ThuTu ASC'
));

// Lấy danh sách file hồ sơ theo mục
$list_files_muc = get_all('hosodang_files_muc', array(
    'where' => "HoSoId = $hosoid",
    'order_by' => 'MucId ASC, Nam DESC'
));

// Nhóm file theo mục
$files_by_muc = array();
foreach ($list_files_muc as $file) {
    $muc_id = $file['MucId'];
    if (!isset($files_by_muc[$muc_id])) {
        $files_by_muc[$muc_id] = array();
    }
    $files_by_muc[$muc_id][] = $file;
}

// Lấy hồ sơ theo năm
$list_hoso_nam = get_all('hosodang_nam', array(
    'where' => "HoSoId = $hosoid",
    'order_by' => 'Nam DESC'
));

$title = 'Hồ sơ đảng viên';

//load view
require('website/views/hosodangvien/index.php');

