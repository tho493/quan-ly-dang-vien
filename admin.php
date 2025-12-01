<?php
session_start();

//error_reporting(0); //Tắt các thông báo lỗi

require_once('lib/model.php');

if(isset($_GET['controller']) && $_GET['controller']!='') $controller = $_GET['controller'];
else $controller = 'home';

if(isset($_GET['action']) && $_GET['action']!='') $action = $_GET['action'];
else $action = 'index';

//check login
if(!isset($_SESSION['user'])) {
    $controller = 'taikhoan';
    $action = 'login';
} else {
	$user = $_SESSION['user'];

	//check permission
	/*if (!checkPermission($user, $controller)) {
		echo '<script>alert("Bạn không có quyền thực hiện chức năng này!")</script>';
		$controller = 'home';
		$action = 'index';
	}*/
	//end check
}

$file = 'admin/controllers/'.$controller.'/'.$action.'.php';
if (file_exists($file)) {
    require($file);
} else {
    show_404();
}
