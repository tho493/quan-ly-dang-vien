<?php
//load model
require_once('lib/model.php');

// Lấy văn bản mẫu (nhóm 5 - Văn bản mẫu)
$options = array(
    'select' => 'vanban.*, vanbannhom.TenNhom',
    'where' => '(vanban.NhomVBId = vanbannhom.Id) AND (vanban.NhomVBId = 5)',
    'order_by' => 'vanban.Id DESC'
);
$vanban = get_all('vanban, vanbannhom', $options);

// Lấy file văn bản
$vanban_files = array();
if (!empty($vanban)) {
    $vanban_ids = array_column($vanban, 'Id');
    $vanban_ids_str = implode(',', $vanban_ids);
    $vanban_files = get_all('vanban_files', array(
        'where' => "VanBanId IN ($vanban_ids_str)",
        'order_by' => 'VanBanId DESC'
    ));
}

// Nhóm file theo văn bản
$files_by_vanban = array();
foreach ($vanban_files as $file) {
    $vbid = $file['VanBanId'];
    if (!isset($files_by_vanban[$vbid])) {
        $files_by_vanban[$vbid] = array();
    }
    $files_by_vanban[$vbid][] = $file;
}

$title = 'Biểu mẫu';

//load view
require('website/views/bieu-mau/index.php');

