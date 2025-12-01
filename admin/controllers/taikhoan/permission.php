<?php
//load model
require_once('admin/models/taikhoan.php');
//if form submit
if (!empty($_POST)) {
    // get Permission
	$permissions = isset($_POST['permission']) ? ($_POST['permission']) : '';
	
	$permissions_str = 'home';	//Mặc định mọi tài khoản đều vào chức năng home, lịch?
	if (is_array($permissions)){		
		reset($permissions);
		foreach ($permissions as $item ){
			//nếu chưa có
			if (($item!='') & (strpos($permissions_str, $item) === false)) {	
				$permissions_str .= ', '. spaceclear($item);
			}
		}
		// Xóa ký tự , cuối cùng
		$permissions_str = rtrim($permissions_str,',');
	}
	
	$user_info = array(
        'Id' => intval($_POST['id']),
        'Permission' => $permissions_str
    );
    $id =  save('taikhoan', $user_info);    
    header('location:admin.php?controller=taikhoan');
} else {
}

//lấy tên các controller để hiển thị lựa chọn
$folder_controllers = opendir('admin/controllers/');
while ($controller_name = readdir($folder_controllers))
{
	if (is_dir('admin/controllers/'.$controller_name) and ($controller_name !="." or $controller_name !=".."))
		$controllers[] = $controller_name;
}
closedir($folder_controllers);
//End

$id = isset($_GET['id']) ? intval($_GET['id']): 0;
$options = array(    
	'select' => 'taikhoan.*, hosodang.HoTen',
	'where' => '(taikhoan.Id='.$id.') AND (taikhoan.HoSoId=hosodang.Id)'
);
$user_info = Select_a_record('taikhoan, hosodang', $options);

$title = 'Phân quyền';
//load view
require('admin/views/taikhoan/permission.php');