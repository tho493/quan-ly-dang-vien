<?php
//load model
require_once('admin/models/khenthuong.php');
$id = intval($_GET['id']);
khenthuong_delete($id);
header('location:admin.php?controller=khenthuong');