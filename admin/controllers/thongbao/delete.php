<?php
//load model
require_once('admin/models/thongbao.php');
$id = intval($_GET['id']);
thongbao_files_delete_by_thongbaoid($id);
thongbao_delete($id);
header('location:admin.php?controller=thongbao');