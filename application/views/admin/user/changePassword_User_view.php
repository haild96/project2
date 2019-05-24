<?php include($_SERVER['DOCUMENT_ROOT'].'/project2/application/core/layout/nav.php'); ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center">Tài khoản người dùng
                    <small class="text-center">Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-8 col-lg-push-2" style="padding-bottom:120px">

                <?php if (isset($status)): ?>
                    <div class="alert <?php echo $status ? 'alert-success' : 'alert-danger'?>">
                      <?php echo $message ?> 
                    </div>
                    <?php $this->session->unset_userdata($status); ?>
                <?php endif ?>
                <?php if (isset($thongbao)): ?>
                    <div class="alert alert-danger">
                      <?php echo $thongbao ?> 
                    </div>
                    <?php $this->session->unset_userdata($status); ?>
                <?php endif ?>
 
                <form action="<?php echo base_url() ?>admin/User/updateNewPassword/<?php echo $user['id'] ?>" method="POST" enctype="multipart/form-data">  
                    <div class="form-group">
                        <label>Tên tài khoản</label>
                        <input style="pointer-events: none;" class="form-control" value="<?php echo $user['username'] ?>" name="username" placeholder="Nhập tên tài khoản" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu mới</label>
                        <input class="form-control" value="" name="password" placeholder="Nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Xác nhận mật khẩu</label>
                        <input class="form-control" value="" name="password_again" placeholder="Nhập mật khẩu" />
                    </div>
                    <div class="form-group hidden">
                        <label>Tên người dùng</label>
                        <input class="form-control" value="<?php echo $user['fullname'] ?>" name="fullname" placeholder="Nhập tên người dùng" />
                    </div>
                    <div class="form-group hidden">
                        <label>Email</label>
                        <input class="form-control" type="email" value="<?php echo $user['email'] ?>" name="email" placeholder="Nhập email" />
                    </div>
                    <div class="form-group hidden">
                        <label>Số điện thoại</label>
                        <input class="form-control" type="text" value="<?php echo $user['phone'] ?>" name="phone" placeholder="Nhập số điện thoại" />
                    </div>
                    <div class="form-group hidden">
                        <label>Địa chỉ</label>
                        <input class="form-control" type="text" value="<?php echo $user['address'] ?>" name="address" placeholder="Nhập địa chỉ" />
                    </div>

                    <div class="form-group hidden">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="status" value="1" 
                                <?php if($user['status']==1){ ?>
                                checked="" <?php } ?>
                                type="radio">Đang hoạt động
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="0" 
                                <?php if($user['status']==0){?> 
                                    checked="" <?php } ?>
                                type="radio">Tạm ngừng hoạt động                  
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <button type="submit" class="btn btn-primary btn-block">Lưu</button>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <button type="reset" class="btn btn-primary btn-block">Làm mới</button>
                        </div>
                    </div>
                    
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include($_SERVER['DOCUMENT_ROOT'].'/project2/application/core/layout/footer.php'); ?>