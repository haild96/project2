<?php include 'layout/nav.php'; ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quảng cáo
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

                <form action="<?php echo base_url() ?>admin/Banner/add" method="POST" enctype="multipart/form-data">  
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" value="" name="name" placeholder="Nhập tên" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea id="demo" name="content" class="form-control ckeditor" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Đường dẫn</label>
                        <input class="form-control" value="" name="link" placeholder="Nhập đường dẫn" />
                    </div>
                    <div class="form-group">
                        <label>Kiểu quảng cáo</label>
                        <label class="radio-inline">
                            <input name="type" value="0" checked="" type="radio">Slide
                        </label>
                        <label class="radio-inline">
                            <input name="type" value="1" type="radio">Banner
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="status" value="0" checked="" type="radio">Không hiển thị
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="1" type="radio">Hiển thị
                        </label>
                    </div>
                    
                    <!-- Form chọn thời gian -->
                    <!-- <div class="form-group">
                        <label class="control-label">Thời gian bắt đầu</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' name="time_start" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <script>
                      $(function () {
                        $('#datetimepicker1').datetimepicker();
                     });
                    </script> -->
                    <!-- end Form chọn thời gian -->

                    <!-- <div class="form-group">
                        <label class="control-label">Thời gian kết thúc</label>
                        <div class='input-group date' id='datetimepicker2'>
                            <input type='text' name="time_end" class="form-control" />
                            <span class="input-group-addon" style="cursor: pointer;">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>       
                    <script type="text/javascript">
                         $(document).ready(function(){
                            $("#datetimepicker2").datetimepicker({                        
                            });
                         });
                    </script> -->

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