<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<b><?php echo $title ?></b>
		</div>
		<div class="panel-body">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#ketnap">Kết nạp đảng <span class="badge"><?php echo count($list_duyet_ketnap); ?></span></a></li>
				<li><a data-toggle="tab" href="#chuyenchinhthuc">Chuyển chính thức <span class="badge"><?php echo count($list_duyet_chuyenchinhthuc); ?></span></a></li>
				<li><a data-toggle="tab" href="#chuyensinhhoat">Chuyển sinh hoạt <span class="badge"><?php echo count($list_duyet_chuyensinhhoat); ?></span></a></li>
				<li><a data-toggle="tab" href="#xoaten">Xóa tên <span class="badge"><?php echo count($list_duyet_xoaten); ?></span></a></li>
				<li><a data-toggle="tab" href="#xeploai">Xếp loại đảng bộ</a></li>
			</ul>

			<div class="tab-content" style="margin-top: 20px;">
				<!-- Tab Kết nạp đảng -->
				<div id="ketnap" class="tab-pane fade in active">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4><i class="fa fa-user-plus"></i> Duyệt hồ sơ kết nạp đảng</h4>
						</div>
						<div class="panel-body">
							<?php if (empty($list_duyet_ketnap)): ?>
								<p class="text-muted">Không có hồ sơ nào chờ duyệt</p>
							<?php else: ?>
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>TT</th>
												<th>Họ và tên</th>
												<th>Chi bộ</th>
												<th>Ngày gửi</th>
												<th>File hồ sơ</th>
												<th>Thao tác</th>
											</tr>
										</thead>
										<tbody>
											<?php $stt = 1; foreach ($list_duyet_ketnap as $duyet): ?>
												<?php $dv = get_dangvien_info($duyet['HoSoId']); ?>
												<?php $chibo = get_chibo_info($dv['ChiBoId']); ?>
												<tr>
													<td><?php echo $stt++; ?></td>
													<td><strong><?php echo $dv['HoTen']; ?></strong></td>
													<td><?php echo $chibo['TenChiBo']; ?></td>
													<td><?php echo date('d/m/Y H:i', strtotime($duyet['NgayGui'])); ?></td>
													<td>
														<?php if ($duyet['FileHoSo']): ?>
															<a href="public/upload/files/<?php echo $duyet['FileHoSo']; ?>" target="_blank" class="btn btn-sm btn-info">
																<i class="fa fa-download"></i> Tải file
															</a>
														<?php else: ?>
															<span class="text-muted">Chưa có file</span>
														<?php endif; ?>
													</td>
													<td>
														<a href="admin.php?controller=nghiepvu&action=duyet&id=<?php echo $duyet['Id']; ?>&trangthai=1" 
														   class="btn btn-sm btn-success" onclick="return confirm('Xác nhận duyệt hồ sơ này?');">
															<i class="fa fa-check"></i> Duyệt
														</a>
														<a href="admin.php?controller=nghiepvu&action=duyet&id=<?php echo $duyet['Id']; ?>&trangthai=2" 
														   class="btn btn-sm btn-danger" onclick="return confirm('Xác nhận từ chối hồ sơ này?');">
															<i class="fa fa-times"></i> Từ chối
														</a>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<!-- Tab Chuyển chính thức -->
				<div id="chuyenchinhthuc" class="tab-pane fade">
					<div class="panel panel-warning">
						<div class="panel-heading">
							<h4><i class="fa fa-check-circle"></i> Duyệt hồ sơ chuyển chính thức</h4>
						</div>
						<div class="panel-body">
							<?php if (empty($list_duyet_chuyenchinhthuc)): ?>
								<p class="text-muted">Không có hồ sơ nào chờ duyệt</p>
							<?php else: ?>
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>TT</th>
												<th>Họ và tên</th>
												<th>Chi bộ</th>
												<th>Ngày kết nạp</th>
												<th>Ngày gửi</th>
												<th>File hồ sơ</th>
												<th>Thao tác</th>
											</tr>
										</thead>
										<tbody>
											<?php $stt = 1; foreach ($list_duyet_chuyenchinhthuc as $duyet): ?>
												<?php $dv = get_dangvien_info($duyet['HoSoId']); ?>
												<?php $chibo = get_chibo_info($dv['ChiBoId']); ?>
												<tr>
													<td><?php echo $stt++; ?></td>
													<td><strong><?php echo $dv['HoTen']; ?></strong></td>
													<td><?php echo $chibo['TenChiBo']; ?></td>
													<td><?php echo $dv['NgayKetNap'] ? date('d/m/Y', strtotime($dv['NgayKetNap'])) : ''; ?></td>
													<td><?php echo date('d/m/Y H:i', strtotime($duyet['NgayGui'])); ?></td>
													<td>
														<?php if ($duyet['FileHoSo']): ?>
															<a href="public/upload/files/<?php echo $duyet['FileHoSo']; ?>" target="_blank" class="btn btn-sm btn-info">
																<i class="fa fa-download"></i> Tải file
															</a>
														<?php else: ?>
															<span class="text-muted">Chưa có file</span>
														<?php endif; ?>
													</td>
													<td>
														<a href="admin.php?controller=nghiepvu&action=duyet&id=<?php echo $duyet['Id']; ?>&trangthai=1" 
														   class="btn btn-sm btn-success" onclick="return confirm('Xác nhận duyệt chuyển chính thức?');">
															<i class="fa fa-check"></i> Duyệt
														</a>
														<a href="admin.php?controller=nghiepvu&action=duyet&id=<?php echo $duyet['Id']; ?>&trangthai=2" 
														   class="btn btn-sm btn-danger" onclick="return confirm('Xác nhận từ chối?');">
															<i class="fa fa-times"></i> Từ chối
														</a>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<!-- Tab Chuyển sinh hoạt -->
				<div id="chuyensinhhoat" class="tab-pane fade">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4><i class="fa fa-exchange"></i> Duyệt hồ sơ chuyển sinh hoạt</h4>
						</div>
						<div class="panel-body">
							<?php if (empty($list_duyet_chuyensinhhoat)): ?>
								<p class="text-muted">Không có hồ sơ nào chờ duyệt</p>
							<?php else: ?>
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>TT</th>
												<th>Họ và tên</th>
												<th>Chi bộ hiện tại</th>
												<th>Nơi chuyển đến</th>
												<th>Chi bộ mới</th>
												<th>Ngày gửi</th>
												<th>Thao tác</th>
											</tr>
										</thead>
										<tbody>
											<?php $stt = 1; foreach ($list_duyet_chuyensinhhoat as $duyet): ?>
												<?php $dv = get_dangvien_info($duyet['HoSoId']); ?>
												<?php $chibo = get_chibo_info($dv['ChiBoId']); ?>
												<?php $chibo_moi = $duyet['ChiBoMoiId'] ? get_chibo_info($duyet['ChiBoMoiId']) : null; ?>
												<tr>
													<td><?php echo $stt++; ?></td>
													<td><strong><?php echo $dv['HoTen']; ?></strong></td>
													<td><?php echo $chibo['TenChiBo']; ?></td>
													<td><?php echo $duyet['NoiChuyenSH']; ?></td>
													<td><?php echo $chibo_moi ? $chibo_moi['TenChiBo'] : ''; ?></td>
													<td><?php echo date('d/m/Y H:i', strtotime($duyet['NgayGui'])); ?></td>
													<td>
														<a href="admin.php?controller=nghiepvu&action=duyet&id=<?php echo $duyet['Id']; ?>&trangthai=1" 
														   class="btn btn-sm btn-success" onclick="return confirm('Xác nhận duyệt chuyển sinh hoạt?');">
															<i class="fa fa-check"></i> Duyệt
														</a>
														<a href="admin.php?controller=nghiepvu&action=duyet&id=<?php echo $duyet['Id']; ?>&trangthai=2" 
														   class="btn btn-sm btn-danger" onclick="return confirm('Xác nhận từ chối?');">
															<i class="fa fa-times"></i> Từ chối
														</a>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<!-- Tab Xóa tên -->
				<div id="xoaten" class="tab-pane fade">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h4><i class="fa fa-user-times"></i> Duyệt hồ sơ xóa tên</h4>
						</div>
						<div class="panel-body">
							<?php if (empty($list_duyet_xoaten)): ?>
								<p class="text-muted">Không có hồ sơ nào chờ duyệt</p>
							<?php else: ?>
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>TT</th>
												<th>Họ và tên</th>
												<th>Chi bộ</th>
												<th>Ngày gửi</th>
												<th>File hồ sơ</th>
												<th>Thao tác</th>
											</tr>
										</thead>
										<tbody>
											<?php $stt = 1; foreach ($list_duyet_xoaten as $duyet): ?>
												<?php $dv = get_dangvien_info($duyet['HoSoId']); ?>
												<?php $chibo = get_chibo_info($dv['ChiBoId']); ?>
												<tr>
													<td><?php echo $stt++; ?></td>
													<td><strong><?php echo $dv['HoTen']; ?></strong></td>
													<td><?php echo $chibo['TenChiBo']; ?></td>
													<td><?php echo date('d/m/Y H:i', strtotime($duyet['NgayGui'])); ?></td>
													<td>
														<?php if ($duyet['FileHoSo']): ?>
															<a href="public/upload/files/<?php echo $duyet['FileHoSo']; ?>" target="_blank" class="btn btn-sm btn-info">
																<i class="fa fa-download"></i> Tải file
															</a>
														<?php else: ?>
															<span class="text-muted">Chưa có file</span>
														<?php endif; ?>
													</td>
													<td>
														<a href="admin.php?controller=nghiepvu&action=duyet&id=<?php echo $duyet['Id']; ?>&trangthai=1" 
														   class="btn btn-sm btn-success" onclick="return confirm('Xác nhận duyệt xóa tên?');">
															<i class="fa fa-check"></i> Duyệt
														</a>
														<a href="admin.php?controller=nghiepvu&action=duyet&id=<?php echo $duyet['Id']; ?>&trangthai=2" 
														   class="btn btn-sm btn-danger" onclick="return confirm('Xác nhận từ chối?');">
															<i class="fa fa-times"></i> Từ chối
														</a>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<!-- Tab Xếp loại đảng bộ -->
				<div id="xeploai" class="tab-pane fade">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h4><i class="fa fa-trophy"></i> Xếp loại đảng bộ</h4>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<a href="admin.php?controller=nghiepvu&action=uploadxeploai" class="btn btn-primary">
										<i class="fa fa-upload"></i> Upload file quyết định khen thưởng
									</a>
								</div>
							</div>
							<hr>
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>TT</th>
											<th>Năm</th>
											<th>File quyết định</th>
											<th>Ngày tạo</th>
											<th>Thao tác</th>
										</tr>
									</thead>
									<tbody>
										<?php if (empty($list_xeploai_dangbo)): ?>
											<tr>
												<td colspan="5" class="text-center text-muted">Chưa có dữ liệu</td>
											</tr>
										<?php else: ?>
											<?php $stt = 1; foreach ($list_xeploai_dangbo as $xeploai): ?>
												<tr>
													<td><?php echo $stt++; ?></td>
													<td><strong><?php echo $xeploai['Nam']; ?></strong></td>
													<td>
														<?php if ($xeploai['FileQuyetDinh']): ?>
															<a href="public/upload/files/<?php echo $xeploai['FileQuyetDinh']; ?>" target="_blank" class="btn btn-sm btn-info">
																<i class="fa fa-download"></i> Tải file
															</a>
														<?php else: ?>
															<span class="text-muted">Chưa có file</span>
														<?php endif; ?>
													</td>
													<td><?php echo date('d/m/Y H:i', strtotime($xeploai['NgayTao'])); ?></td>
													<td>
														<a href="admin.php?controller=nghiepvu&action=deletexeploai&id=<?php echo $xeploai['Id']; ?>" 
														   class="btn btn-sm btn-danger" onclick="return confirm('Xác nhận xóa?');">
															<i class="fa fa-trash"></i> Xóa
														</a>
													</td>
												</tr>
											<?php endforeach; ?>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require('admin/views/shared/footer.php'); ?>

