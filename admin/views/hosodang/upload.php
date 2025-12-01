<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo $title ?>
        </div>
        <div class="panel-body">
            <form id="user-form" class="form-horizontal" method="post" action="admin.php?controller=hosodang&action=upload" enctype="multipart/form-data" role="form">
                    
				<div class="form-group">
					<label class="col-sm-3 control-label">Chọn tệp tải lên</label>
					<div class="col-sm-9">
						<input type="file" class="form-control" id="f" name="f" required/><br>
						<?php 
							foreach ($hoso_files as $row_file) {
								echo '<a href="public/upload/files/'. $row_file['File'] .'" target="blank" data-toggle="tooltip" title="'. $row_file['File'] .'">'. $row_file['File'] .'</a> ';
								echo '<a href="admin.php?controller=hosodang&action=deletefile&id='. $row_file['Id'] .'&hosoid='.$hosoid.'" class="text-danger deleteitem" data-toggle="tooltip" title="Xóa"><i class="glyphicon glyphicon-remove fa-lg"></i></a></br>';
							}
						?>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<input type="hidden" name="HoSoId" value="<?php echo $hosoid; ?>"/>
						<button type="submit" class="btn btn-primary">Tải lên</button>
						<a class="btn btn-warning" href="admin.php?controller=hosodang">Trở về</a>
					</div>
				</div>

			</form>
        </div>
    </div>
</div>
<?php require('admin/views/shared/footer.php'); ?>

