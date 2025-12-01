<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">
	<a href="admin.php?controller=chibo&amp;action=edit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<b><?php echo $title ?></b>
		</div>
		<div class="panel-body">
			<div class="dataTable_wrapper">
				<table class="table table-striped table-bordered table-hover" id="dataTables">
					<thead>
					<tr>
						<th style="width:1%;">Mã</th>
						<th>Chi bộ</th>
						<th>Bí thư chi bộ</th>
						<th>Ghi chú</th>
						<th>Chức năng</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($chibo as $row): ?>
						<tr class="odd gradeX">
							<td><?php echo $row['Id'] ?></td>
							<td><a href="admin.php?controller=chibo&amp;action=edit&amp;id=<?php echo $row['Id']; ?>" data-toggle="tooltip" title="Sửa"><?php echo $row['TenChiBo']; ?></a></td>
							<td><?php if ($row['BiThu']!=0) echo get_name_by_hosoid($row['BiThu']); ?></td>
							<td><?php echo $row['MoTa'] ?></td>	
							<td>
								<a href="admin.php?controller=chibo&amp;action=edit&amp;id=<?php echo $row['Id']; ?>" data-toggle="tooltip" title="Sửa"
								   class="text-success"><i class="glyphicon glyphicon-edit fa-lg"></i></a>
								<a href="admin.php?controller=chibo&amp;action=delete&amp;id=<?php echo $row['Id']; ?>" data-toggle="tooltip" title="Xóa"
								   class="text-danger deleteitem"><i class="glyphicon glyphicon-remove fa-lg"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function () {
			$('#dataTables').DataTable({
				responsive: true,  "order":[[1, 'desc']]
			});
		});
	</script>
</div>
<?php require('admin/views/shared/footer.php'); ?>