<?php include($_SERVER['DOCUMENT_ROOT'].'/project2/application/core/layout/nav.php'); ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    
                <table class="table table-striped table-bordered table-hover table-responsive">
                    <thead>
                        <tr align="center">
                            <th class="text-center">ID</th>
                            <th class="text-center">Tiêu đề</th>
                            <th class="text-center">Tóm tắt</th>
                            <th class="text-center">Hình ảnh</th>
                            <th class="text-center">Nội dung</th>
                            <th class="text-center">Thời gian tạo</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center">Sửa</th>
                            <th class="text-center">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tintuc as $value): ?>                    
                            <tr class="odd gradeX" align="center">
                                <th class="text-center"><?php echo $value['id']; ?></th>
                                <th class="text-center"><?php echo $value['title']; ?></th>
                                <th class="text-center"><?php echo $value['summary']; ?></th>
                                <th class="text-center"><img src="<?php echo base_url() ?><?php echo $value['image'] ?>" width="130px" alt=""></th>
                                <th style="max-width: 130px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"class="text-center"><?php echo $value['content']; ?></th>
                                <th style="max-width: 130px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" class="text-center"><?php echo date('m/d/Y H:i:s', $value['time_created']); ?></th>
                                <th style="max-width: 130px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" class="text-center">
                                    <?php if($value['status'] == 0) echo "Không hiển thị"; ?>
                                    <?php if($value['status'] == 1) echo "Hiển thị"; ?>
                                </th>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="<?php echo base_url() ?>admin/PromotionNews/editByID/<?php echo $value['id'] ?>">Edit</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="<?php echo base_url() ?>admin/PromotionNews/delete/<?php echo $value['id'] ?>">Delete</a></td>
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
<?php include($_SERVER['DOCUMENT_ROOT'].'/project2/application/core/layout/footer.php'); ?>

