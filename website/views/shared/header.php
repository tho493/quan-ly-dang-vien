<!DOCTYPE html>
<html>
<head>
    <base href="<?php echo BASEURL ?>">
    <meta charset="UTF-8">
    <title><?php echo isset($title) ? $title : 'Hệ thống sổ tay đảng viên'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Công ty LS Vina">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Công ty LS Vina"/>
    <link href="admin/themes/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="public/content/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <link href="public/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="public/css/header.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="public/css/livechat.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="application/x-javascript"> 
		addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } 
	</script>
	<link href="public/css/responsivemenu.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>
<div class="header-top">
    <div class="header-bottom">
		<div class="container-fluid header_top-sec">
			<div class="top_left logo">
				<a href="#"><img src="<?= PATH_URL?>/public/images/logo.png"></a>
			</div>
			<div class="top_left logo">
				<a href="index.php"><h1><b>Sổ tay đảng viên</b></h1></a>
			</div>
			<div class="top_right">
				<form style="margin-bottom:0em; padding-top: 25px;" action="/search/" method="get"
					  onsubmit="return false;">
					<input type=search name='q' id='q' value="Nhập từ khóa..." onfocus="this.value = '';"
						   onblur="if (this.value == '') {this.value = 'Nhập từ khóa...';}">
					<input type="submit" value="Tìm kiếm"
						   onclick="window.location.href=this.form.action + this.form.q.value;" class="input-search"/>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
    </div>
</div>

<div class="topmenu">
	<nav>
	  <div class="wrapper">
		<div class="logo"><a href="#"></a></div>
		<input type="radio" name="slider" id="menu-btn">
		<input type="radio" name="slider" id="close-btn">
		<ul class="nav-links">
		  <label for="close-btn" class="btn close-btn"><i class="fa fa-times"></i></label>
		  <li><a href="index.php">Trang chủ</a></li>
		  <li><a href="/gioithieu/">Giới thiệu</a></li>
		  <li>
			<a href="#" class="desktop-item">Văn bản</a>
			<input type="checkbox" id="showDrop">
			<label for="showDrop" class="mobile-item">Văn bản</label>
			<ul class="drop-menu">
			  <?php foreach ($vanbannhom as $vbgroup){
				echo '<li><a href="/vanban/'. $vbgroup['Id'] .'">'. $vbgroup['TenNhom'] .'</a></li>';
			  }?>
			</ul>
		  </li>
		  
		  <?php if(isset($_SESSION['user']) && ($_SESSION['user']['Permission']!='')) {echo '<li><a href="admin.php">Quản trị</a></li>';} ?>
				
		  <?php if(isset($_SESSION['user'])) {
			echo '<li><a href="admin.php?controller=taikhoan&action=logout">Đăng xuất</a></li>';
		  } else {
			echo '<li><a href="admin.php">Đăng nhập</a></li>'; 
		  }
		  ?>
		</ul>
		<label for="menu-btn" class="btn menu-btn"><i class="fa fa-bars"></i></label>
	  </div>
	</nav>	
</div>