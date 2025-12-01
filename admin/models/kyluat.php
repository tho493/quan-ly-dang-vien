<?php
function kyluat_delete($id) {
    $id = intval($id);
	//get filename
	$row_file = get_a_record('kyluat', $id);
	$filename = $row_file['File'];
	unlink('public/upload/kyluat/'. $filename);
	//delete
    $sql = "DELETE FROM kyluat WHERE Id=$id";
    db_query($sql) or die(db_error());
}
function kyluat_files_delete($id) {
    $id = intval($id);
	//get filename
	$row_file = get_a_record('kyluat', $id);
	$filename = $row_file['File'];
	unlink('public/upload/kyluat/'. $filename);
	//delete mysql
    $sql = "UPDATE kyluat SET File='' WHERE Id=$id";
    db_query($sql) or die(db_error());
}