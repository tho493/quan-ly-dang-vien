<?php
//require_once "../lib/model.php";
if (!empty($_POST)) {
    $username = ($_POST['username']);
    $newpassword = md5($_POST['txtNewPassword']);	
    echo '<b><h4>'.changePassword($username, $newpassword).'</h4></b>';	
} else {}

function changePassword($username, $newpassword) {
    $sql = "Update taikhoan SET Password='$newpassword' WHERE Username='$username'";	
    $query = db_query($sql) or die(db_error());
    $rows =  db_affected_rows();
    if($rows<>1){
        return "Thay đổi mật khẩu không thành công." . db_error();
    }
    else return "Bạn đã đổi mật khẩu thành công. Bạn có thể reset lại trình duyệt và đăng nhập lại hệ thống!";
}
?>