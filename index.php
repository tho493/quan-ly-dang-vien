<?php
session_start();

//error_reporting(0); //Tắt các thông báo lỗi

require_once('lib/model.php');

if (isset($_GET['controller']) && $_GET['controller']!='') $controller = $_GET['controller'];
else $controller = 'home';

if (isset($_GET['action']) && $_GET['action']!='') $action = $_GET['action'];
else $action = 'index';

$file = 'website/controllers/'.$controller.'/'.$action.'.php';
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