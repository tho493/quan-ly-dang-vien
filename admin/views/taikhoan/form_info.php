<div class="panel-heading">
	<i class="glyphicon glyphicon-th-list"></i> <b><?php echo $title ?></b>
</div>
<div class="panel-body">
    <table id="user-form" class="form-horizontal">
        <div class="row">
            <label class="col-sm-3 control-label" >Chi bộ</label>
            <div class="col-sm-9">
                <?php echo $user_info ? $user_info['TenChiBo'] : ''; ?>
            </div>
        </div>
		
		<div class="row">
            <label class="col-sm-3 control-label" >Username</label>
            <div class="col-sm-9">
                <?php echo $user_info ? $user_info['Username'] : ''; ?>
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
                <?php echo $user_info ? $user_info['NgaySinh'] : ''; ?>
            </div>
        </div>
		<div class="row">
            <label class="col-sm-3 control-label">Ảnh Đại Diện</label>
            <div class="col-sm-9">
                <?php  echo '<image src="public/upload/images/' . $user_info['Avatar'] . '" style="max-width:50px;" />';?>
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
                <?php echo $user_info ? $user_info['NgayKetNap'] : ''; ?>
            </div>
        </div>
		
		<div class="row">
            <label class="col-sm-3 control-label">Ngày chính thức</label>
            <div class="col-sm-9">
                <?php echo $user_info ? $user_info['NgayChinhThuc'] : ''; ?>
            </div>
        </div>
		
		<div class="row">
            <label class="col-sm-3 control-label">Số thẻ đảng</label>
            <div class="col-sm-9">
                <?php echo $user_info ? $user_info['SoTheDang'] : ''; ?>
            </div>
        </div>
		
        <div class="row">
            <div class="col-sm-offset-3 col-sm-9">
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Đổi mật khẩu
                </button>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
						<form name="change_pass" id="change_pass" class="form-horizontal" method="POST" 
							action="admin.php?controller=taikhoan&action=changepassword">
							<div class="modal-content">                            
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">Đổi mật khẩu</h4>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label class="col-sm-5 control-label" >Mật khẩu mới</label>
										<div class="col-sm-7">
											<input name="txtNewPassword" id="txtNewPassword" type="text" value="" class="form-control"  placeholder="Mật khẩu mới" required="required"/>
										</div>
									</div><br>
									<div class="form-group">
										<label class="col-sm-5 control-label" >Nhập lại mật khẩu mới</label>
										<div class="col-sm-7">
											<input name="txtConfirmPassword" id="txtConfirmPassword" type="text" value="" class="form-control"  placeholder="Nhập lại mật khẩu mới" required="required"/>
										</div>                                        
									</div>
									<br><br>
									<div class="text-center">                                        
										<div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
									</div>									
								</div>
								<div class="modal-footer">
									<input type="hidden" name="username" id="username" value="<?php echo $user_info ? $user_info['Username'] : ''; ?>"/> 
									<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
									<input type="submit" class="btn btn-primary" value="Chấp nhận" id="submit">
								</div>
							</div>
						</form>
                    </div>
                </div>
                <a class="btn btn-warning" href="admin.php?controller=home">Trở về</a>
            </div>
        </div>
    </table>
</div>
<style type="text/css">
    .well { background: #fff; text-align: center; }
    .modal { text-align: left; }
</style>
<script>
    $(document).ready(function () {
        $("input#submit").click(function(){
            if ($("#txtNewPassword").val()=="") return false;
            var confirm = $("#txtConfirmPassword").val();
            if (confirm != "") {
                $.ajax({
                    type: "POST",
                    url: "admin/controllers/taikhoan/changepassword.php",
                    data: $('form.change_pass').serialize(),
                    success: function (msg) {
                        $("#thanks").html(msg);
                        $("#myModal").modal('hide');
                    },
                    error: function () {
                        alert("Có lỗi xảy ra!");
                    }
                });
            } else {
                alert('Bạn chưa xác nhận mật khẩu mới.');
                $("#txtConfirmPassword").focus();
            };
        });
    });
</script>
<script>
    $(function() {
        $("#txtConfirmPassword").keyup(function() {
            var password = $("#txtNewPassword").val();
            $("#divCheckPasswordMatch").html(password == $(this).val() ? "Mật khẩu mới hợp lệ" : "Mật khẩu xác nhận không trùng khớp");
        });
    });
</script>
<div id="thanks"><p><a data-toggle="modal" href="#myModal" ></a></p></div>