<?php
/**
 * Script kiểm tra và tạo thông báo nhắc việc
 * Chạy định kỳ (cron job) mỗi ngày
 */

require_once('../lib/model.php');
require_once('../lib/dbConnect.php');

// Kiểm tra đảng viên cần chuyển sinh hoạt (SV: sau 30 ngày ra trường)
$sql = "SELECT * FROM hosodang 
        WHERE TrangThai = 0 
        AND LoaiDangVien = 'SV' 
        AND NgayRaTruong IS NOT NULL 
        AND NgayRaTruong != '0000-00-00'
        AND DATEDIFF(CURDATE(), NgayRaTruong) >= 30
        AND DATEDIFF(CURDATE(), NgayRaTruong) <= 60";
$query = db_query($sql);
while ($row = db_fetch_assoc($query)) {
    // Kiểm tra xem đã có thông báo chưa
    $check = get_all('thongbao_nhacviec', array(
        'where' => "HoSoId = {$row['Id']} AND LoaiNhac = 'chuyensinhhoat' AND TrangThai = 0"
    ));

    if (empty($check)) {
        $nhac = array(
            'HoSoId' => $row['Id'],
            'LoaiNhac' => 'chuyensinhhoat',
            'NoiDung' => "Đảng viên {$row['HoTen']} đã ra trường hơn 30 ngày, cần chuyển sinh hoạt.",
            'NgayNhac' => date('Y-m-d'),
            'NgayHetHan' => date('Y-m-d', strtotime('+30 days')),
            'TrangThai' => 0
        );
        save('thongbao_nhacviec', $nhac);
    }
}

// Kiểm tra đảng viên cần chuyển chính thức (sau 1 năm kết nạp)
$sql = "SELECT * FROM hosodang 
        WHERE TrangThai = 0 
        AND TrangThaiDang = 'dubi'
        AND NgayKetNap IS NOT NULL 
        AND NgayKetNap != '0000-00-00'
        AND DATEDIFF(CURDATE(), NgayKetNap) >= 365
        AND DATEDIFF(CURDATE(), NgayKetNap) <= 395";
$query = db_query($sql);
while ($row = db_fetch_assoc($query)) {
    // Kiểm tra xem đã có thông báo chưa
    $check = get_all('thongbao_nhacviec', array(
        'where' => "HoSoId = {$row['Id']} AND LoaiNhac = 'chuyenchinhthuc' AND TrangThai = 0"
    ));

    if (empty($check)) {
        $nhac = array(
            'HoSoId' => $row['Id'],
            'LoaiNhac' => 'chuyenchinhthuc',
            'NoiDung' => "Đảng viên {$row['HoTen']} đã kết nạp được 1 năm, cần chuyển chính thức.",
            'NgayNhac' => date('Y-m-d'),
            'NgayHetHan' => date('Y-m-d', strtotime('+30 days')),
            'TrangThai' => 0
        );
        save('thongbao_nhacviec', $nhac);
    }
}

echo "Đã kiểm tra và tạo thông báo nhắc việc.\n";

