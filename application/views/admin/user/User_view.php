<?php include 'layout/nav.php'; ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người dùng hệ thống
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    
                <table class="table table-striped table-bordered table-hover table-responsive">
                    <thead>
                        <tr align="center">
                            <th class="text-center">ID</th>
                            <th class="text-center">Tên tài khoản</th>
                            <th class="text-center">Mật khẩu</th>
                            <th class="text-center">Tên người dùng</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Điện thoại</th>
                            <th class="text-center">Địa chỉ</th>
                            <th class="text-center">Quyền</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center">Thời gian tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $value): ?>                    
                            <tr class="odd gradeX" align="center">
                                <th class="text-center"><?php echo $value['id']; ?></th>
                                <th class="text-center"><?php echo $value['username']; ?></th>
                                <th class="text-center"><?php echo $value['password']; ?></th>
                                <th class="text-center"><?php echo $value['fullname']; ?></th>
                                <th style="max-width: 130px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis; class="text-center"><?php echo $value['email']; ?></th>
                                <th class="text-center"><?php echo $value['address']; ?>
                                <th style="max-width: 130px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis; class="text-center">
                                    <?php if($value['level'] == 0) echo "Khách hàng"; ?>
                                    <?php if($value['level'] == 1) echo "Nhân viên"; ?>
                                </th>
                                <th style="max-width: 130px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis; class="text-center">
                                    <?php if($value['status'] == 0) echo "Đang hoạt động"; ?>
                                    <?php if($value['status'] == 1) echo "Tạm ngừng hoạt động"; ?>
                                </th>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="<?php echo base_url() ?>admin/User/editByID/<?php echo $value['id'] ?>">Edit</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="<?php echo base_url() ?>admin/User/delete/<?php echo $value['id'] ?>">Delete</a></td>
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

