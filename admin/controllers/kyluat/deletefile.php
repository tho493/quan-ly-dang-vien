<?php
//load model
require_once('admin/models/kyluat.php');
$id = intval($_GET['id']);
kyluat_files_delete($id);

header('location:admin.php?controller=kyluat&action=edit&id='.$id);