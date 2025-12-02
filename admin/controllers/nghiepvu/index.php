<?php
//load model
require_once('admin/models/hosodang.php');

// Lấy danh sách hồ sơ chờ duyệt
$list_duyet_ketnap = get_all('hosodang_duyet', array(
    'where' => "LoaiDuyet = 'ketnap' AND TrangThai = 0",
    'order_by' => 'NgayGui DESC'
));

$list_duyet_chuyenchinhthuc = get_all('hosodang_duyet', array(
    'where' => "LoaiDuyet = 'chuyenchinhthuc' AND TrangThai = 0",
    'order_by' => 'NgayGui DESC'
));

$list_duyet_chuyensinhhoat = get_all('hosodang_duyet', array(
    'where' => "LoaiDuyet = 'chuyensinhhoat' AND TrangThai = 0",
    'order_by' => 'NgayGui DESC'
));

$list_duyet_xoaten = get_all('hosodang_duyet', array(
    'where' => "LoaiDuyet = 'xoaten' AND TrangThai = 0",
    'order_by' => 'NgayGui DESC'
));

// Lấy thông tin đảng viên cho các hồ sơ duyệt
function get_dangvien_info($hosoid)
{
    return get_a_record('hosodang', $hosoid);
}

// Lấy thông tin chi bộ
function get_chibo_info($chiboid)
{
    return get_a_record('chibo', $chiboid);
}

// Lấy danh sách chi bộ
$list_chibo = get_all('chibo', array(
    'order_by' => 'TenChiBo ASC'
));

// Lấy danh sách năm
$list_nam = get_all('nam', array(
    'order_by' => 'Nam DESC'
));

// Lấy file xếp loại đảng bộ
$list_xeploai_dangbo = get_all('dangbo_xeploai', array(
    'order_by' => 'Nam DESC'
));

$title = 'Nghiệp vụ đảng';

//load view
require('admin/views/nghiepvu/index.php');

