<?php
require_once('lib/model.php');
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $defaultpassword = md5('sdu@123');    
    if (resetPassword($id, $defaultpassword)){
		echo "<script>alert('Reset mật khẩu thành công.')</script>";
		echo "<script>window.location.href='admin.php?controller=taikhoan'</script>";
	} else {
		echo "<script>alert('Lỗi reset mật khẩu.')</script>";
		echo "<script>window.location.href='admin.php?controller=taikhoan'</script>";
	}
}

function resetPassword($id, $defaultpassword) {
    $sql = "UPDATE taikhoan SET Password='$defaultpassword' WHERE Id='$id' ";	
    $query = db_query($sql) or die(db_error());
    $rows =  db_affected_rows();
    if($rows<>1){
        return false;
    }
    else return true;
}
?>