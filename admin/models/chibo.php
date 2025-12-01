<?php
function chibo_delete($id) {
    $id = intval($id);
    $sql = "DELETE FROM chibo WHERE Id=$id";
    db_query($sql) or die(db_error());
}