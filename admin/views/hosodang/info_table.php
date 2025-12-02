<table id="user-form" class="form-horizontal">
	<div class="row">
		<div class="col-sm-12">
			<?php if ($user_info['Avatar'] != '')
				echo '<image src="public/upload/images/' . $user_info['Avatar'] . '" style="max-width:200px; padding-bottom:20px;" />'; ?>
		</div>
	</div>
	<div class="row">
		<label class="col-sm-3 control-label">Chi bộ</label>
		<div class="col-sm-9">
			<?php echo $user_info ? $user_info['TenChiBo'] : ''; ?>
		</div>
	</div>
	<div class="row">
		<label class="col-sm-3 control-label">Họ và tên</label>
		<div class="col-sm-9">
			<?php echo $user_info ? $user_info['HoTen'] : ''; ?>
		</div>
	</div>
	<div class="row">
		<label class="col-sm-3 control-label">Giới tính</label>
		<div class="col-sm-9">
			<?php echo $user_info ? $user_info['GioiTinh'] : ''; ?>
		</div>
	</div>
	<div class="row">
		<label class="col-sm-3 control-label">Ngày sinh</label>
		<div class="col-sm-9">
			<?php echo $user_info ? date('d/m/Y', strtotime($user_info['NgaySinh'])) : ''; ?>
		</div>
	</div>
	<div class="row">
		<label class="col-sm-3 control-label">Điện thoại</label>
		<div class="col-sm-9">
			<?php echo $user_info ? $user_info['DienThoai'] : ''; ?>
		</div>
	</div>
	<div class="row">
		<label class="col-sm-3 control-label">Email</label>
		<div class="col-sm-9">
			<?php echo $user_info ? $user_info['Email'] : ''; ?>
		</div>
	</div>

	<div class="row">
		<label class="col-sm-3 control-label">Hộ khẩu</label>
		<div class="col-sm-9">
			<?php echo $user_info ? $user_info['HoKhau'] : ''; ?>
		</div>
	</div>

	<div class="row">
		<label class="col-sm-3 control-label">Nguyên quán</label>
		<div class="col-sm-9">
			<?php echo $user_info ? $user_info['NguyenQuan'] : ''; ?>
		</div>
	</div>

	<div class="row">
		<label class="col-sm-3 control-label">Ngày kết nạp</label>
		<div class="col-sm-9">
			<?php echo $user_info ? date('d/m/Y', strtotime($user_info['NgayKetNap'])) : ''; ?>
		</div>
	</div>

	<div class="row">
		<label class="col-sm-3 control-label">Ngày chính thức</label>
		<div class="col-sm-9">
			<?php echo (($user_info) && ($user_info['NgayChinhThuc'] != '0000-00-00')) ? date('d/m/Y', strtotime($user_info['NgayChinhThuc'])) : ''; ?>
		</div>
	</div>

	<div class="row">
		<label class="col-sm-3 control-label">Số thẻ đảng</label>
		<div class="col-sm-9">
			<?php echo $user_info ? $user_info['SoTheDang'] : ''; ?>
		</div>
	</div>

	<div class="row">
		<label class="col-sm-3 control-label">Ngày chuyển sinh hoạt</label>
		<div class="col-sm-9">
			<?php echo (($user_info) && ($user_info['NgayChuyenSH'] != '0000-00-00')) ? date('d/m/Y', strtotime($user_info['NgayChuyenSH'])) : ''; ?>
		</div>
	</div>
	<div class="row">
		<label class="col-sm-3 control-label">Nơi chuyển đến</label>
		<div class="col-sm-9">
			<?php echo $user_info ? $user_info['NoiChuyenSH'] : ''; ?>
		</div>
	</div>

	<div class="row">
		<label class="col-sm-3 control-label">Trạng thái</label>
		<div class="col-sm-9">
			<?php if ($user_info['TrangThai'] == 0)
				echo 'Đang sinh hoạt';
			else if ($user_info['TrangThai'] == 1)
				echo 'Chuyển sinh hoạt';
			else if ($user_info['TrangThai'] == 2)
				echo 'Xóa tên';
			else
				echo 'Đã mất'; ?>
		</div>
	</div>

	<div class="row">
		<label class="col-sm-3 control-label">Trạng thái đảng</label>
		<div class="col-sm-9">
			<?php
			if ($user_info['TrangThaiDang'] == 'chinhthuc') {
				echo '<span class="label label-success">Chính thức</span>';
			} else {
				echo '<span class="label label-info">Dự bị</span>';
			}
			?>
		</div>
	</div>

	<div class="row">
		<label class="col-sm-3 control-label">Loại đảng viên</label>
		<div class="col-sm-9">
			<?php
			if ($user_info['LoaiDangVien'] == 'GV')
				echo 'Giảng viên';
			elseif ($user_info['LoaiDangVien'] == 'VC')
				echo 'Viên chức';
			elseif ($user_info['LoaiDangVien'] == 'SV')
				echo 'Sinh viên';
			else
				echo '-';
			?>
		</div>
	</div>

	<div class="row">
		<label class="col-sm-3 control-label">Đã cấp thẻ đảng</label>
		<div class="col-sm-9">
			<?php
			if ($user_info['DaCapTheDang'] == 1) {
				echo '<span class="label label-success">Đã cấp</span>';
			} else {
				echo '<span class="label label-danger">Chưa cấp</span>';
			}
			?>
		</div>
	</div>

	<div class="row">
		<label class="col-sm-3 control-label"></label>
		<div class="col-sm-9">
			<a class="btn btn-warning" href="admin.php?controller=hosodang">Trở về</a>
		</div>
	</div>

</table>

