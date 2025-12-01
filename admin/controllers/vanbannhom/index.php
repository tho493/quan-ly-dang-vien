<?php
//load model
require_once('admin/models/vanbannhom.php');

$options = array(
    'order_by' => 'Id ASC'
);
$vanbannhom = get_all('vanbannhom', $options);

$title = 'Danh mục văn bản';

//load view
require('admin/views/vanbannhom/index.php');