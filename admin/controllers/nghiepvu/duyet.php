<?php
//load model
require_once('admin/models/hosodang.php');

$id = intval($_GET['id']);
$trangthai = intval($_GET['trangthai']); // 1: Duyệt, 2: Từ chối

if ($id > 0) {
    $duyet = get_a_record('hosodang_duyet', $id);

    if ($duyet) {
        $hosoid = $duyet['HoSoId'];
        $loai_duyet = $duyet['LoaiDuyet'];

        // Cập nhật trạng thái duyệt
        $data = array(
            'Id' => $id,
            'TrangThai' => $trangthai,
            'NgayDuyet' => date('Y-m-d H:i:s'),
            'NguoiDuyet' => $user['Username']
        );
        save('hosodang_duyet', $data);

        // Nếu được duyệt, thực hiện các thao tác tương ứng
        if ($trangthai == 1) {
            $hosodang = get_a_record('hosodang', $hosoid);

            switch ($loai_duyet) {
                case 'ketnap':
                    // Kết nạp đảng - cập nhật ngày kết nạp
                    if (!$hosodang['NgayKetNap']) {
                        $data_hoso = array(
                            'Id' => $hosoid,
                            'NgayKetNap' => date('Y-m-d'),
                            'TrangThaiDang' => 'dubi'
                        );
                        save('hosodang', $data_hoso);
                    }
                    break;

                case 'chuyenchinhthuc':
                    // Chuyển chính thức - cập nhật ngày chính thức
                    $data_hoso = array(
                        'Id' => $hosoid,
                        'NgayChinhThuc' => date('Y-m-d'),
                        'TrangThaiDang' => 'chinhthuc'
                    );
                    save('hosodang', $data_hoso);
                    break;

                case 'chuyensinhhoat':
                    // Chuyển sinh hoạt
                    if ($duyet['ChiBoMoiId'] && $duyet['ChiBoMoiId'] > 0) {
                        // Chuyển trong cùng đảng bộ - chỉ cập nhật ChiBoId
                        $data_hoso = array(
                            'Id' => $hosoid,
                            'ChiBoId' => $duyet['ChiBoMoiId'],
                            'NgayChuyenSH' => date('Y-m-d'),
                            'NoiChuyenSH' => $duyet['NoiChuyenSH']
                        );
                        save('hosodang', $data_hoso);
                    } else {
                        // Chuyển ra ngoài đảng bộ
                        $data_hoso = array(
                            'Id' => $hosoid,
                            'TrangThai' => 1, // Chuyển sinh hoạt
                            'NgayChuyenSH' => date('Y-m-d'),
                            'NoiChuyenSH' => $duyet['NoiChuyenSH']
                        );
                        save('hosodang', $data_hoso);
                    }
                    break;

                case 'xoaten':
                    // Xóa tên
                    $data_hoso = array(
                        'Id' => $hosoid,
                        'TrangThai' => 2 // Xóa tên
                    );
                    save('hosodang', $data_hoso);
                    break;
            }
        }

        header('Location: admin.php?controller=nghiepvu');
        exit();
    }
}

header('Location: admin.php?controller=nghiepvu');
exit();

