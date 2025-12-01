<?php
//load model
require_once('admin/models/kyluat.php');
$id = intval($_GET['id']);
kyluat_delete($id);
header('location:admin.php?controller=kyluat');