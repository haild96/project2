<?php include 'layout/nav.php'; ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin công ty
                    <small>Thông tin cơ bản</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover table-responsive">
                <thead>
                    <tr align="center">
                        <th class="text-center">ID</th>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Địa chỉ</th>
                        <th class="text-center">Số điện thoại</th>
                        <th class="text-center">Logo</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Link Facebook</th>
                        <th class="text-center">Link Youtube</th>
                        <th class="text-center">Link Instagram</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dulieu as $value): ?>                    
                        <tr class="odd gradeX" align="center">
                            <th class="text-center"><?php echo $value['id']; ?></th>
                            <th class="text-center"><?php echo $value['name']; ?></th>
                            <th class="text-center"><?php echo $value['address']; ?></th>
                            <th style="max-width: 130px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis; class="text-center"><?php echo $value['phone']; ?></th>
                            <th class="text-center"><img src="<?php echo base_url() ?><?php echo $value['logo'] ?>" width="130px" alt=""></th>
                            <th style="max-width: 130px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis; class="text-center"><?php echo $value['email']; ?></th>
                            <th style="max-width: 130px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis; class="text-center"><?php echo $value['link_fb']; ?></th>
                            <th style="max-width: 130px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis; class="text-center"><?php echo $value['link_youtube']; ?></th>
                            <th style="max-width: 130px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis; class="text-center"><?php echo $value['link_instagram']; ?></th>   
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="<?php echo base_url() ?>admin/InforCompany/edit">Edit</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include 'layout/footer.php'; ?>

