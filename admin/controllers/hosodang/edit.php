<?php
//load model
require_once('admin/models/hosodang.php');
if (!empty($_POST)) {
    $hoso = array(
        'Id' => intval($_POST['id']),
		'ChiBoId' => intval($_POST['ChiBoId']),
        'HoTen' => escape($_POST['HoTen']),
        'GioiTinh' => escape($_POST['GioiTinh']),
        'NgaySinh' => date('Y-m-d', strtotime($_POST['NgaySinh'])),
        'DienThoai' => escape($_POST['DienThoai']),
        'Email' => escape($_POST['Email']),
        'HoKhau' => escape($_POST['HoKhau']),
        'NguyenQuan' => escape($_POST['NguyenQuan']),
		'NgayKetNap' => date('Y-m-d', strtotime($_POST['NgayKetNap'])),
		'NgayChinhThuc' => !empty($_POST['NgayChinhThuc']) ? date('Y-m-d', strtotime($_POST['NgayChinhThuc'])) : NULL,
		'SoTheDang' => escape($_POST['SoTheDang']),
		'NgayChuyenSH' => !empty($_POST['NgayChuyenSH']) ? date('Y-m-d', strtotime($_POST['NgayChuyenSH'])) : NULL,
		'NoiChuyenSH' => escape($_POST['NoiChuyenSH'])
    );
    $id = save('hosodang', $hoso);
    
	$avatar_name = ''.$id.'-'.time();
    $config = array(
        'name' => $avatar_name,
        'upload_path'  => 'public/upload/images/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $avatar = upload('img', $config);
	
    if($avatar){
        $hoso = array(
            'Id' => $id,
            'Avatar' => $avatar
        );
        save('hosodang', $hoso);
    }
    header('location:admin.php?controller=hosodang');
} else {
}

if (isset($_GET['id'])) $id = intval($_GET['id']); else $id=0;
$hoso_info = get_a_record('hosodang', $id);

$chibo = get_all('chibo', array(
    'order_by' => 'TenChiBo ASC'
));

$title = ($id==0) ? 'Thêm hồ sơ đảng viên' : 'Cập nhật hồ sơ đảng viên';

//load view
require('admin/views/hosodang/edit.php');