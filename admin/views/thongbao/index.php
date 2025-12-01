<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">
	
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<b><?php echo $title ?></b>
		</div>
		<div class="panel-body">
			<div class="dataTable_wrapper">
				<table class="table table-striped table-bordered table-hover" id="datatable">
					<thead>
					<tr>
						<th style="width:1%;"></th>
						<th style="width:1%;">TT</th>
						<th>Thông báo</th>
						<th>File</th>
						<th>Người tạo</th>						
					</tr>
					</thead>
					<tbody>
					<?php $stt=1; foreach ($objects as $row): ?>
						<tr class="odd gradeX">
							<td nowrap>
								<a href="admin.php?controller=thongbao&action=upload&id=<?php echo $row['Id']; ?>"
								   class="text-primary" data-toggle="tooltip" title="Tải lên file đính kèm">
								   <i class="glyphicon glyphicon-cloud-upload fa-lg"></i>
								</a>
								<a href="admin.php?controller=thongbao&action=edit&id=<?php echo $row['Id']; ?>" data-toggle="tooltip" title="Sửa"
								   class="text-success"><i class="glyphicon glyphicon-edit fa-lg"></i></a>
								<a href="admin.php?controller=thongbao&action=delete&id=<?php echo $row['Id']; ?>" data-toggle="tooltip" title="Xóa"
								   class="text-danger deleteitem"><i class="glyphicon glyphicon-remove fa-lg"></i></a>
							</td>
							<td><?php echo $stt++ ?></td>							
							<td><?php echo $row['ThongBao'] ?></td>
							<td>
								<?php
								foreach ($thongbao_files as $f) {
									if ($f['ThongBaoId'] == $row['Id']) echo '<a href="public/upload/thongbao/'.$f['File'].'" target="blank" data-toggle="tooltip" title="'. $f['File'] .'"><i class="glyphicon glyphicon-cloud-download fa-lg"></i></a>';
								}
								?>
							</td>
							<td><?php echo get_name($row['NguoiTao']) ?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="panel-footer">
			<a href="admin.php?controller=thongbao&action=edit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
		</div>
	</div>

</div>
<?php require('admin/views/shared/footer.php'); ?>