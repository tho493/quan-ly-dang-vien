<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo $title ?>
        </div>
        <div class="panel-body">
            <div class="dataTable_wrapper">                

                <form id="user-form" class="form-horizontal" method="post" action="admin.php?controller=taikhoan&action=permission" enctype="multipart/form-data" role="form">
                    
					<input name="id" type="hidden" value="<?php echo $user_info ? $user_info['Id'] : 0; ?>"/>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Tên đăng nhập</label>
                        <div class="col-sm-9">
							<label class="control-label"><?php echo $user_info ? $user_info['Username'] : ''; ?></label>
						</div>
                    </div>					

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Họ và tên</label>
                        <div class="col-sm-9">
                            <label class="control-label"><?php echo $user_info ? $user_info['HoTen'] : ''; ?></label>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Phân quyền</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="permission[]" multiple="multiple" size="20">
								<option value="">Không phân quyền</option>
								<?php foreach ($controllers as $controller): ?>				   
									<?php if (($controller!='.') && ($controller!='..')) : ?>
									<option value="<?php echo $controller ?>" 
									<?php if (strpos($user_info['Permission'], $controller) !== false) echo 'selected="selected"'; ?> >
									<?php echo $controller ?>
									</option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-primary"><?php echo $user_info ? 'Cập nhật' : 'Lỗi' ;?></button>
                            <a class="btn btn-warning" href="admin.php?controller=taikhoan">Trở về</a>
                        </div>
                    </div>
					
					<div class="col-sm-offset-3 col-sm-9 alert alert-success">
						<strong>Chú ý!</strong> Giữ phím Ctrl để chọn nhiều mục chọn.
					</div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php require('admin/views/shared/footer.php'); ?>

