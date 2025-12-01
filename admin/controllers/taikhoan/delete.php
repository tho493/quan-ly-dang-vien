<?php
//load model
require_once('admin/models/taikhoan.php');
$id = intval($_GET['id']);
taikhoan_delete($id);
header('location:admin.php?controller=taikhoan');