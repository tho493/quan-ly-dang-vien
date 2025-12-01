<div class="featured">
    <div class="container-fluid">
        <div class="block-title">            
			<h5 class="block-title-name"><a href="#">Văn bản</a></h5>
			<div class="clearfix"></div>
        </div>
        <div class="feature-grid">
            <?php if (empty($vanban)) : ?>
                <h3 class="col-sm-12">Không có thông tin.</h3>
			<?php else: ?>
			<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
				  <tr>
					<th style="width:1%">TT</th>
					<th>Tên văn bản</th>
					<th>Nhóm văn bản</th>
					<th>Đính kèm</th>
					<th>Ngày tạo</th>
				  </tr>
				</thead>
				<tbody>
				<?php $stt=1; foreach ($vanban as $row): ?>
				  <tr>
					<td nowrap><?php echo $stt++ ?></td>
					<td nowrap><?php echo '<a href="/vanban/detail/'.$row['Id'].'">'.$row['TenVB'].'</a>'; ?></td>
					<td nowrap><?php echo $row['TenNhom'] ?></td>					
					<td>
						<?php
						foreach ($vanban_files as $f) {
							if ($f['VanBanId'] == $row['Id']) echo '<a href="'.PATH_URL_DOCUMENT.$f['File'].'" target="blank" data-toggle="tooltip" title="'. $f['File'] .'"><i class="glyphicon glyphicon-cloud-download fa-lg"></i></a>';
						}
						?>
					</td>
					<td nowrap><?php echo date('d/m/Y', strtotime($row['NgayTao'])); ?></td>					
				  </tr>
				<?php endforeach; ?> 
				</tbody>
			</table>
			</div>
            <?php endif; ?>			                
        </div>
    </div>
</div>