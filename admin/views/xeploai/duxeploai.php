<?php require('admin/views/shared/header.php'); ?>
<!-- Navigation -->
<div id="page-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading">
            <b><?php echo $title ?></b>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <form id="product-form" class="form-horizontal" method="post"
					action="admin.php?controller=xeploai&action=duxeploai" enctype="multipart/form-data" role="form">
					
					<p>Năm xếp loại: <b><?php echo $nam; ?></b></p>
					<p>Chi bộ đảng: <b><?php echo isset($chibo['TenChiBo']) ? $chibo['TenChiBo'] : ''; ?></b></p><br>
					
					<table class="table table-striped table-bordered table-hover" >
						<thead>
						<tr>
							<th style="width:1%;">TT</th>
							<th>Họ và tên</th>
							<th>Xếp loại</th>					
						</tr>
						</thead>
						<tbody>
						<?php $stt=1; foreach ($objects as $row): ?>
							<tr class="odd gradeX">								
								<td><?php echo $stt++ ?></td>							
								<td><?php echo $row['HoTen']; ?></td>
								<td>
									<select class="form-control" id="XepLoai" name="XepLoai[<?php echo $row['idhoso']; ?>][<?php echo $row['Id']; ?>]" >
										<option value="HTXSNV" <?php if ($row['DUXepLoai'] == 'HTXSNV') echo 'selected'; ?> >Hoàn thành xuất sắc nhiệm vụ</option>
										<option value="HTTNV" <?php if ($row['DUXepLoai'] == 'HTTNV') echo 'selected'; ?> >Hoàn thành tốt nhiệm vụ</option>
										<option value="HTNV" <?php if ($row['DUXepLoai'] == 'HTNV') echo 'selected'; ?> >Hoàn thành nhiệm vụ</option>
										<option value="KHTNV" <?php if ($row['DUXepLoai'] == 'KHTNV') echo 'selected'; ?> >Không hoàn thành nhiệm vụ</option>
									</select>
								</td>								
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
					
					<div class="form-group">
						<div class="text-center">
							<input type="hidden" name="Nam" value="<?php echo $nam; ?>"/>							
							<button type="submit" class="btn btn-primary">Chấp nhận</button>
							<a class="btn btn-warning" href="admin.php?controller=xeploai&action=index&chiboid=<?php echo $chiboid ?>&nam=<?php echo $nam ?>">Trở về</a>
						</div>
					</div>
				
				</form>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
</div>
<?php require('admin/views/shared/footer.php'); ?>

