<?php
require "dbConnect.php";
require "function.php";

function save($table, $data = array()) {
    $values = array();
    foreach ($data as $key => $value) {
        $value = db_escape_string($value);
        $values[] = "`$key`='$value'";
    }
    $Id = intval($data['Id']);
    if ($Id > 0) {
        $sql = "UPDATE `$table` SET " . implode(',', $values) . " WHERE Id=$Id";
    } else {
        $sql = "INSERT INTO `$table` SET " . implode(',', $values);
    }
	//echo 'save: '.$sql.'<br>';
    db_query($sql) or die(db_error());

    $Id = ($Id>0) ? $Id : db_insert_id();
    return $Id;
}

function delete($table, $id) {
    $id = intval($id);
    $sql = "DELETE FROM `$table` WHERE Id=$id ";
    db_query($sql) or die(db_error());
}

function get_a_record($table, $id, $select = '*') {
    $id = intval($id);
    $sql = "SELECT $select FROM `$table` WHERE Id=$id ";
	// echo 'get_a_record: '.$sql.'<br>';
    $query = db_query($sql) or die(db_error());
    $data = NULL;
    if (db_num_rows($query) > 0) {
        $data = db_fetch_assoc($query);
        db_free_result($query);
    }
    return $data;
}

function get_a_record_by_alias($table, $alias, $select = '*') {
    $alias = db_escape_string($alias);
    $sql = "SELECT $select FROM `$table` WHERE alias='$alias'";
    $query = db_query($sql) or die(db_error());
    $data = NULL;
    if (db_num_rows($query) > 0) {
        $data = db_fetch_assoc($query);
        db_free_result($query);
    }
    return $data;
}

function Select_a_record($table, $options = array(), $select = '*') {
    //truy vấn
    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';

    $sql = "SELECT $select FROM $table $where $order_by $limit";
	//echo 'Select_a_record: '.$sql.'<br>';
    $query = db_query($sql) or die(db_error());

    $data = NULL;
    if (db_num_rows($query) > 0) {
        $data = db_fetch_assoc($query);
        db_free_result($query);
    }
    return $data;
}

function get_all($table, $options = array()) {
    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
	$group_by = isset($options['group_by']) ? 'GROUP BY ' . $options['group_by'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';

    $sql = "SELECT $select FROM $table $where $group_by $order_by $limit";
	// echo 'get_all: '.$sql.'<br>';
	// die($sql);
    $query = db_query($sql) or die(db_error());

    $data = array();
    if (db_num_rows($query) > 0) {
        while ($row = db_fetch_assoc($query)) {
            $data[] = $row;
        }
        db_free_result($query);
    }

    return $data;
}

function get_total($table, $options = array()) {
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $sql = "SELECT COUNT(*) as total FROM `$table` $where";
    $query = db_query($sql) or die(db_error());
    $row = db_fetch_assoc($query);
    return $row['total'];
}

function getRealIpAddr(){
    $count_file = fopen("counter.txt", "r") or die("Unable to open file!");
    $count_visiter= print_r(fgets($count_file));
    fclose($count_file);
    return $count_visiter;
}

function get_time($timePost,$timeReply) {
    $datePost	= date_parse_from_format('Y:m:d H:i:s', $timePost);
    $dateReply	= date_parse_from_format('Y:m:d H:i:s', $timeReply);

    $tsPost		= mktime($datePost['hour'], $datePost['minute'], $datePost['second'], $datePost['month'], $datePost['day'], $datePost['year']);
    $tsReply	= mktime($dateReply['hour'], $dateReply['minute'], $dateReply['second'], $dateReply['month'], $dateReply['day'], $dateReply['year']);
    $distance 	= $tsReply - $tsPost;

    switch ($distance){
        case ($distance < 60):
            $result = ($distance == 1) ? $distance . ' second ago' : $distance . ' seconds ago';
            break;
        case ($distance >= 60 && $distance < 3600):
            $minute	= round($distance/60);
            $result = ($minute == 1) ? $minute . ' minute ago' : $minute . ' minutes ago';
            break;
        case ($distance >= 3600 && $distance < 86400):
            $hour	= round($distance/3600);
            $result = ($hour == 1) ? $hour . ' hour ago' : $hour . ' hours ago';
            break;
        case (round($distance/86400)==1):
            $result = 'Yesterday at ' . date('H:i:s', $tsReply);
            break;
        default:
            $result = date('d/m/Y \a\t H:i:s', $tsPost);
            break;
    }
    return $result;
}

function get_name($username) {    
    $sql = "SELECT hosodang.HoTen FROM hosodang, taikhoan WHERE (hosodang.Id = taikhoan.HoSoId) AND (taikhoan.UserName='$username')";
	$query = db_query($sql) or die(db_error());
    $row = db_fetch_array($query);
	$num = db_num_rows($query);
	if ($num!=0)
		return $row['HoTen'];
	else
		return '';
}

function get_name_by_hosoid($hosoid) {    
    $sql = "SELECT hosodang.HoTen FROM hosodang WHERE (hosodang.Id = '$hosoid')";
	$query = db_query($sql) or die(db_error());
    $row = db_fetch_array($query);
	$num = db_num_rows($query);
	if ($num!=0)
		return $row['HoTen'];
	else
		return '';
}
