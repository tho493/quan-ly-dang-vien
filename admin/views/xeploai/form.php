<form id="product-form" class="form-horizontal" method="post"
	  action="admin.php?controller=xeploai&action=edit" enctype="multipart/form-data" role="form">
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Đảng viên</label>
		<div class="col-sm-9">
			<select class="form-control" id="HoSoId" name="HoSoId" >
			<?php foreach ($list_hoso as $row_hoso) {
				$selected = '';
				if ($object && ($object['HoSoId'] == $row_hoso['Id'])) $selected = 'selected';
				echo '<option value="' . $row_hoso['Id'] . '" ' . $selected . '>' . $row_hoso['HoTen'] .' ('. $row_hoso['TenChiBo'] .')</option>';
			} ?>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Năm xếp loại</label>
		<div class="col-sm-9">
			<input type="text" value="<?php echo $object ? $object['Nam'] : date('Y'); ?>"
				   class="form-control" id="Nam" name="Nam" pattern="[0-9]{4}" required/>
		</div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-3 control-label">Chi bộ Xếp loại</label>
		<div class="col-sm-9">
			<select class="form-control" id="CBXepLoai" name="CBXepLoai" >
				<option value="HTXSNV" <?php if ($object && ($object['CBXepLoai'] == 'HTXSNV')) echo 'selected'; ?> >Hoàn thành xuất sắc nhiệm vụ</option>
				<option value="HTTNV" <?php if ($object && ($object['CBXepLoai'] == 'HTTNV')) echo 'selected'; ?> >Hoàn thành tốt nhiệm vụ</option>
				<option value="HTNV" <?php if ($object && ($object['CBXepLoai'] == 'HTNV')) echo 'selected'; ?> >Hoàn thành nhiệm vụ</option>
				<option value="KHTNV" <?php if ($object && ($object['CBXepLoai'] == 'KHTNV')) echo 'selected'; ?> >Không hoàn thành nhiệm vụ</option>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Đảng ủy Xếp loại</label>
		<div class="col-sm-9">
			<select class="form-control" id="DUXepLoai" name="DUXepLoai" >
				<option value="HTXSNV" <?php if ($object && ($object['DUXepLoai'] == 'HTXSNV')) echo 'selected'; ?> >Hoàn thành xuất sắc nhiệm vụ</option>
				<option value="HTTNV" <?php if ($object && ($object['DUXepLoai'] == 'HTTNV')) echo 'selected'; ?> >Hoàn thành tốt nhiệm vụ</option>
				<option value="HTNV" <?php if ($object && ($object['DUXepLoai'] == 'HTNV')) echo 'selected'; ?> >Hoàn thành nhiệm vụ</option>
				<option value="KHTNV" <?php if ($object && ($object['DUXepLoai'] == 'KHTNV')) echo 'selected'; ?> >Không hoàn thành nhiệm vụ</option>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
			<input type="hidden" id="id" name="id" value="<?php echo $object ? $object['Id'] : 0; ?>"/>
			<button type="submit" class="btn btn-primary"><?php echo $object ? 'Cập nhật' : 'Thêm mới'; ?></button>
			<a class="btn btn-warning" href="admin.php?controller=xeploai">Trở về</a>
		</div>
	</div>
</form>


