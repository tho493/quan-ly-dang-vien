<?php require('website/views/shared/header.php'); ?>

<div class="featured">
    <div class="container-fluid">
        <div class="block-title">            
			<h5 class="block-title-name"><a href="#"><?php echo $title ?></a></h5>
			<div class="clearfix"></div>
        </div>
        <div class="feature-grid">
            <?php if (empty($vanban)) : ?>
                <h3>Không có thông tin.</h3>
			<?php else: ?>
				<p>Tiêu đề: <b><?php echo $vanban['TenVB'] ?></b></p>
				<p>Danh mục: <?php echo $vanban['TenNhom'] ?></p>
				<p>Đính kèm:
					<?php foreach ($vanban_files as $f){
						echo '<a href="'.PATH_URL_DOCUMENT.$f['File'].'" target="blank">'.$f['File'].'</a>';
					}
					?>
				</p>
				<p>Ngày tạo: <?php echo date('d/m/Y', strtotime($vanban['NgayTao'])) ?></p>
            <?php endif; ?>			                
        </div>
    </div>
</div>

<?php require('website/views/shared/footer.php'); ?>