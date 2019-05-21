<?php include 'layout/nav.php'; ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quảng cáo
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    
                <table class="table table-striped table-bordered table-hover table-responsive">
                    <thead>
                        <tr align="center">
                            <th class="text-center">ID</th>
                            <th class="text-center">Tên</th>
                            <th class="text-center">Chi tiết</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center">Thời gian bắt đầu</th>
                            <th class="text-center">Thời gian kết thúc</th>
                            <th class="text-center">Thời gian tạo</th>
                            <th class="text-center">Sửa</th>
                            <th class="text-center">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($quangcao as $value): ?>                    
                            <tr class="odd gradeX" align="center">
                                <th class="text-center"><?php echo $value['id']; ?></th>
                                <th class="text-center"><?php echo $value['name']; ?></th>
                                <th style="max-width: 130px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis; class="text-center"><?php echo $value['detail']; ?></th>
                                <th style="max-width: 130px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis; class="text-center">
                                    <?php if($value['status'] == 0) echo "Không hiển thị"; ?>
                                    <?php if($value['status'] == 1) echo "Hiển thị"; ?>
                                </th>
                                <th style="max-width: 140px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis; class="text-center"><?php echo date('m/d/Y H:i:s A', $value['time_start']); ?></th>
                                <th style="max-width: 130px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis; class="text-center"><?php echo date('m/d/Y H:i:s A', $value['time_end']); ?></th>
                                <th style="max-width: 130px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis; class="text-center"><?php echo date('m/d/Y H:i:s A', $value['time_created']); ?></th>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="<?php echo base_url() ?>admin/Promotion/editByID/<?php echo $value['id'] ?>">Edit</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="<?php echo base_url() ?>admin/Promotion/delete/<?php echo $value['id'] ?>">Delete</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include 'layout/footer.php'; ?>

