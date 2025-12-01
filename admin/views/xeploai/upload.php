<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading">
            <b><?php echo $title ?></b>
        </div>
        <div class="panel-body">
            <form id="upload-form" class="form-horizontal" method="post" 
				action="admin.php?controller=xeploai&action=upload" enctype="multipart/form-data" role="form">
                 
				<div class="form-group">
					<label class="col-sm-2 control-label">Năm xếp loại</label>
					<div class="col-sm-2">
						<select class="form-control" id="nam" name="nam" required>
						<option value=""></option>
						<?php foreach ($tb_nam as $row_y) {
							$selected = '';
							if ($nam && ($nam == $row_y['Nam'])) $selected = 'selected';
							echo '<option value="' . $row_y['Nam'] . '" ' . $selected . '>' . $row_y['Nam'] . '</option>';
						} ?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Chọn tệp tải lên</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" id="inputFile" name="inputFile" required/><br>
						<?php 
							foreach ($xeploai_files as $row_file) {
								echo '<a href="public/upload/xeploai/'. $row_file['File'] .'" target="blank" data-toggle="tooltip" title="'. $row_file['File'] .'">'. $row_file['File'] .'</a> ';
								echo '<a href="admin.php?controller=xeploai&action=deletefile&id='. $row_file['Id'] .'" class="text-danger deleteitem" data-toggle="tooltip" title="Xóa"><i class="glyphicon glyphicon-remove fa-lg"></i></a></br>';
							}
						?>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Tải lên</button>
						<a class="btn btn-warning" href="admin.php?controller=xeploai">Trở về</a>
					</div>
				</div>

			</form>
        </div>
    </div>
</div>
<?php require('admin/views/shared/footer.php'); ?>

