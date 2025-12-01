<?php
//load model
require_once('admin/models/chibo.php');

if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $id) {
		chibo_delete($id);
    }
}

$options = array(
    'order_by' => 'Id ASC'
);
$chibo = get_all('chibo', $options);

$url = 'admin.php?controller=chibo';
$title = 'Danh sách chi bộ';

//load view
require('admin/views/chibo/index.php');