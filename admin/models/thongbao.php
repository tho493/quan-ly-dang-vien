<?php
function thongbao_delete($id) {
    $id = intval($id);
    $sql = "DELETE FROM thongbao WHERE Id=$id";
    db_query($sql) or die(db_error());
}
function thongbao_files_delete($id) {
    $id = intval($id);
	//get filename
	$row_file = get_a_record('thongbao_files', $id);
	$filename = $row_file['File'];
	unlink('public/upload/thongbao/'. $filename);
	//delete mysql
    $sql = "DELETE FROM thongbao_files WHERE id=$id";
    db_query($sql) or die(db_error());
}
function thongbao_files_delete_by_thongbaoid($thongbaoid) {	
    $sql = "SELECT GROUP_CONCAT(Id) AS ListId FROM thongbao_files WHERE ThongBaoId=$thongbaoid";
    $query = db_query($sql) or die(db_error());
	$listid = '';
	$row = db_fetch_assoc($query);
	$listid = $row['ListId'];
	db_free_result($query);
    
	$arr = explode(',', $listid);
	foreach ($arr as $item){
		thongbao_files_delete($item);
	}
}