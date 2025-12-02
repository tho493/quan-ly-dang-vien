<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">

    <div class="panel panel-default">
        <div class="panel-heading">
            <b><?php echo $title ?></b>
        </div>
        <div class="panel-body">
            <?php if (empty($list_nhacviec)): ?>
                <div class="alert alert-info">
                    <p>Không có thông báo nhắc việc nào.</p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>TT</th>
                                <th>Loại nhắc</th>
                                <th>Đảng viên</th>
                                <th>Nội dung</th>
                                <th>Ngày nhắc</th>
                                <th>Ngày hết hạn</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1;
                            foreach ($list_nhacviec as $nhac): ?>
                                <?php $dv = get_dangvien_for_nhac($nhac['HoSoId']); ?>
                                <tr class="<?php echo (strtotime($nhac['NgayHetHan']) < time()) ? 'danger' : ''; ?>">
                                    <td><?php echo $stt++; ?></td>
                                    <td>
                                        <?php
                                        switch ($nhac['LoaiNhac']) {
                                            case 'chuyensinhhoat':
                                                echo '<span class="label label-warning">Chuyển sinh hoạt</span>';
                                                break;
                                            case 'chuyenchinhthuc':
                                                echo '<span class="label label-info">Chuyển chính thức</span>';
                                                break;
                                            case 'ra truong':
                                                echo '<span class="label label-primary">Ra trường</span>';
                                                break;
                                            default:
                                                echo $nhac['LoaiNhac'];
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($dv): ?>
                                            <strong><?php echo $dv['HoTen']; ?></strong>
                                        <?php else: ?>
                                            <span class="text-muted">Tất cả</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $nhac['NoiDung']; ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($nhac['NgayNhac'])); ?></td>
                                    <td>
                                        <?php
                                        if ($nhac['NgayHetHan']) {
                                            echo date('d/m/Y', strtotime($nhac['NgayHetHan']));
                                            if (strtotime($nhac['NgayHetHan']) < time()) {
                                                echo ' <span class="label label-danger">Quá hạn</span>';
                                            }
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="admin.php?controller=thongbao&action=danhdaunhac&id=<?php echo $nhac['Id']; ?>"
                                            class="btn btn-sm btn-success" onclick="return confirm('Đánh dấu đã xử lý?');">
                                            <i class="fa fa-check"></i> Đã xử lý
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require('admin/views/shared/footer.php'); ?>