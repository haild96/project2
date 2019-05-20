<?php include 'layout/nav.php'; ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <?php if(isset($success)){ ?>
                    <div class="alert alert-success">Thêm tin tức thành công</div>
                    <?php session_destroy(); ?>
                <?php } else {}  ?>
        
                <?php if(isset($fail)){ ?>
                    <div class="alert alert-danger">Thêm tin tức thất bại</div>
                    <?php session_destroy(); ?>
                <?php } else {} ?>

                <form action="<?php echo base_url() ?>admin/PromotionNews/add" method="POST" enctype="multipart/form-data">  
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" value="<?php echo $tintuc['title'] ?>" name="title" placeholder="Nhập tiêu đề" />
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <textarea id="demo" name="summary" class="form-control ckeditor" rows="3"><?php echo $tintuc['summary'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea id="demo" name="content" class="form-control ckeditor" rows="5"><?php echo $tintuc['content'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="hidden" value="<?php echo $tintuc['image'] ?>" name="image2" >
                        <p><img src="<?php echo base_url() ?>uploads/ImagePromotionNews/<?php echo $tintuc['image'] ?>" alt=""></p>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="status" value="0" 
                                <?php if($tintuc['status']==1){?> 
                                    check="" <?php } ?>
                                type="radio">Không hiển thị
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="0" 
                                <?php if($tintuc['status']==1){?> 
                                    check="" <?php } ?>
                                type="radio">Hiển thị                        
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
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