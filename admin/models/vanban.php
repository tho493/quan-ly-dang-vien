<?php
function vanban_delete($id) {
    $id = intval($id);
    $sql = "DELETE FROM vanban WHERE Id=$id";
    db_query($sql) or die(db_error());
}
function vanban_files_delete($id) {
    $id = intval($id);
	//get filename
	$row_file = get_a_record('vanban_files', $id);
	$filename = $row_file['File'];
	unlink('public/upload/vanban/'. $filename);
	//delete mysql
    $sql = "DELETE FROM vanban_files WHERE id=$id";
    db_query($sql) or die(db_error());
}
function vanban_files_delete_by_vbid($vbid) {	
    $sql = "SELECT GROUP_CONCAT(Id) AS ListId FROM vanban_files WHERE VanBanId=$vbid";
    $query = db_query($sql) or die(db_error());
	$listid = '';
	$row = db_fetch_assoc($query);
	$listid = $row['ListId'];
	db_free_result($query);
    
	$arr = explode(',', $listid);
	foreach ($arr as $item){
		vanban_files_delete($item);
	}
}