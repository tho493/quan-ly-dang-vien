<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading">
            <b><?php echo $title ?></b>
        </div>
        <div class="panel-body">
            <form id="upload-form" class="form-horizontal" method="post" 
				action="admin.php?controller=thongbao&action=upload" enctype="multipart/form-data" role="form">
                    
				<div class="form-group">
					<label class="col-sm-3 control-label">Chọn tệp tải lên</label>
					<div class="col-sm-9">
						<input type="file" class="form-control" id="inputFile" name="inputFile" required/><br>
						<?php 
							foreach ($object_files as $row_file) {
								echo '<a href="public/upload/thongbao/'. $row_file['File'] .'" target="blank" data-toggle="tooltip" title="'. $row_file['File'] .'">'. $row_file['File'] .'</a> ';
								echo '<a href="admin.php?controller=thongbao&action=deletefile&id='. $row_file['Id'] .'&thongbaoid='.$thongbaoid.'" class="text-danger deleteitem" data-toggle="tooltip" title="Xóa"><i class="glyphicon glyphicon-remove fa-lg"></i></a></br>';
							}
						?>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<input type="hidden" name="thongbaoid" value="<?php echo $thongbaoid; ?>"/>
						<button type="submit" class="btn btn-primary">Tải lên</button>
						<a class="btn btn-warning" href="admin.php?controller=thongbao">Trở về</a>
					</div>
				</div>

			</form>
        </div>
    </div>
</div>
<?php require('admin/views/shared/footer.php'); ?>

