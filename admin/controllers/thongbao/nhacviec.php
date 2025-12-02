<?php
//load model
require_once('admin/models/hosodang.php');

// Lấy danh sách thông báo nhắc việc
$list_nhacviec = get_all('thongbao_nhacviec', array(
    'where' => 'TrangThai = 0',
    'order_by' => 'NgayNhac ASC'
));

// Lấy thông tin đảng viên cho các thông báo
function get_dangvien_for_nhac($hosoid)
{
    if ($hosoid) {
        return get_a_record('hosodang', $hosoid);
    }
    return null;
}

$title = 'Thông báo nhắc việc';

//load view
require('admin/views/thongbao/nhacviec.php');

