<?php
//load model
require_once('admin/models/hosodang.php');
$id = intval($_GET['id']);
hosodang_files_delete($id);

$hosoid = intval($_GET['hosoid']);
header('location:admin.php?controller=hosodang&action=upload&id='.$hosoid);