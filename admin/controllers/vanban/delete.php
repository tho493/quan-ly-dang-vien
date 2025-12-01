<?php
//load model
require_once('admin/models/vanban.php');
$id = intval($_GET['id']);
vanban_files_delete_by_vbid($id);
vanban_delete($id);
header('location:admin.php?controller=vanban');