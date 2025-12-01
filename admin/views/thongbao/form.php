<form id="product-form" class="form-horizontal" method="post"
	  action="admin.php?controller=thongbao&action=edit" enctype="multipart/form-data" role="form">

	<div class="form-group">
		<label class="col-sm-3 control-label">Thông báo</label>
		<div class="col-sm-9">
			<textarea class="form-control" id="ThongBao" name="ThongBao" rows="4" /><?php echo $object ? $object['ThongBao'] : ''; ?></textarea>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
			<input type="hidden" id="id" name="id" value="<?php echo $object ? $object['Id'] : 0; ?>"/>
			<button type="submit" class="btn btn-primary"><?php echo $object ? 'Cập nhật' : 'Thêm mới'; ?></button>
			<a class="btn btn-warning" href="admin.php?controller=thongbao">Trở về</a>
		</div>
	</div>
</form>


