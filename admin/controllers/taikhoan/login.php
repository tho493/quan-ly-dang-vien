<?php
//load model
require_once('admin/models/taikhoan.php');
if (!empty($_POST)) {
    $username = escape($_POST['username']);
    $password = md5($_POST['password']);
    login($username, $password);
}

if (isset($_SESSION['user'])) {    
    header('location:admin.php');
}
$title = 'Quản trị';
require('admin/views/taikhoan/login.php');
?>

