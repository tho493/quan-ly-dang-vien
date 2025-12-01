<?php
function khenthuong_delete($id) {
    $id = intval($id);
	//get filename
	$row_file = get_a_record('khenthuong', $id);
	$filename = $row_file['File'];
	unlink('public/upload/khenthuong/'. $filename);
	//delete
    $sql = "DELETE FROM khenthuong WHERE Id=$id";
    db_query($sql) or die(db_error());
}
function khenthuong_files_delete($id) {
    $id = intval($id);
	//get filename
	$row_file = get_a_record('khenthuong', $id);
	$filename = $row_file['File'];
	unlink('public/upload/khenthuong/'. $filename);
	//delete mysql
    $sql = "UPDATE khenthuong SET File='' WHERE Id=$id";
    db_query($sql) or die(db_error());
}