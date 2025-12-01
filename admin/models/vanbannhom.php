<?php
function vanbannhom_delete($id) {
    $id = intval($id);
	$sql = "DELETE FROM vanbannhom WHERE Id=$id ";
    db_query($sql) or die(db_error());
}