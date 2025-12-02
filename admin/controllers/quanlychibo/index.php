<?php
//load model
require_once('admin/models/hosodang.php');

// Lấy danh sách 16 chi bộ
$list_chibo = get_all('chibo', array(
    'order_by' => 'Id ASC'
));

// Lấy danh sách đảng viên đang sinh hoạt (TrangThai = 0)
$list_dangvien = get_all('hosodang', array(
    'where' => 'TrangThai = 0',
    'order_by' => 'ChiBoId ASC, HoTen ASC'
));

// Lấy danh sách các mục hồ sơ
$list_muc_hoso = get_all('hosodang_muc', array(
    'order_by' => 'ThuTu ASC'
));

// Lấy danh sách file hồ sơ theo mục
$list_files_muc = array();
if (!empty($list_dangvien)) {
    $hosodang_ids = array_column($list_dangvien, 'Id');
    $hosodang_ids_str = implode(',', $hosodang_ids);
    $list_files_muc = get_all('hosodang_files_muc', array(
        'where' => "HoSoId IN ($hosodang_ids_str)",
        'order_by' => 'HoSoId ASC, MucId ASC'
    ));
}

// Nhóm file theo đảng viên và mục
$files_by_hoso = array();
foreach ($list_files_muc as $file) {
    if (!isset($files_by_hoso[$file['HoSoId']])) {
        $files_by_hoso[$file['HoSoId']] = array();
    }
    if (!isset($files_by_hoso[$file['HoSoId']][$file['MucId']])) {
        $files_by_hoso[$file['HoSoId']][$file['MucId']] = array();
    }
    $files_by_hoso[$file['HoSoId']][$file['MucId']][] = $file;
}

// Tính thống kê cho từng chi bộ
$thongke_chibo = array();
foreach ($list_chibo as $chibo) {
    $chibo_id = $chibo['Id'];
    $dangvien_chibo = array_filter($list_dangvien, function ($dv) use ($chibo_id) {
        return $dv['ChiBoId'] == $chibo_id;
    });

    $tong_so = count($dangvien_chibo);
    $chinh_thuc = 0;
    $du_bi = 0;
    $gv = 0;
    $vien_chuc = 0;
    $sv = 0;

    foreach ($dangvien_chibo as $dv) {
        if ($dv['TrangThaiDang'] == 'chinhthuc')
            $chinh_thuc++;
        if ($dv['TrangThaiDang'] == 'dubi')
            $du_bi++;
        if ($dv['LoaiDangVien'] == 'GV')
            $gv++;
        if ($dv['LoaiDangVien'] == 'VC')
            $vien_chuc++;
        if ($dv['LoaiDangVien'] == 'SV')
            $sv++;
    }

    $thongke_chibo[$chibo_id] = array(
        'TongSo' => $tong_so,
        'ChinhThuc' => $chinh_thuc,
        'DuBi' => $du_bi,
        'GV' => $gv,
        'VienChuc' => $vien_chuc,
        'SV' => $sv
    );
}

$title = 'Quản lý chi bộ, đảng viên';

//load view
require('admin/views/quanlychibo/index.php');

