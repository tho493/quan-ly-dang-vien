<table id="user-form" class="form-horizontal">
	<div class="row">
		<div class="col-sm-12">
			<?php if ($user_info['Avatar']!='') echo '<image src="public/upload/images/' . $user_info['Avatar'] . '" style="max-width:200px; padding-bottom:20px;" />';?>
		</div>
	</div>
	<div class="row">
		<label class="col-sm-3 control-label" >Chi bộ</label>
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
			<?php echo $user_info ? date('d/m/Y',strtotime($user_info['NgaySinh'])) : ''; ?>
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
			<?php echo $user_info ? date('d/m/Y',strtotime($user_info['NgayKetNap'])) : ''; ?>
		</div>
	</div>
	
	<div class="row">
		<label class="col-sm-3 control-label">Ngày chính thức</label>
		<div class="col-sm-9">
			<?php echo (($user_info)&&($user_info['NgayChinhThuc']!='0000-00-00')) ? date('d/m/Y',strtotime($user_info['NgayChinhThuc'])) : ''; ?>
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
			<?php echo (($user_info)&&($user_info['NgayChuyenSH']!='0000-00-00')) ? date('d/m/Y',strtotime($user_info['NgayChuyenSH'])) : ''; ?>
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
			<?php if ($user_info['TrangThai']==0) echo 'Đang sinh hoạt'; else if ($user_info['TrangThai']==1) echo 'Chuyển sinh hoạt'; else if ($user_info['TrangThai']==2) echo 'Xóa tên'; else echo 'Đã mất'; ?>
		</div>
	</div>
	<div class="row">
		<label class="col-sm-3 control-label"></label>
		<div class="col-sm-9">
			<a class="btn btn-warning" href="admin.php?controller=hosodang">Trở về</a>
		</div>
	</div>
	
</table>