<!-- Phần hiển thị 7 mục hồ sơ -->
<div class="panel panel-default" style="margin-top: 30px;">
	<div class="panel-heading">
		<h4><i class="fa fa-folder-open"></i> Hồ sơ đảng viên (7 mục theo phụ lục 2 hướng dẫn số 12)</h4>
	</div>
	<div class="panel-body">
		<?php foreach ($list_muc_hoso as $muc): ?>
			<?php
			$muc_id = $muc['Id'];
			$has_files = isset($files_by_muc[$muc_id]) && !empty($files_by_muc[$muc_id]);
			$files = $has_files ? $files_by_muc[$muc_id] : array();
			?>
			<div class="panel <?php echo $has_files ? 'panel-success' : 'panel-danger'; ?>" style="margin-bottom: 15px;">
				<div class="panel-heading">
					<h5>
						<?php echo $muc['TenMuc']; ?>
						<?php if ($has_files): ?>
							<span class="badge pull-right"><?php echo count($files); ?> file</span>
						<?php else: ?>
							<span class="badge badge-danger pull-right">THIẾU</span>
						<?php endif; ?>
					</h5>
				</div>
				<div class="panel-body">
					<?php if ($has_files): ?>
						<table class="table table-condensed">
							<thead>
								<tr>
									<th>Năm</th>
									<th>Tên file</th>
									<th>Ngày upload</th>
									<th>Thao tác</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($files as $file): ?>
									<tr>
										<td><?php echo $file['Nam'] ? $file['Nam'] : '-'; ?></td>
										<td><?php echo $file['TenFile'] ? $file['TenFile'] : $file['File']; ?></td>
										<td><?php echo date('d/m/Y H:i', strtotime($file['NgayUpload'])); ?></td>
										<td>
											<a href="public/upload/files/<?php echo $file['File']; ?>" target="_blank"
												class="btn btn-xs btn-info">
												<i class="fa fa-download"></i> Tải
											</a>
											<?php if (checkPermission($user, 'hosodang')): ?>
												<a href="admin.php?controller=hosodang&action=deletefilemuc&id=<?php echo $file['Id']; ?>&hosoid=<?php echo $id; ?>"
													class="btn btn-xs btn-danger" onclick="return confirm('Xác nhận xóa?');">
													<i class="fa fa-trash"></i> Xóa
												</a>
											<?php endif; ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					<?php else: ?>
						<p class="text-danger"><strong>Chưa có file hồ sơ cho mục này</strong></p>
					<?php endif; ?>
					<?php if (checkPermission($user, 'hosodang')): ?>
						<a href="admin.php?controller=hosodang&action=uploadmuc&id=<?php echo $id; ?>&mucid=<?php echo $muc_id; ?>"
							class="btn btn-sm btn-primary">
							<i class="fa fa-upload"></i> Upload file
						</a>
					<?php endif; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<!-- Phần hồ sơ theo năm -->
<div class="panel panel-default" style="margin-top: 30px;">
	<div class="panel-heading">
		<h4><i class="fa fa-calendar"></i> Hồ sơ theo năm (Phiếu bổ sung lý lịch, Kiểm điểm cuối năm, Xác nhận cư trú)
		</h4>
	</div>
	<div class="panel-body">
		<?php if (empty($list_hoso_nam)): ?>
			<p class="text-muted">Chưa có dữ liệu</p>
		<?php else: ?>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Năm</th>
							<th>Phiếu bổ sung lý lịch</th>
							<th>Kiểm điểm cuối năm</th>
							<th>Xác nhận cư trú</th>
							<th>Ghi chú</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($list_hoso_nam as $hoso_nam): ?>
							<tr>
								<td><strong><?php echo $hoso_nam['Nam']; ?></strong></td>
								<td>
									<?php if ($hoso_nam['PhieuBoSungLyLich']): ?>
										<a href="public/upload/files/<?php echo $hoso_nam['PhieuBoSungLyLich']; ?>" target="_blank"
											class="btn btn-xs btn-info">
											<i class="fa fa-download"></i> Tải
										</a>
									<?php else: ?>
										<span class="text-muted">Chưa có</span>
									<?php endif; ?>
								</td>
								<td>
									<?php if ($hoso_nam['KiemDiemCuoiNam']): ?>
										<a href="public/upload/files/<?php echo $hoso_nam['KiemDiemCuoiNam']; ?>" target="_blank"
											class="btn btn-xs btn-info">
											<i class="fa fa-download"></i> Tải
										</a>
									<?php else: ?>
										<span class="text-muted">Chưa có</span>
									<?php endif; ?>
								</td>
								<td>
									<?php if ($hoso_nam['XacNhanCuTru']): ?>
										<a href="public/upload/files/<?php echo $hoso_nam['XacNhanCuTru']; ?>" target="_blank"
											class="btn btn-xs btn-info">
											<i class="fa fa-download"></i> Tải
										</a>
									<?php else: ?>
										<span class="text-muted">Chưa có</span>
									<?php endif; ?>
								</td>
								<td><?php echo $hoso_nam['GhiChu']; ?></td>
								<td>
									<?php if (checkPermission($user, 'hosodang')): ?>
										<a href="admin.php?controller=hosodang&action=edithosonam&id=<?php echo $hoso_nam['Id']; ?>&hosoid=<?php echo $id; ?>"
											class="btn btn-xs btn-warning">
											<i class="fa fa-edit"></i> Sửa
										</a>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php endif; ?>
		<?php if (checkPermission($user, 'hosodang')): ?>
			<a href="admin.php?controller=hosodang&action=addhosonam&id=<?php echo $id; ?>" class="btn btn-primary">
				<i class="fa fa-plus"></i> Thêm hồ sơ năm mới
			</a>
		<?php endif; ?>
	</div>
</div>