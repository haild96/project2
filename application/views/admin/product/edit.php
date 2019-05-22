<?php include($_SERVER['DOCUMENT_ROOT'].'/project2/application/core/layout/nav.php'); ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Sửa thông tin sản phẩm</h3>
                <?php if (isset($status)): ?>

                <div class="alert <?php echo $status ? 'alert-success' : 'alert-danger'?>">
                  <?php echo $message ?> 
                </div>
           
                <?php endif ?>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <form action="<?php echo base_url()?>admin/Product/update/<?php echo $product['id'] ?>" method="POST" role="form" validate enctype="multipart/form-data">
                <label>Tên sản phẩm</label>
                <div class="form-group">
                    <input type="text" class="form-control"  name="name" placeholder="Tên sản phẩm" required value="<?php echo $product['name'] ?>">
                </div>

                <label>Danh mục</label>
                <div class="form-group">
                    <select name="id_category" class="form-control">
                        <?php foreach ($category as $key => $value): ?>
                         <option value="<?php echo $value['id'] ?>" <?php echo $value['id'] == $product['id_category'] ? 'selected' : ''; ?>><?php echo $value['name'] ?></option>
                        <?php endforeach ?>
                       
                    </select>
                </div>

                <div class="form-group">
                    <label>Nhãn hiệu</label>
                    <input type="text" class="form-control" name="label" placeholder="Apple, Samsung, LG,..." required value="<?php echo $product['label'] ?>">
                </div>

                <div class="form-group">
                    <label>Ảnh đại diện</label><br>
                    <input type="hidden" class="form-control" name="image_old" value="<?php echo $product['image'] ?>" >
                    <img width="150px" src="<?php echo base_url();?>uploads/product/<?php echo $product['image'] ?>" alt="Lỗi">
                    <input type="file" class="form-control" name="image" placeholder="Ảnh sản phẩm">
                </div>

                <div class="form-group">
                    <label>Giá</label>
                    <input type="number" class="form-control" name="price_origin" placeholder="Giá gốc" required value="<?php echo $product['price_origin'] ?>">
                </div>

                <div class="form-group">
                    <label >Giá khuyến mại</label>
                    <input type="number" class="form-control" name="price_sales" placeholder="Giá khuyến mại" required value="<?php echo $product['price_sales'] ?>">
                </div>

                <div class="form-group">
                    <label>Thông tin chi tiết sản phẩm</label>
                    <textarea name="description" id="description" required ><?php echo $product['description'] ?></textarea>
                </div>

                <div class="form-group">
                    <label>Số lượng</label>
                    <input type="number" class="form-control" name="quantity" placeholder="Số lượng sản phẩm" required value="<?php echo $product['quantity'] ?>">
                </div>

                <label>Khuyến mãi</label>
                <div class="form-group">
                    <select name="id_promotion" class="form-control">
                        <option value="0">Không có khuyến mãi nào</option>
                        <?php foreach ($promotion as $key => $value): ?>
                         <option value="<?php echo $value['id'] ?>"  <?php echo $value['id'] == $product['id_promotion'] ? 'selected' : ''; ?>><?php echo $value['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label >Trạng thái</label>
                    <select name="status" class="form-control" >
                        <option value="1" <?php echo $product['status'] == 1 ? 'selected' : ''; ?>>Hiển thị</option>
                        <option value="2" <?php echo $product['status'] == 2 ? 'selected' : ''; ?>>Không hiển thị</option>
                        <option value="3" <?php echo $product['status'] == 3 ? 'selected' : ''; ?>>New</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block" style="margin-bottom: 20px;">Cập nhật</button>
            </form>  
            </div>
           
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/project2/application/core/layout/footer.php'); ?>

<script>
    CKEDITOR.replace( 'description' );
</script>  



