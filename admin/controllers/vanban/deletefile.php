<?php
//load model
require_once('admin/models/vanban.php');
$id = intval($_GET['id']);
vanban_files_delete($id);

$vbid = intval($_GET['vbid']);
header('location:admin.php?controller=vanban&action=upload&id='.$vbid);