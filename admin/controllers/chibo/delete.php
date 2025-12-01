<?php
//load model
require_once('admin/models/chibo.php');
$id = intval($_GET['id']);
chibo_delete($id);
header('location:admin.php?controller=chibo');