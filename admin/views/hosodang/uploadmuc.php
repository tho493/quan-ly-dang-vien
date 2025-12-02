<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo $title ?>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8">
                    <form method="POST" enctype="multipart/form-data"
                        action="admin.php?controller=hosodang&action=uploadmuc">
                        <input type="hidden" name="HoSoId" value="<?php echo $hosoid; ?>">
                        <input type="hidden" name="MucId" value="<?php echo $mucid; ?>">

                        <div class="form-group">
                            <label>Đảng viên:</label>
                            <p class="form-control-static"><strong><?php echo $hosodang['HoTen']; ?></strong></p>
                        </div>

                        <div class="form-group">
                            <label>Mục hồ sơ:</label>
                            <p class="form-control-static"><strong><?php echo $muc['TenMuc']; ?></strong></p>
                        </div>

                        <div class="form-group">
                            <label for="Nam">Năm:</label>
                            <select name="Nam" id="Nam" class="form-control" required>
                                <option value="">-- Chọn năm --</option>
                                <?php foreach ($list_nam as $nam_item): ?>
                                    <option value="<?php echo $nam_item['Nam']; ?>" <?php echo ($nam_item['Nam'] == date('Y')) ? 'selected' : ''; ?>>
                                        <?php echo $nam_item['Nam']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="TenFile">Tên file (tùy chọn):</label>
                            <input type="text" name="TenFile" id="TenFile" class="form-control"
                                placeholder="Nhập tên file để dễ nhận biết">
                        </div>

                        <div class="form-group">
                            <label for="f">Chọn file:</label>
                            <input type="file" name="f" id="f" class="form-control" required>
                            <small class="text-muted">Hỗ trợ các định dạng: PDF, DOC, DOCX, JPG, PNG</small>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-upload"></i> Upload
                            </button>
                            <a href="admin.php?controller=hosodang&action=info&id=<?php echo $hosoid; ?>"
                                class="btn btn-default">
                                <i class="fa fa-arrow-left"></i> Trở về
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('admin/views/shared/footer.php'); ?>