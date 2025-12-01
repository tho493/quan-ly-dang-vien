<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">
	<a href="admin.php?controller=taikhoan&amp;action=add" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
	
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<b><?php echo $title ?></b>
		</div>
		<div class="panel-body">
			<div class="dataTable_wrapper">
				<table class="table table-striped table-bordered table-hover" id="dataTables-user">
					<thead>
					<tr>
						<th style="width:1%;">Id</th>
						<th>Tên đăng nhập</th>
						<th>Họ và tên</th>
						<th>Chi bộ</th>
						<th>Quyền</th>
						<th>Ngừng hoạt động</th>
						<th>Chức năng</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($taikhoan as $row): ?>
						<tr class="odd gradeX">
							<td><?php echo $row['Id'] ?></td>
							<td>
								<a href="admin.php?controller=taikhoan&action=info&username=<?php echo $row['Username']; ?>" data-toggle="tooltip" title="Thông tin"><?php echo $row['Username']; ?></a>
							</td>
							<td><?php echo $row['HoTen'] ?></td>
							<td><?php echo $row['TenChiBo'] ?></td>
							<td><?php echo $row['Permission'] ?></td>
							<td><?php if ($row['Disable']==1) echo 'Có'; else echo 'Không'; ?></td>
							<td nowrap>
								<a href="admin.php?controller=taikhoan&action=permission&id=<?php echo $row['Id']; ?>"
								   class="text-warning" data-toggle="tooltip" title="Phân quyền">
								   <i class="glyphicon glyphicon-cog fa-lg"></i>
								</a>
								<a href="admin.php?controller=taikhoan&action=resetpassword&id=<?php echo $row['Id']; ?>"
								   class="text-primary" data-toggle="tooltip" title="Reset mật khẩu">
								   <i class="glyphicon glyphicon-refresh fa-lg"></i>
								</a>
								<a href="admin.php?controller=taikhoan&action=edit&id=<?php echo $row['Id']; ?>"
								   class="text-success" data-toggle="tooltip" title="Sửa">
								   <i class="glyphicon glyphicon-edit fa-lg"></i>
								</a>
								<a href="admin.php?controller=taikhoan&action=delete&id=<?php echo $row['Id']; ?>"
								   class="text-danger deleteitem" data-toggle="tooltip" title="Xóa">
								   <i class="glyphicon glyphicon-remove fa-lg"></i>
								</a>
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
			$('#dataTables-user').DataTable({
				responsive: true,  "order":[[1, 'asc']]
			});
		});
	</script>
</div>
<?php require('admin/views/shared/footer.php'); ?>