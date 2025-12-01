<?php
//load model
require_once('admin/models/thongbao.php');
$id = intval($_GET['id']);
thongbao_files_delete($id);

$thongbaoid = intval($_GET['thongbaoid']);
header('location:admin.php?controller=thongbao&action=upload&id='.$thongbaoid);