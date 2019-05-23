<?php include($_SERVER['DOCUMENT_ROOT'].'/project2/application/core/layout/nav.php'); ?>

<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Đơn hàng
                <small>Danh sách</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <form action="<?php echo base_url()?>admin/Order" method="POST" role="form">
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                  <div class="form-group">
                        <label class="control-label">Từ ngày</label>
                        <div class='input-group date' id='datetimepicker1' style="cursor: pointer;">
                            <input type='text' name="timeStart" class="form-control" />
                            <span class="input-group-addon" style="cursor: pointer;">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                   <div class="form-group">
                        <label class="control-label">Đến ngày</label>
                        <div class='input-group date' id='datetimepicker2' style="cursor: pointer;">
                            <input type='text' name="timeEnd" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>       
                    
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="form-group">
                    <label >Trạng thái đơn hàng</label>
                        <select name="status" class="form-control" >
                        <option value="0">-- Chọn trạng thái --</option>
                        <option value="1">Chưa xác nhận</option>
				 		<option value="2">Đã xác nhận</option>
				 		<option value="3">Hoàn thành</option>
				 		<option value="4">Từ chối đơn hàng</option>
                        </select>
                     </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                   <button type="submit" class="btn btn-primary" style="margin-top: 24px;">Tìm kiếm</button> 
                </div>
            </div>
        </form> 
        <hr>

        <table class="table table-hover table-bordered">
			    <thead>
					<tr>
						<th>Mã đơn hàng</th>
						<th>Thông tin khách hàng</th>
						<th>Ngày đặt</th>
						<th>Trạng thái</th>
						<th>Nhân viên Sales</th>
						<th>Chi tiết đơn hàng</th>
						<th>Hành động</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!count($order)) {?>
						<div class="alert alert-info text-center billEmpty">
						<div class="title">Không có đơn hàng nào</div>
						</div>
					<?php } ?>
					<?php foreach ($order as $key => $value): ?>
					<tr>
						<td class="text-center">#BKS<?php echo $value['id'] ?></td>
						<td>
							<?php foreach ($listUser as $key => $user): ?>
								<?php if ($user['id'] == $value['user_id']) {
									echo $user['fullname'];
								} ?>
							<?php endforeach ?><br>
						  <?php echo $value['phone'] ?><br>
						  <?php echo $value['email'] ?><br>
						  <?php echo $value['address'] ?>
						</td>
						<td><?php echo date('d/m/Y',$value['time_created']) ?></td>
						
						<td>
							<?php
							if ($value['status'] == 1) {
							 	$status = "Chưa xác nhận";
							 } elseif ($value['status'] == 2) {
							 	$status = "Đã xác nhận";
							 } elseif ($value['status'] == 3) {
							 	$status = "Hoàn thành";
							 } else if($value['status'] == 4) {$status = "Từ chối đơn hàng";}
							 ?>
						 <div class="status"><?php echo $status ?></div>
						 <div class="change_status kHThi">
						 	<select class="form-control contentStatus">
						 		<option value="1">Chưa xác nhận</option>
						 		<option value="2">Đã xác nhận</option>
						 		<option value="3">Hoàn thành</option>
						 		<option value="4">Từ chối đơn hàng</option>
						 	</select>
						 	<i class="btn btn-success btn-sm glyphicon glyphicon-ok done"></i>
						 	<input type="hidden" value="<?php echo $value['id'] ?>">
						 	<input type="hidden" value="<?php echo $this->session->userdata('username') ?>">
						 </div>	
						</td>
						<td class="sales">
							<?php foreach ($listUser as $key => $user): ?>
								<?php if ($user['id'] == $value['sales_id']) {
									echo $user['username'];
								} ?>
							<?php endforeach ?>
						</td>
						
						<td>
							<a href="<?php echo base_url() ?>admin/Order/viewDetail/<?php echo $value['id'] ?>">Xem chi tiết</a>
						</td>
						<td class="text-center">
							<div class="center change" style="margin-bottom: 10px;"> 
                              <button class="btn btn-info btn-xs"><i class="fa fa-pencil fa-fw"></i></button>
                       		</div>

	                        <div class="center" id="removeOrder"> 
	                             <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o  fa-fw"></i></button>
	                        </div>
                        	<input type="hidden" value="<?php echo $value['id'] ?>">
						</td>
					</tr>
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

<?php include($_SERVER['DOCUMENT_ROOT'].'/project2/application/core/layout/footer.php'); ?>

<script>
	document.addEventListener("DOMContentLoaded",function(){
	$('body').on('click','.change',function () {
	    $(this).parent().prev().prev().prev().find('.change_status').removeClass('kHThi');
	    $(this).parent().prev().prev().prev().find('.status').addClass('kHThi');
	});

	$('body').on('click','.done',function () {   
	    $(this).parent().addClass('kHThi');
	    $(this).parent().prev().removeClass('kHThi');
	    status = $(this).prev().val();
	    if (status == 1) {
		    content = "Chưa xác nhận";
		} else if (status == 2) {
		 	content = "Đã xác nhận";
		 } else if (status == 3) {
		 	content = "Hoàn thành";
		 } else {
		 	content = "Từ chối đơn hàng";
		 }
	    id   = $(this).next().val();
	    user = $(this).next().next().val();

	    $(this).parent().prev('.status').html(content);
	    $(this).parent().parent().next('.sales').html(user);
	    $.ajax({
	        url: '/project2/admin/Order/update',
	        type: 'POST',
	        data: {status: status,id:id}
	    })
	    .done(function() {
	    })
	    .fail(function() {
	    })
	    .always(function() {
	    });
	});
	// remove order
	$('body').on('click','#removeOrder',function () {
	var ndXoa = $(this).parent().parent();
	    id    = $(this).next().val();
	 $.ajax({
	        url: '/project2/admin/Order/delete',
	        type: 'POST',
	        data: {id:id}
	    })
	    .done(function() {
	    })
	    .fail(function() {
	    })
	    .always(function(data) {
	        ndXoa.remove();
	    });
	});

	},false);
        
</script>

<script>
      $(function () {
        $('#datetimepicker1').datetimepicker();
     });
</script>

<script type="text/javascript">
	 $(document).ready(function(){
	    $("#datetimepicker2").datetimepicker({                        
	    });
	 });
</script> 



 