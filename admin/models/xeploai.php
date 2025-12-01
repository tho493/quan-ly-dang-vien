<?php
function xeploai_delete($id) {
    $id = intval($id);
    $sql = "DELETE FROM xeploai WHERE Id=$id";
    db_query($sql) or die(db_error());
}
function xeploai_files_delete($id) {
    $id = intval($id);
	//get filename
	$row_file = get_a_record('xeploai_files', $id);
	$filename = $row_file['File'];
	unlink('public/upload/xeploai/'. $filename);
	//delete mysql
    $sql = "DELETE FROM xeploai_files WHERE id=$id";
    db_query($sql) or die(db_error());
}
/*
function xeploai_files_delete_by_xeploaiid($xeploaiid) {	
    $sql = "SELECT GROUP_CONCAT(Id) AS ListId FROM xeploai_files WHERE XepLoaiId=$xeploaiid";
    $query = db_query($sql) or die(db_error());
	$listid = '';
	$row = db_fetch_assoc($query);
	$listid = $row['ListId'];
	db_free_result($query);
    
	$arr = explode(',', $listid);
	foreach ($arr as $item){
		xeploai_files_delete($item);
	}
}
*/

function getall() {	
    $sql = "SELECT hosodang.Id AS idhoso, hosodang.HoTen, xeploai.*
			FROM hosodang
			LEFT JOIN xeploai
			ON hosodang.Id = xeploai.HoSoId 
			ORDER BY xeploai.Nam DESC, hosodang.Id ASC";	
	//die($sql);
    $query = db_query($sql) or die(db_error());	
	return $query;
}

function getby_chibo_nam($chiboid, $nam) {	
    $sql = "SELECT hosodang.Id AS idhoso, hosodang.HoTen, xl.*
			FROM hosodang
			LEFT JOIN (select * from xeploai where Nam = '$nam') AS xl
			ON (hosodang.Id = xl.HoSoId) 
			WHERE (hosodang.ChiBoId = '$chiboid')
			ORDER BY xl.Nam DESC, hosodang.Id ASC";	
	//die($sql);
    $query = db_query($sql) or die(db_error());	
	return $query;
}