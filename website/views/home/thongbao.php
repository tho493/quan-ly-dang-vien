<div class="featured">
    <div class="container-fluid">
        <div class="block-title">            
			<h5 class="block-title-name"><a href="#">Thông báo</a></h5>
			<div class="clearfix"></div>
        </div>
        <div class="feature-grid">
            <?php if (empty($thongbao)) : ?>
                <h3 class="col-sm-12">Không có thông tin.</h3>
			<?php else: ?>
				<?php 
				$stt=1; 
				foreach ($thongbao as $row) {
					echo $stt++ .'. '.$row['ThongBao'] .' ';
					foreach ($thongbao_files as $f) {
						if ($f['ThongBaoId'] == $row['Id']) echo '<a href="public/upload/thongbao/'.$f['File'].'" target="blank"><i class="glyphicon glyphicon-cloud-download fa-lg"></i></a>';
					}
					echo '<br>';
				}
				?>
            <?php endif; ?>			                
        </div>
    </div>
</div>