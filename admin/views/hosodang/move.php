<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo $title ?>
        </div>
        <div class="panel-body">
            <div class="dataTable_wrapper">                

                <form id="user-form" class="form-horizontal" method="post" action="admin.php?controller=hosodang&action=move" enctype="multipart/form-data" role="form">
                    										
                    <div class="form-group">
						<label class="col-sm-3 control-label">Ngày chuyển sinh hoạt</label>
						<div class="col-sm-3">
							<input type="date" class="form-control" id="NgayChuyenSH" name="NgayChuyenSH" value="" required/>
						</div>
					</div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nơi chuyển đến</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="NoiChuyenSH" name="NoiChuyenSH" value="" required/>
                        </div>
                    </div>					
					
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
							<input type="hidden" name="id" value="<?php echo $id; ?>"/>
							<button type="submit" class="btn btn-primary">Tiếp theo</button>
                            <a class="btn btn-warning" href="admin.php?controller=hosodang">Trở về</a>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php require('admin/views/shared/footer.php'); ?>

