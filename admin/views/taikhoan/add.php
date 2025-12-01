<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading">
            <b><?php echo $title ?></b>
        </div>
        <div class="panel-body">
            <div class="dataTable_wrapper">                

                <form id="user-form" class="form-horizontal" method="post" action="admin.php?controller=taikhoan&action=add" enctype="multipart/form-data" role="form">
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Đảng viên</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="HoSoId" name="HoSoId" >
							<?php foreach ($hosodang as $row_hoso) {
								$selected = '';
								if ($row_hoso && ($row_hoso['Id'] == $hosoid)) $selected = 'selected';
								echo '<option value="' . $row_hoso['Id'] . '"'. $selected .'>' . $row_hoso['HoTen'] . '</option>';
							} ?>
							</select>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Tên đăng nhập</label>
                        <div class="col-sm-9">
                            <input name="Username" type="text" value="" class="form-control" required/>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Mật khẩu</label>
                        <div class="col-sm-9">
                            <input name="Password" type="password" value="" class="form-control" required/>
                        </div>
                    </div> 
					
					<div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Ngừng hoạt động</label>
                        <div class="col-sm-9">
                            <input name="Disable" type="checkbox" value="1" class="mt-1" />
                        </div>
                    </div>
					
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-primary">Thêm mới</button>
                            <a class="btn btn-warning" href="admin.php?controller=taikhoan">Trở về</a>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php require('admin/views/shared/footer.php'); ?>

