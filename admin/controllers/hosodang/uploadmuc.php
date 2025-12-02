<?php
//load model
require_once('admin/models/hosodang.php');

if (!empty($_POST)) {
    if (isset($_POST['HoSoId']))
        $hosoid = intval($_POST['HoSoId']);
    else
        $hosoid = 0;
    if (isset($_POST['MucId']))
        $mucid = intval($_POST['MucId']);
    else
        $mucid = 0;
    if (isset($_POST['Nam']))
        $nam = $_POST['Nam'];
    else
        $nam = date('Y');
    if (isset($_POST['TenFile']))
        $tenfile = $_POST['TenFile'];
    else
        $tenfile = '';

    $filename = '' . $hosoid . '-' . $mucid . '-' . time();
    $config = array(
        'name' => $filename,
        'upload_path' => 'public/upload/files/',
    );
    $upl = upload('f', $config);

    if ($upl) {
        $hoso_file = array(
            'HoSoId' => $hosoid,
            'MucId' => $mucid,
            'Nam' => $nam,
            'File' => $upl,
            'TenFile' => $tenfile,
            'NguoiUpload' => $user['Username']
        );
        save('hosodang_files_muc', $hoso_file);
    }
    header('location:admin.php?controller=hosodang&action=info&id=' . $hosoid);
    exit();
}

if (isset($_GET['id']))
    $hosoid = intval($_GET['id']);
else
    $hosoid = 0;
if (isset($_GET['mucid']))
    $mucid = intval($_GET['mucid']);
else
    $mucid = 0;

// Lấy thông tin đảng viên
$hosodang = get_a_record('hosodang', $hosoid);
if (!$hosodang) {
    header('location:admin.php?controller=hosodang');
    exit();
}

// Lấy thông tin mục hồ sơ
$muc = get_a_record('hosodang_muc', $mucid);
if (!$muc) {
    header('location:admin.php?controller=hosodang&action=info&id=' . $hosoid);
    exit();
}

// Lấy danh sách năm
$list_nam = get_all('nam', array(
    'order_by' => 'Nam DESC'
));

$title = 'Upload hồ sơ: ' . $muc['TenMuc'];

//load view
require('admin/views/hosodang/uploadmuc.php');

