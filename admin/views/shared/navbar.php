<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="admin.php">Sổ tay đảng viên</a>

    </div>
    <ul class="nav navbar-top-links navbar-right">        
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="admin.php?controller=taikhoan&action=info&username=<?php echo $user['Username'];?>"><i class="fa fa-user fa-fw"></i> Thông tin tài khoản</a></li>                
                <li class="divider"></li>
                <li> <a href="admin.php?controller=taikhoan&action=logout"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <form id="product_form" method="post" action="admin.php?controller=product" role="form">
						<div class="input-group custom-search-form">
							<input id="search" name="search" type="text" class="form-control" placeholder="Tìm kiếm sản phẩm"/>
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
                    </form>
                </li>

                <li>
                    <a href="admin.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
				
                <?php if (checkPermission($user, 'chibo')) : ?>
				<li>
                    <a href="admin.php?controller=chibo"><i class="fa fa-users fa-fw"></i> Chi bộ đảng</a>
                </li>
				<?php endif; ?>
				
				<?php if (checkPermission($user, 'taikhoan')) : ?>
				<li>
                    <a href="admin.php?controller=taikhoan"><i class="fa fa-user-md fa-fw"></i> Tài khoản</a>
                </li>
				<?php endif; ?>
				
				<?php if (checkPermission($user, 'hosodang')) : ?>
				<li>
					<a href="admin.php?controller=hosodang"><i class="fa fa-street-view fa-fw"></i> Hồ sơ đảng viên</a>
				</li>               
				<?php endif; ?>
				
				<?php if (checkPermission($user, 'xeploai')) : ?>
				<li>
					<a href="admin.php?controller=xeploai"><i class="fa fa-sort-amount-asc fa-fw"></i> Xếp loại đảng viên</a>
				</li>
				<?php endif; ?>
				
				<?php if (checkPermission($user, 'khenthuong')) : ?>
				<li>
					<a href="admin.php?controller=khenthuong"><i class="fa fa-gift fa-fw"></i> Khen thưởng đảng viên</a>
				</li>
				<?php endif; ?>
				
				<?php if (checkPermission($user, 'kyluat')) : ?>
				<li>
					<a href="admin.php?controller=kyluat"><i class="fa fa-gavel fa-fw"></i> Kỷ luật đảng viên</a>
				</li>
				<?php endif; ?>				
				
				
				<li>
					<a href="#"><i class="fa fa-file-text fa-fw"></i> Văn bản<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<?php if (checkPermission($user, 'vanbannhom')) : ?>
						<li>
							<a href="admin.php?controller=vanbannhom"><i class="fa fa-folder-open fa-fw"></i> Danh mục văn bản</a>
						</li>
						<?php endif; ?>
						
						<?php if (checkPermission($user, 'vanban')) : ?>
						<li>
							<a href="admin.php?controller=vanban"><i class="fa fa-list fa-fw"></i> Quản lý văn bản</a>
						</li>
						<?php endif; ?>						
					</ul>
				</li>				
				
				<?php if (checkPermission($user, 'thongbao')) : ?>
				<li>
					<a href="admin.php?controller=thongbao"><i class="fa fa-commenting fa-fw"></i> Thông báo</a>
				</li>
				<?php endif; ?>	
				
				<li>
                    <a href="index.php" target="_blank"><i class="fa fa-home fa-fw"></i> Trang chủ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>