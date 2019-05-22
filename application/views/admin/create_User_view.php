<?php include 'layout/nav.php'; ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người dùng hệ thống
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

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

                <form action="<?php echo base_url() ?>admin/User/add" method="POST" enctype="multipart/form-data">  
                    <div class="form-group">
                        <label>Tên tài khoản</label>
                        <input class="form-control" value="" name="username" placeholder="Nhập tên tài khoản" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input class="form-control" type="password" value="" name="password" placeholder="Nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Xác nhận mật khẩu</label>
                        <input class="form-control" type="password" value="" name="password_again" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Tên người dùng</label>
                        <input class="form-control" value="" name="fullname" placeholder="Nhập tên người dùng" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" value="" name="email" placeholder="Nhập email" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" type="text" value="" name="phone" placeholder="Nhập số điện thoại" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" type="text" value="" name="address" placeholder="Nhập địa chỉ" />
                    </div>
                    <div class="form-group">
                        <label>Quyền</label>
                        <label class="radio-inline">
                            <input name="level" value="0" checked="" type="radio">Khách hàng
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="1" type="radio">Nhân viên
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="2" type="radio">Quản trị
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="status" value="0" checked="" type="radio">Đang hoạt động
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="1" type="radio">Tạm ngừng hoạt động
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-default">Tạo tài khoản</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include 'layout/footer.php'; ?>