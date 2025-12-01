<?php
function login($username, $password) {
    $sql = "SELECT * FROM taikhoan WHERE Username='$username' AND Password='$password' LIMIT 0,1";
    $query = db_query($sql) or die(db_error());
    if (db_num_rows($query)>0) {
        $_SESSION['user'] = db_fetch_assoc($query);
        return true;
    }
    return false;
}
function taikhoan_delete($id) {
    $id = intval($id);
    $sql = "DELETE FROM taikhoan WHERE id=$id";
    db_query($sql) or die(db_error());
}
function taikhoan_delete_byhosoid($hosoid) {
    $hosoid = intval($hosoid);
    $sql = "DELETE FROM taikhoan WHERE HoSoId=$hosoid";
    db_query($sql) or die(db_error());
}