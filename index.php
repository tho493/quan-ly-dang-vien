<?php
session_start();

//error_reporting(0); //Tắt các thông báo lỗi

require_once('lib/model.php');

if (isset($_GET['controller']) && $_GET['controller'] != '')
    $controller = $_GET['controller'];
else
    $controller = 'home';

// Xử lý route với dấu gạch ngang
$controller = str_replace('-', '', $controller);

if (isset($_GET['action']) && $_GET['action'] != '')
    $action = $_GET['action'];
else
    $action = 'index';

// Xử lý URL thân thiện
if (isset($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
    $uri = str_replace('/index.php', '', $uri);
    $uri = trim($uri, '/');

    // Xử lý route /hosodangvien/
    if (preg_match('#^hosodangvien/?$#', $uri)) {
        $controller = 'hosodangvien';
        $action = 'index';
    }
    // Xử lý route /bieu-mau/ hoặc /biểu-mẫu/
    elseif (preg_match('#^(bieu-mau|biểu-mẫu)/?$#', $uri)) {
        $controller = 'bieumau';
        $action = 'index';
    }
    // Xử lý route /gioithieu/
    elseif (preg_match('#^gioithieu/?$#', $uri)) {
        $controller = 'gioithieu';
        $action = 'index';
    }
    // Xử lý route /vanban/{id}
    elseif (preg_match('#^vanban/(\d+)/?$#', $uri, $matches)) {
        $controller = 'vanban';
        $action = 'index';
        $_GET['id'] = $matches[1];
    }
}

$file = 'website/controllers/' . $controller . '/' . $action . '.php';
//echo($file);

//lấy dữ liệu nhóm VB cho menu
$vanbannhom = get_all('vanbannhom', array(
    'order_by' => 'Id ASC'
));

if (file_exists($file)) {
    require($file);
} else {
    show_404();
}