<?php require('admin/views/shared/header.php'); ?>
    <div id="page-wrapper">
        
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <b><?php echo $title ?></b>
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="datatable">
                        <thead>
							<tr>
								<th></th>
								<th>Id</th>
								<th>Tên nhóm</th>
								<th>Mô tả</th>								
							</tr>
                        </thead>
                        <tbody>
                        <?php foreach ($vanbannhom as $row): ?>
                            <tr class="odd gradeX">
                                <td>
                                    <a href="admin.php?controller=vanbannhom&action=edit&id=<?php echo $row['Id']; ?>" data-toggle="tooltip" title="Sửa"
                                       class="text-success"><i class="glyphicon glyphicon-edit fa-lg"></i></a>
                                    <a href="admin.php?controller=vanbannhom&action=delete&id=<?php echo $row['Id']; ?>" data-toggle="tooltip" title="Xóa"
                                       class="text-danger deleteitem"><i class="glyphicon glyphicon-remove fa-lg"></i></a>
                                </td>
								<td><?php echo $row['Id'] ?></td>
								<td><?php echo $row['TenNhom'] ?></td>
                                <td><?php echo $row['MoTa'] ?></td>	                                
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
			<div class="panel-footer">
                <a href="admin.php?controller=vanbannhom&action=edit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
            </div>			
        </div>
    </div>

<?php require('admin/views/shared/footer.php'); ?>