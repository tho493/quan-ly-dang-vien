<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading">
            <b><?php echo $title ?></b>
        </div>
        <div class="panel-body">
            <form id="upload-form" class="form-horizontal" method="post" action="admin.php?controller=vanban&action=upload" enctype="multipart/form-data" role="form">
                    
				<div class="form-group">
					<label class="col-sm-3 control-label">Chọn tệp tải lên</label>
					<div class="col-sm-9">
						<input type="file" class="form-control" id="inputFile" name="inputFile" required/><br>
						<?php 
							foreach ($vanban_files as $row_file) {
								echo '<a href="public/upload/vanban/'. $row_file['File'] .'" target="blank" data-toggle="tooltip" title="'. $row_file['File'] .'">'. $row_file['File'] .'</a> ';
								echo '<a href="admin.php?controller=vanban&action=deletefile&id='. $row_file['Id'] .'&vbid='.$vbid.'" class="text-danger deleteitem" data-toggle="tooltip" title="Xóa"><i class="glyphicon glyphicon-remove fa-lg"></i></a></br>';
							}
						?>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<input type="hidden" name="vbid" value="<?php echo $vbid; ?>"/>
						<button type="submit" class="btn btn-primary">Tải lên</button>
						<a class="btn btn-warning" href="admin.php?controller=vanban">Trở về</a>
					</div>
				</div>

			</form>
        </div>
    </div>
</div>
<?php require('admin/views/shared/footer.php'); ?>

