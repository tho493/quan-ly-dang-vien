<?php
//load model
require_once('admin/models/khenthuong.php');
$id = intval($_GET['id']);
khenthuong_files_delete($id);

header('location:admin.php?controller=khenthuong&action=edit&id='.$id);