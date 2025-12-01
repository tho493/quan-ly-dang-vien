<?php
//load model
require_once('admin/models/vanbannhom.php');
$id = intval($_GET['id']);
vanbannhom_delete($id);
header('location:admin.php?controller=vanbannhom');