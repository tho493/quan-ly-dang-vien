<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">
	
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<b><?php echo $title ?></b>
		</div>
					
		<div class="panel-body">
			<form id="user-form" class="form-horizontal" method="post" action="" enctype="multipart/form-data" role="form">
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
					<label class="col-sm-2 control-label">Chi bộ đảng</label>
					<div class="col-sm-10">
						<select class="form-control" id="chiboid" name="chiboid" required>
						<option value="0"></option>
						<?php foreach ($tb_chibo as $row_cb) {
							$selected = '';
							if ($chiboid && ($chiboid == $row_cb['Id'])) $selected = 'selected';
							echo '<option value="' . $row_cb['Id'] . '" ' . $selected . '>' . $row_cb['TenChiBo'] . '</option>';
						} ?>
						</select>
					</div>
				</div>
				<div class="form-group" style="padding-left: 18px;">
					<label class="col-sm-2 control-label"></label>
					<button type="submit" class="btn btn-primary">Tìm kiếm</button>
				</div>
            </form>
			
			<hr>
			
			<div class="dataTable_wrapper">
				<table class="table table-striped table-bordered table-hover" id="datatable">
					<thead>
					<tr>
						<th style="width:1%;"></th>
						<th style="width:1%;">TT</th>
						<th>Họ và tên</th>
						<th>Năm</th>
						<th>CB Xếp loại</th>
						<th>ĐU Xếp loại</th>
						<th>Đính kèm</th>
						<th>Người cập nhật</th>						
					</tr>
					</thead>
					<tbody>
					<?php $stt=1; foreach ($objects as $row): ?>
						<tr class="odd gradeX">
							<td nowrap>								
								<?php if ($row['Id']!=''): ?>
								<a href="admin.php?controller=xeploai&action=edit&id=<?php echo $row['Id']; ?>" data-toggle="tooltip" title="Sửa"
								   class="text-success"><i class="glyphicon glyphicon-edit fa-lg"></i></a>
								<a href="admin.php?controller=xeploai&action=delete&id=<?php echo $row['Id']; ?>" data-toggle="tooltip" title="Xóa"
								   class="text-danger deleteitem"><i class="glyphicon glyphicon-remove fa-lg"></i></a>
								<?php endif; ?>
							</td>
							<td><?php echo $stt++ ?></td>							
							<td><?php echo $row['HoTen']; ?></td>
							<td><?php echo $row['Nam'] ?></td>
							<td><?php echo $row['CBXepLoai'] ?></td>
							<td><?php echo $row['DUXepLoai'] ?></td>
							<td>
								<?php
								foreach ($xeploai_files as $f) {
									if ($f['Nam'] == $row['Nam']) echo '<a href="public/upload/xeploai/'.$f['File'].'" target="blank" data-toggle="tooltip" title="'. $f['File'] .'"><i class="glyphicon glyphicon-cloud-download fa-lg"></i></a>';
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
			<a href="admin.php?controller=xeploai&action=edit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
			<a href="admin.php?controller=xeploai&action=cbxeploai&chiboid=<?php echo $chiboid ?>&nam=<?php echo $nam ?>" class="btn btn-success"><i class="glyphicon glyphicon-sort"></i> CB xếp loại</a>
			<a href="admin.php?controller=xeploai&action=duxeploai&chiboid=<?php echo $chiboid ?>&nam=<?php echo $nam ?>" class="btn btn-warning"><i class="glyphicon glyphicon-sort"></i> ĐU xếp loại</a>
			<a href="admin.php?controller=xeploai&action=upload" class="btn btn-info" data-toggle="tooltip" title="Đính kèm quyết định"><i class="glyphicon glyphicon-cloud-upload fa-lg"></i></a>
		</div>
	</div>

</div>
<?php require('admin/views/shared/footer.php'); ?>