<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">
		
	<div class="panel panel-default">
		<div class="panel-heading">
			<b><?php echo $title ?></b>
		</div>
		<div class="panel-body">
			<div class="dataTable_wrapper table-responsive">
				<form name="LISTFORM" method="POST" action="admin.php?controller=hosodang">
				<table class="table table-striped table-bordered table-hover" id="dataTables-user">
					<thead>
					<tr>
						<th>Chức năng</th>
						<th><input onClick="select_switch(this.checked);" type="Checkbox" name="checkall" class="" value="ON"/></th>
						<th>TT</th>
						<th>Tên chi bộ</th>
						<th>Họ và tên</th>
						
						<th>Avatar</th>
						<th>File hồ sơ</th>
						
						<th>Ngày kết nạp</th>
						<th>Ngày chính thức</th>
						<th>Số thẻ đảng</th>
						<th>Trạng thái</th>						
					</tr>
					</thead>
					<tbody>
					<?php 
					$stt = 1;
					foreach ($list_hoso as $row): ?>
						<tr class="odd gradeX">
							<td nowrap>
								<a href="admin.php?controller=taikhoan&action=add&hosoid=<?php echo $row['Id']; ?>"
								   class="text-warning" data-toggle="tooltip" title="Cấp tài khoản đăng nhập">
								   <i class="glyphicon glyphicon-cog fa-lg"></i>
								</a>
								<a href="admin.php?controller=hosodang&action=upload&id=<?php echo $row['Id']; ?>"
								   class="text-primary" data-toggle="tooltip" title="Tải lên hồ sơ đảng">
								   <i class="glyphicon glyphicon-cloud-upload fa-lg"></i>
								</a>
								
								<a href="admin.php?controller=hosodang&action=chuyenchinhthuc&id=<?php echo $row['Id']; ?>"
								   class="text-info" data-toggle="tooltip" title="Chuyển chính thức">
								   <i class="glyphicon glyphicon-ok-circle fa-lg"></i>
								</a>
								
								<a href="admin.php?controller=hosodang&action=move&id=<?php echo $row['Id']; ?>"
								   class="text-dark" data-toggle="tooltip" title="Chuyển sinh hoạt">
								   <i class="glyphicon glyphicon-log-out fa-lg"></i>
								</a>
								<a href="admin.php?controller=hosodang&action=edit&id=<?php echo $row['Id']; ?>"
								   class="text-success" data-toggle="tooltip" title="Sửa">
								   <i class="glyphicon glyphicon-edit fa-lg"></i>
								</a>								
								<a href="admin.php?controller=hosodang&action=delete&id=<?php echo $row['Id']; ?>"
								   class="text-danger deleteitem" data-toggle="tooltip" title="Xóa">
								   <i class="glyphicon glyphicon-remove fa-lg"></i>
								</a>
							</td>
							<td><input class="" type="checkbox" name="ids[<?php echo $row['Id']; ?>]" value="<?php echo $row['Id']; ?>" /></td>
							<td><?php echo $stt++; ?></td>
							<td><?php echo $row['TenChiBo'] ?></td>
							<td>
								<a href="admin.php?controller=hosodang&action=info&id=<?php echo $row['Id']; ?>" data-toggle="tooltip" title="Thông tin"><?php echo $row['HoTen']; ?></a>
							</td>
							
							<td>
								<?php if ($row['Avatar'] != '')
									echo '<image src="public/upload/images/' . $row['Avatar'] . '" style="max-width:50px;" />';
								?>
							</td>
							<td>
								<?php 
								foreach ($hoso_files as $row_file):
									if ($row_file['HoSoId'] == $row['Id']) echo '<a href="public/upload/files/'. $row_file['File'] .'" target="blank" data-toggle="tooltip" title="'. $row_file['File'] .'"><i class="glyphicon glyphicon-cloud-download fa-lg"></i></a>';
								endforeach;
								?>
							</td>
							
							<td nowrap><?php echo date('d/m/Y',strtotime($row['NgayKetNap'])) ?></td>
							<td nowrap><?php echo $row['NgayChinhThuc']!='0000-00-00' ? date('d/m/Y',strtotime($row['NgayChinhThuc'])) : '' ?></td>
							<td nowrap><?php echo $row['SoTheDang'] ?></td>
							<td>
								<?php if ($row['TrangThai']==0) echo 'Đang sinh hoạt'; else if ($row['TrangThai']==1) echo 'Chuyển sinh hoạt'; else if ($row['TrangThai']==2) echo 'Xóa tên'; else echo 'Đã mất'; ?>
							</td>							
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				</form>
			</div>
		</div>
		<div class="panel-footer">
			<table>
			  <tr>
				<td><a href="admin.php?controller=hosodang&action=edit" class="btn btn-primary "><i class="glyphicon glyphicon-plus"></i> Thêm mới</a></td>
				<td><button type="button" class="btn btn-danger deleteitem " onclick="updateForm('admin.php?controller=hosodang&action=deletemulti');"><i class="glyphicon glyphicon-remove fa-lg"></i> Xóa</button></td>
				<td>
					<div class="dropdown">
					  <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Trạng thái
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu">
						<li><a href="#" onclick="updateForm('admin.php?controller=hosodang&action=setTrangThai&status=0')">Đang sinh hoạt</a></li>
						<li><a href="#" onclick="updateForm('admin.php?controller=hosodang&action=setTrangThai&status=1')">Chuyển sinh hoạt</a></li>
						<li><a href="#" onclick="updateForm('admin.php?controller=hosodang&action=setTrangThai&status=2')">Xóa tên</a></li>
						<li><a href="#" onclick="updateForm('admin.php?controller=hosodang&action=setTrangThai&status=3')">Đã mất</a></li>
					  </ul>
					</div>
			    </td>
			  </tr>
			</table>			
		</div>
	</div>
	<script>
		$(document).ready(function () {
			$('#dataTables-user').DataTable({
				responsive: true,  "order":[[2, 'asc']]
			});
		});
	</script>
	<script>
		var	the_form = window.document.LISTFORM;
		function del_confirm() {			
			question = confirm('Bạn chắc chắn muốn xóa?');		
			if (question != '0'){return true;}
			return false;
		}
		function select_switch(status) {
			list_form = window.document.LISTFORM;
			for (i = 0; i < list_form.length; i++) {
				list_form.elements[i].checked = status;
			}
		}
		function updateForm(the_url){
			if (selected_item()){
				the_form.action = the_url;
				the_form.submit();
			}
		}			
		function selected_item(){
			var name_count = the_form.length;
			for (i=0;i<name_count;i++){
				if (the_form.elements[i].checked){
					return true;
				}
			}
			alert('Chưa có dòng nào được chọn.');
			return false;
		}

	</script>

</div>
<?php require('admin/views/shared/footer.php'); ?>