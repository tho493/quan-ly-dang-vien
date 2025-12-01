<form id="product-form" class="form-horizontal" method="post"
	  action="admin.php?controller=khenthuong&action=edit" enctype="multipart/form-data" role="form">
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Đảng viên</label>
		<div class="col-sm-9">
			<select class="form-control" id="HoSoId" name="HoSoId" required>
			<?php foreach ($list_hoso as $row_hoso) {
				$selected = '';
				if ($object && ($object['HoSoId'] == $row_hoso['Id'])) $selected = 'selected';
				echo '<option value="' . $row_hoso['Id'] . '" ' . $selected . '>' . $row_hoso['HoTen'] .' ('. $row_hoso['TenChiBo'] .')</option>';
			} ?>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Năm khen thưởng</label>
		<div class="col-sm-9">
			<input type="text" value="<?php echo $object ? $object['Nam'] : date('Y'); ?>"
				   class="form-control" id="Nam" name="Nam" pattern="[0-9]{4}" required>
		</div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-3 control-label">Lý do khen thưởng</label>
		<div class="col-sm-9">
			<input type="text" value="<?php echo $object ? $object['LyDo'] : ''; ?>"
				   class="form-control" id="LyDo" name="LyDo" required>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Ghi chú</label>
		<div class="col-sm-9">
			<textarea class="form-control" id="GhiChu" name="GhiChu" rows="4" /><?php echo $object ? $object['GhiChu'] : ''; ?></textarea>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Đính kèm</label>
		<div class="col-sm-9">			
			<?php 
			if ($object && $object['File'] != '') {
				echo '<a href="public/upload/khenthuong/'. $object['File'] .'" target="blank" data-toggle="tooltip" title="'. $object['File'] .'">'. $object['File'] .'</a> ';
				echo '<a href="admin.php?controller=khenthuong&action=deletefile&id='. $object['Id'] .'" class="text-danger deleteitem" data-toggle="tooltip" title="Xóa"><i class="glyphicon glyphicon-remove fa-lg"></i></a></br>';
			} else {
				echo '<input type="file" class="form-control" id="inputFile" name="inputFile" >';
			}
			?>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
			<input type="hidden" id="id" name="id" value="<?php echo $object ? $object['Id'] : 0; ?>"/>
			<button type="submit" class="btn btn-primary"><?php echo $object ? 'Cập nhật' : 'Thêm mới'; ?></button>
			<a class="btn btn-warning" href="admin.php?controller=khenthuong">Trở về</a>
		</div>
	</div>
</form>


