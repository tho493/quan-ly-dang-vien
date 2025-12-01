<form id="product-form" class="form-horizontal" method="post"
	action="admin.php?controller=chibo&amp;action=edit" enctype="multipart/form-data" role="form">
	
	<input type="hidden" id="Id" name="Id" value="<?php echo $chibo ? $chibo['Id'] : '0'; ?>"/>

	<div class="form-group">
		<label for="name" class="col-sm-3 control-label">Tên chi bộ</label>
		<div class="col-sm-9">
			<input type="text" value="<?php echo $chibo ? $chibo['TenChiBo'] : ''; ?>"
				   class="form-control" id="TenChiBo" name="TenChiBo" required>
		</div>
	</div>
	<div class="form-group">
		<label for="name" class="col-sm-3 control-label">Bí thư chi bộ</label>
		<div class="col-sm-9">
			<select class="form-control" id="BiThu" name="BiThu" required>
			<option value="0">Không</option>
			<?php foreach ($list_hoso as $row_hoso) {
				$selected = '';
				if ($chibo && ($chibo['BiThu'] == $row_hoso['Id'])) $selected = 'selected';
				echo '<option value="' . $row_hoso['Id'] . '" ' . $selected . '>' . $row_hoso['HoTen'] .' ('. $row_hoso['TenChiBo'] .')</option>';
			} ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-sm-3 control-label">Ghi chú</label>
		<div class="col-sm-9">
			<input type="text" value="<?php echo $chibo ? $chibo['MoTa'] : ''; ?>" class="form-control" id="MoTa" name="MoTa" />
		</div>
	</div>
			
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
			<button type="submit"
					class="btn btn-primary"><?php echo $chibo ? 'Cập nhật' : 'Thêm mới'; ?></button>
			<a class="btn btn-warning" href="admin.php?controller=chibo">Trở về</a>
		</div>
	</div>
</form>


