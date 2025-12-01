<form id="product-form" class="form-horizontal" method="post"
	  action="admin.php?controller=vanban&action=edit" enctype="multipart/form-data" role="form">
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Nhóm văn bản</label>
		<div class="col-sm-9">
			<select class="form-control" id="NhomVBId" name="NhomVBId" >
			<?php foreach ($vanbannhom as $row_nhom) {
				$selected = '';
				if ($vanban && ($vanban['NhomVBId'] == $row_nhom['Id'])) $selected = 'selected';
				echo '<option value="' . $row_nhom['Id'] . '" ' . $selected . '>' . $row_nhom['TenNhom'] . '</option>';
			} ?>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Tên văn bản</label>
		<div class="col-sm-9">
			<input type="text" value="<?php echo $vanban ? $vanban['TenVB'] : ''; ?>"
				   class="form-control" id="TenVB" name="TenVB" required/>
		</div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-3 control-label">Hiển thị</label>
		<div class="col-sm-9">
			<div class="checkbox">
			  <label><input type="checkbox" id="HienThi" name="HienThi" value="1" <?php echo ($vanban && $vanban['HienThi']==1) ? 'checked' : ''; ?>></label>
			</div>
		</div>
	</div>
	
	<!--
	<div class="form-group">
		<label class="col-sm-3 control-label">Đính kèm</label>
		<div class="col-sm-9">
			<input type="file" class="form-control" id="inputFile" name="inputFile" /><br>
			<?php 
				foreach ($vanban_files as $row_file) {
					echo '<a href="public/upload/vanban/'. $row_file['File'] .'" target="blank">'. $row_file['File'] .'</a> ';
					echo '<a href="admin.php?controller=vanban&action=deletefile&id='. $vanban['Id'] .'" class="text-danger deleteitem" data-toggle="tooltip" title="Xóa"><i class="glyphicon glyphicon-remove fa-lg"></i></a></br>';
				}
			?>
		</div>
	</div>
	-->
	
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
			<input type="hidden" id="id" name="id" value="<?php echo $vanban ? $vanban['Id'] : '0'; ?>"/>
			<button type="submit" class="btn btn-primary"><?php echo $vanban ? 'Cập nhật' : 'Thêm mới'; ?></button>
			<a class="btn btn-warning" href="admin.php?controller=vanban">Trở về</a>
		</div>
	</div>
</form>


