<?php
//load model
require_once('admin/models/xeploai.php');
$id = intval($_GET['id']);
xeploai_files_delete($id);

$nam = $_GET['nam'];
header('location:admin.php?controller=xeploai&action=upload&nam='.$nam);