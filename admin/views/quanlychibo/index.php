<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">

    <div class="panel panel-default">
        <div class="panel-heading">
            <b><?php echo $title ?></b>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- Tổng quan thống kê đảng bộ -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4><i class="fa fa-bar-chart"></i> Tổng quan đảng bộ</h4>
                        </div>
                        <div class="panel-body">
                            <?php
                            $tong_so_dangvien = count($list_dangvien);
                            $tong_chinh_thuc = 0;
                            $tong_du_bi = 0;
                            foreach ($thongke_chibo as $tk) {
                                $tong_chinh_thuc += $tk['ChinhThuc'];
                                $tong_du_bi += $tk['DuBi'];
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="well text-center">
                                        <h3><?php echo $tong_so_dangvien; ?></h3>
                                        <p>Tổng số đảng viên</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="well text-center">
                                        <h3><?php echo $tong_chinh_thuc; ?></h3>
                                        <p>Chính thức</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="well text-center">
                                        <h3><?php echo $tong_du_bi; ?></h3>
                                        <p>Dự bị</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="well text-center">
                                        <h3><?php echo count($list_chibo); ?></h3>
                                        <p>Chi bộ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Danh sách chi bộ -->
            <div class="row">
                <?php foreach ($list_chibo as $chibo): ?>
                    <?php
                    $chibo_id = $chibo['Id'];
                    $dangvien_chibo = array_filter($list_dangvien, function ($dv) use ($chibo_id) {
                        return $dv['ChiBoId'] == $chibo_id;
                    });
                    $tk = isset($thongke_chibo[$chibo_id]) ? $thongke_chibo[$chibo_id] : array('TongSo' => 0, 'ChinhThuc' => 0, 'DuBi' => 0, 'GV' => 0, 'VienChuc' => 0, 'SV' => 0);
                    ?>
                    <div class="col-md-6" style="margin-bottom: 20px;">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>
                                    <i class="fa fa-users"></i> <?php echo $chibo['TenChiBo']; ?>
                                    <span class="badge pull-right"><?php echo $tk['TongSo']; ?> đảng viên</span>
                                </h4>
                            </div>
                            <div class="panel-body">
                                <!-- Thống kê chi bộ -->
                                <div class="row" style="margin-bottom: 15px;">
                                    <div class="col-md-6">
                                        <small><strong>Chính thức:</strong> <?php echo $tk['ChinhThuc']; ?></small><br>
                                        <small><strong>Dự bị:</strong> <?php echo $tk['DuBi']; ?></small>
                                    </div>
                                    <div class="col-md-6">
                                        <small><strong>GV:</strong> <?php echo $tk['GV']; ?> |
                                            <strong>VC:</strong> <?php echo $tk['VienChuc']; ?> |
                                            <strong>SV:</strong> <?php echo $tk['SV']; ?></small>
                                    </div>
                                </div>

                                <!-- Danh sách đảng viên -->
                                <div class="list-group">
                                    <?php if (empty($dangvien_chibo)): ?>
                                        <div class="list-group-item">
                                            <em>Chưa có đảng viên</em>
                                        </div>
                                    <?php else: ?>
                                        <?php foreach ($dangvien_chibo as $dv): ?>
                                            <?php
                                            // Kiểm tra hồ sơ thiếu
                                            $thieu_hoso = array();
                                            foreach ($list_muc_hoso as $muc) {
                                                $muc_id = $muc['Id'];
                                                if (!isset($files_by_hoso[$dv['Id']][$muc_id]) || empty($files_by_hoso[$dv['Id']][$muc_id])) {
                                                    $thieu_hoso[] = $muc['TenMuc'];
                                                }
                                            }
                                            $so_muc_thieu = count($thieu_hoso);
                                            ?>
                                            <a href="admin.php?controller=hosodang&action=info&id=<?php echo $dv['Id']; ?>"
                                                class="list-group-item <?php echo $so_muc_thieu > 0 ? 'list-group-item-warning' : ''; ?>">
                                                <h5 class="list-group-item-heading">
                                                    <?php echo $dv['HoTen']; ?>
                                                    <?php if ($so_muc_thieu > 0): ?>
                                                        <span class="badge badge-danger pull-right">Thiếu <?php echo $so_muc_thieu; ?>
                                                            mục</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-success pull-right">Đủ hồ sơ</span>
                                                    <?php endif; ?>
                                                </h5>
                                                <p class="list-group-item-text">
                                                    <small>
                                                        <?php if ($dv['TrangThaiDang'] == 'chinhthuc'): ?>
                                                            <span class="label label-success">Chính thức</span>
                                                        <?php else: ?>
                                                            <span class="label label-info">Dự bị</span>
                                                        <?php endif; ?>
                                                        <?php if ($dv['LoaiDangVien']): ?>
                                                            <span class="label label-default"><?php echo $dv['LoaiDangVien']; ?></span>
                                                        <?php endif; ?>
                                                        <?php if ($dv['SoTheDang']): ?>
                                                            <span class="label label-primary">Thẻ:
                                                                <?php echo $dv['SoTheDang']; ?></span>
                                                        <?php else: ?>
                                                            <span class="label label-warning">Chưa cấp thẻ</span>
                                                        <?php endif; ?>
                                                    </small>
                                                    <?php if ($so_muc_thieu > 0): ?>
                                                        <br><small class="text-danger"><strong>Thiếu:</strong>
                                                            <?php echo implode(', ', $thieu_hoso); ?></small>
                                                    <?php endif; ?>
                                                </p>
                                            </a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php require('admin/views/shared/footer.php'); ?>