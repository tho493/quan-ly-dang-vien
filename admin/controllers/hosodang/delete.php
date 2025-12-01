<?php
//load model
require_once('admin/models/hosodang.php');
require_once('admin/models/taikhoan.php');
$id = intval($_GET['id']);
taikhoan_delete_byhosoid($id);
hosodang_files_delete_by_hosoid($id);
hosodang_delete($id);
header('location:admin.php?controller=hosodang');