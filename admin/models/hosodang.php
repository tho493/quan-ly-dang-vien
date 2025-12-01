<?php
function hosodang_delete($id) {
    $id = intval($id);
    $sql = "DELETE FROM hosodang WHERE id=$id";
    db_query($sql) or die(db_error());
}

function hosodang_files_delete($id) {
    $id = intval($id);
	//get filename
	$hoso_file = get_a_record('hosodang_files', $id);
	$filename = $hoso_file['File'];
	unlink('public/upload/files/'. $filename);
	//delete mysql
    $sql = "DELETE FROM hosodang_files WHERE id=$id";
    db_query($sql) or die(db_error());
}

function hosodang_files_delete_by_hosoid($hosoid) {	
    $sql = "SELECT GROUP_CONCAT(Id) AS ListId FROM hosodang_files WHERE HoSoId=$hosoid";
    $query = db_query($sql) or die(db_error());
	$listid = '';
	$row = db_fetch_assoc($query);
	$listid = $row['ListId'];
	db_free_result($query);
    
	$arr = explode(',', $listid);
	foreach ($arr as $item){
		hosodang_files_delete($item);
	}
}

function hosodang_setTrangThai($id, $value) {    	
    $sql = "UPDATE hosodang SET TrangThai=$value WHERE Id=$id";
	//die($sql);
    db_query($sql) or die(db_error());
}