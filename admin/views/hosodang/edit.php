<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo $title ?>
        </div>
        <div class="panel-body">
            <div class="dataTable_wrapper">                

                <form id="user-form" class="form-horizontal" method="post" action="admin.php?controller=hosodang&action=edit" enctype="multipart/form-data" role="form">
                    <input type="hidden" name="id" value="<?php echo $hoso_info ? $hoso_info['Id'] : '0'; ?>"/>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Chi bộ đảng</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="ChiBoId" name="ChiBoId" >
							<?php foreach ($chibo as $row_cb) {
								$selected = '';
								if ($hoso_info && ($hoso_info['ChiBoId'] == $row_cb['Id'])) $selected = 'selected';
								echo '<option value="' . $row_cb['Id'] . '" ' . $selected . '>' . $row_cb['TenChiBo'] . '</option>';
							} ?>
							</select>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Họ và tên</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="HoTen" id="HoTen" value="<?php echo $hoso_info ? $hoso_info['HoTen'] : ''; ?>" required/>
                        </div>
                    </div>

					<div class="form-group">
                        <label class="col-sm-3 control-label">Giới tính</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="GioiTinh" id="GioiTinh" >
								<option value="Nam" <?php if ($hoso_info && ($hoso_info['GioiTinh'] == 'Nam')) echo 'selected'; ?> >Nam</option>
								<option value="Nữ" <?php if ($hoso_info && ($hoso_info['GioiTinh'] == 'Nữ')) echo 'selected'; ?> >Nữ</option>
							</select>
                        </div>
                    </div>

                    <div class="form-group">
						<label class="col-sm-3 control-label">Ngày sinh</label>
						<div class="col-sm-3">
							<input type="date" class="form-control" id="NgaySinh" name="NgaySinh" value="<?php echo $hoso_info ? $hoso_info['NgaySinh'] : ''; ?>" required/>
						</div>
					</div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Điện thoại</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="DienThoai" name="DienThoai" value="<?php echo $hoso_info ? $hoso_info['DienThoai'] : ''; ?>" pattern="[0-9]{10,11}"/>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Email" name="Email" value="<?php echo $hoso_info ? $hoso_info['Email'] : ''; ?>" />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Hộ khẩu thường trú</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="HoKhau" name="HoKhau" value="<?php echo $hoso_info ? $hoso_info['HoKhau'] : ''; ?>" />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Nguyên quán</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="NguyenQuan" name="NguyenQuan" value="<?php echo $hoso_info ? $hoso_info['NguyenQuan'] : ''; ?>" />
                        </div>
                    </div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Ngày kết nạp đảng</label>
						<div class="col-sm-3">
							<input type="date" class="form-control" id="NgayKetNap" name="NgayKetNap" value="<?php echo $hoso_info ? $hoso_info['NgayKetNap'] : ''; ?>" required/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Ngày chính thức</label>
						<div class="col-sm-3">
							<input type="date" class="form-control" id="NgayChinhThuc" name="NgayChinhThuc" value="<?php echo $hoso_info ? $hoso_info['NgayChinhThuc'] : ''; ?>" />
						</div>
					</div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Số thẻ đảng viên</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="SoTheDang" name="SoTheDang" value="<?php echo $hoso_info ? $hoso_info['SoTheDang'] : ''; ?>" pattern="[0-9]{8}"/>
                        </div>
                    </div>					
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Ngày chuyển sinh hoạt</label>
						<div class="col-sm-3">
							<input type="date" class="form-control" id="NgayChuyenSH" name="NgayChuyenSH" value="<?php echo $hoso_info ? $hoso_info['NgayChuyenSH'] : ''; ?>" />
						</div>
					</div>					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Nơi chuyển đến</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="NoiChuyenSH" name="NoiChuyenSH" value="<?php echo $hoso_info ? $hoso_info['NoiChuyenSH'] : ''; ?>" />
                        </div>
                    </div>
					
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ảnh Đại Diện</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="img" name="img" accept="image/*"/><br>
                            <?php if ($hoso_info && is_file('public/upload/images/' . $hoso_info['Avatar'])) {
                                echo '<image src="public/upload/images/' . $hoso_info['Avatar'] . '?time=' . time() . '" style="max-width:50px;" />';
                            }?>
                        </div>
                    </div>
					
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-primary"><?php echo $hoso_info ? 'Cập nhật' : 'Thêm mới' ;?></button>
                            <a class="btn btn-warning" href="admin.php?controller=hosodang">Trở về</a>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php require('admin/views/shared/footer.php'); ?>

