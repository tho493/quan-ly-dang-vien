<form id="product-form" class="form-horizontal" method="post"
	action="admin.php?controller=vanbannhom&action=edit" enctype="multipart/form-data" role="form">
	
	<input type="hidden" id="id" name="id" value="<?php echo $nhomvb ? $nhomvb['Id'] : '0'; ?>"/>
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Tên nhóm</label>
		<div class="col-sm-9">
			<input type="text" value="<?php echo $nhomvb ? $nhomvb['TenNhom'] : ''; ?>"
				   class="form-control" id="TenNhom" name="TenNhom" required/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Mô tả</label>
		<div class="col-sm-9">
			<input type="text" value="<?php echo $nhomvb ? $nhomvb['MoTa'] : ''; ?>"
				   class="form-control" id="MoTa" name="MoTa" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
			<button type="submit" class="btn btn-primary"><?php echo $nhomvb ? 'Cập nhật' : 'Thêm mới'; ?></button>
			<a class="btn btn-warning" href="admin.php?controller=vanbannhom">Trở về</a>
		</div>
	</div>
</form>


