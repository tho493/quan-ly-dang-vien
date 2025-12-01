<?php
//load model
require_once('admin/models/xeploai.php');
$id = intval($_GET['id']);
//xeploai_files_delete_by_xeploaiid($id);
xeploai_delete($id);
header('location:admin.php?controller=xeploai');