<?php require('website/views/shared/header.php'); ?>

<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="row">
        <div class="col-md-12">
            <h2><i class="fa fa-user"></i> Hồ sơ đảng viên</h2>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Thông tin cá nhân</h4>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th width="30%">Họ và tên:</th>
                            <td><strong><?php echo $user_info['HoTen']; ?></strong></td>
                        </tr>
                        <tr>
                            <th>Chi bộ:</th>
                            <td><?php echo $user_info['TenChiBo']; ?></td>
                        </tr>
                        <tr>
                            <th>Giới tính:</th>
                            <td><?php echo $user_info['GioiTinh']; ?></td>
                        </tr>
                        <tr>
                            <th>Ngày sinh:</th>
                            <td><?php echo date('d/m/Y', strtotime($user_info['NgaySinh'])); ?></td>
                        </tr>
                        <tr>
                            <th>Ngày kết nạp:</th>
                            <td><?php echo $user_info['NgayKetNap'] ? date('d/m/Y', strtotime($user_info['NgayKetNap'])) : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Ngày chính thức:</th>
                            <td><?php echo ($user_info['NgayChinhThuc'] && $user_info['NgayChinhThuc'] != '0000-00-00') ? date('d/m/Y', strtotime($user_info['NgayChinhThuc'])) : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Số thẻ đảng:</th>
                            <td><?php echo $user_info['SoTheDang'] ? $user_info['SoTheDang'] : 'Chưa cấp'; ?></td>
                        </tr>
                        <tr>
                            <th>Trạng thái đảng:</th>
                            <td>
                                <?php
                                if ($user_info['TrangThaiDang'] == 'chinhthuc') {
                                    echo '<span class="label label-success">Chính thức</span>';
                                } else {
                                    echo '<span class="label label-info">Dự bị</span>';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <?php if ($user_info['Avatar']): ?>
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <img src="public/upload/images/<?php echo $user_info['Avatar']; ?>"
                            class="img-responsive img-thumbnail" style="max-width: 200px; margin: 0 auto;">
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Hồ sơ đảng viên -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-folder-open"></i> Hồ sơ đảng viên (7 mục)</h4>
                </div>
                <div class="panel-body">
                    <?php foreach ($list_muc_hoso as $muc): ?>
                        <?php
                        $muc_id = $muc['Id'];
                        $has_files = isset($files_by_muc[$muc_id]) && !empty($files_by_muc[$muc_id]);
                        $files = $has_files ? $files_by_muc[$muc_id] : array();
                        ?>
                        <div class="panel <?php echo $has_files ? 'panel-success' : 'panel-danger'; ?>"
                            style="margin-bottom: 15px;">
                            <div class="panel-heading">
                                <h5>
                                    <?php echo $muc['TenMuc']; ?>
                                    <?php if ($has_files): ?>
                                        <span class="badge pull-right"><?php echo count($files); ?> file</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger pull-right">THIẾU</span>
                                    <?php endif; ?>
                                </h5>
                            </div>
                            <div class="panel-body">
                                <?php if ($has_files): ?>
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Năm</th>
                                                <th>Tên file</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($files as $file): ?>
                                                <tr>
                                                    <td><?php echo $file['Nam'] ? $file['Nam'] : '-'; ?></td>
                                                    <td><?php echo $file['TenFile'] ? $file['TenFile'] : $file['File']; ?></td>
                                                    <td>
                                                        <a href="public/upload/files/<?php echo $file['File']; ?>" target="_blank"
                                                            class="btn btn-xs btn-info">
                                                            <i class="fa fa-download"></i> Tải
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <p class="text-danger"><strong>Chưa có file hồ sơ cho mục này</strong></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Hồ sơ theo năm -->
    <?php if (!empty($list_hoso_nam)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-calendar"></i> Hồ sơ theo năm</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Năm</th>
                                        <th>Phiếu bổ sung lý lịch</th>
                                        <th>Kiểm điểm cuối năm</th>
                                        <th>Xác nhận cư trú</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list_hoso_nam as $hoso_nam): ?>
                                        <tr>
                                            <td><strong><?php echo $hoso_nam['Nam']; ?></strong></td>
                                            <td>
                                                <?php if ($hoso_nam['PhieuBoSungLyLich']): ?>
                                                    <a href="public/upload/files/<?php echo $hoso_nam['PhieuBoSungLyLich']; ?>"
                                                        target="_blank" class="btn btn-xs btn-info">
                                                        <i class="fa fa-download"></i> Tải
                                                    </a>
                                                <?php else: ?>
                                                    <span class="text-muted">Chưa có</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($hoso_nam['KiemDiemCuoiNam']): ?>
                                                    <a href="public/upload/files/<?php echo $hoso_nam['KiemDiemCuoiNam']; ?>"
                                                        target="_blank" class="btn btn-xs btn-info">
                                                        <i class="fa fa-download"></i> Tải
                                                    </a>
                                                <?php else: ?>
                                                    <span class="text-muted">Chưa có</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($hoso_nam['XacNhanCuTru']): ?>
                                                    <a href="public/upload/files/<?php echo $hoso_nam['XacNhanCuTru']; ?>"
                                                        target="_blank" class="btn btn-xs btn-info">
                                                        <i class="fa fa-download"></i> Tải
                                                    </a>
                                                <?php else: ?>
                                                    <span class="text-muted">Chưa có</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php require('website/views/shared/footer.php'); ?>