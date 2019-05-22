<?php include($_SERVER['DOCUMENT_ROOT'].'/project2/application/core/layout/nav.php'); ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                 <h1 class="page-header">Bình luận
                    <small>Danh sách</small>
                </h1>
                <?php if (isset($status)): ?>

                <div class="alert <?php echo $status ? 'alert-success' : 'alert-danger'?>">
                    <?php echo $message ?> 
                </div>
           
                <?php endif ?>
            </div>
            <!-- /.col-lg-12 -->
        
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Tài khoản</th>
                        <th class="text-center">Họ tên</th>
                        <th class="text-center">Nội dung bình luận</th>
                        <th class="text-center">Sản phẩm</th>
                        <th class="text-center">Thời gian</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Sửa</th>
                        <th class="text-center">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($lisCmt as $key => $value):?>
                    
                    <tr class="odd gradeX" align="center">
                        <td><?php echo $i ?></td>
                        <td><?php echo $value['fullname'] ?></td>
                        <td>
                            <img class="responsive-image" width="50px" src="<?php echo base_url().'uploads/product/'.$value['image'] ?>" alt="Error">
                        </td>
                        <td>
                            <?php foreach ($category as $key => $cate): ?>
                                <?php echo $value['id_category']==$cate['id'] ? $cate['name'] : '' ?>
                            <?php endforeach ?>
                        </td>
                        <td><?php echo $value['quantity'] ?></td>
                        <td>
                            <?php if ($value['status'] == 1) {
                            echo "Hiển thị";
                            } else if ($value['status'] == 2) {
                                echo 'Không hiển thị';
                            } else {
                                echo "New";
                            }?>
                            </td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="<?php echo base_url()?>admin/Product/add/<?php echo $value['id'] ?>">Edit</a></td>
                        
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="<?php echo base_url()?>admin/Product/delete/<?php echo $value['id'] ?>">Delete</a></td>
                    </tr>
                    <?php $i= $i+1 ?>

                    <?php endforeach ?>
                    
                </tbody>
            </table>
            <?php if ($pagination == true) {
              echo $this->pagination->create_links();
            } ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/project2/application/core/layout/footer.php'); ?>
