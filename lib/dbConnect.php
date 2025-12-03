<?php
/** setting **/
define('BASEURL' , 'http://'.$_SERVER['HTTP_HOST']);
define('BASEPATH', dirname(__FILE__) . '/');
define('PATH_URL', 'http://'.$_SERVER['HTTP_HOST']);
define('PATH_URL_SLIDER', PATH_URL.'/public/slider/');
define('PATH_URL_IMG', PATH_URL.'/public/upload/images/');
define('PATH_URL_DOCUMENT', PATH_URL. '/public/upload/vanban/');

// Database configuration - supports Docker environment variables
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'root';
$db_password = getenv('DB_PASSWORD') ?: '';
$db_name = getenv('DB_NAME') ?: 'dangvien_db';

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check connection
if ($mysqli -> connect_errno) {
  echo "Lỗi kết nối CSDL: " . $mysqli -> connect_error;
  exit();
}

$mysqli->set_charset("utf8");

function db_query($sql){
	global $mysqli;
	return $mysqli -> query($sql);
}
function db_num_rows($result){
	global $mysqli;
	return mysqli_num_rows($result);
}
function db_error(){
	global $mysqli;
	return $mysqli -> error;
}
function db_escape_string($str){
	global $mysqli;
	return $mysqli->real_escape_string($str);
}
function db_fetch_assoc($result){
	return $result -> fetch_assoc();
}
function db_fetch_array($result){
	return $result -> fetch_array(MYSQLI_ASSOC);
}
function db_fetch_row($result){
	return $result -> fetch_row();
}
function db_free_result($result){
	return mysqli_free_result($result);
}
function db_insert_id(){
	global $mysqli;
	return $mysqli -> insert_id;
}
function db_affected_rows(){
	global $mysqli;
	return $mysqli -> affected_rows;
}
