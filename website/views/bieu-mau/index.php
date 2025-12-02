<?php require('website/views/shared/header.php'); ?>

<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="row">
        <div class="col-md-12">
            <h2><i class="fa fa-file-text"></i> Biểu mẫu</h2>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php if (empty($vanban)): ?>
                <div class="alert alert-info">
                    <p>Chưa có biểu mẫu nào.</p>
                </div>
            <?php else: ?>
                <div class="list-group">
                    <?php foreach ($vanban as $vb): ?>
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">
                                <?php echo $vb['TenVB']; ?>
                                <small class="text-muted"><?php echo date('d/m/Y', strtotime($vb['NgayTao'])); ?></small>
                            </h4>
                            <div class="list-group-item-text">
                                <?php if (isset($files_by_vanban[$vb['Id']])): ?>
                                    <?php foreach ($files_by_vanban[$vb['Id']] as $file): ?>
                                        <a href="public/upload/files/<?php echo $file['File']; ?>" target="_blank"
                                            class="btn btn-sm btn-primary" style="margin: 5px;">
                                            <i class="fa fa-download"></i> Tải file
                                        </a>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <span class="text-muted">Chưa có file đính kèm</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require('website/views/shared/footer.php'); ?>