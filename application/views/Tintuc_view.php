<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh sách sản phẩm</title>
	<?php include 'link.php'; ?>
</head>
<body>
<?php include 'header_view.php'; ?>	
    <!-- Page Content -->
    <div style="padding-top: 200px;" class="container">
        <div class="row firstRow">
        	<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 tintuc_newest">
        		<a href="">
        			<img class="anhtintucmoi" src="" alt="">
        			<h3 class="title"></h3>
        			<p class="content"></p>
        		</a>
        	</div>
        	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 tintuc_phu">
        		<ul>
        			<li>
        				<a href="">
        					<img class="anhtintucphu" src="" alt="">
        					<h3 class="title"></h3>
        				</a>			
        			</li>
        			<li>
        				<a href="">
        					<p class="content"></p>
        				</a>
        			</li>
        		</ul>
        	</div>
        	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 tintuc_khuyenmai">
        		<h4>Khuyễn mãi hot</h4>
        		<ul>
        			<li>
        				<div class="number"></div>
        				<a href="">
        					<p class="tenkhuyenmai"></p>
        				</a>
        			</li>
        		</ul>
        	</div>
        </div>
        <div class="row tintuc_older">
        	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        		<hr>
        		<ul>
        			<li>
        				<a href="">
        					<img src="" alt="" class="anhtintuccu">
	        				<h3 class="title"></h3>
	        				<p class="tomtat"></p>
	        				<p class="time_created"></p>
        				</a>      				
        			</li>
        		</ul>
        	</div>
        </div>
    </div>
    <!-- end Page Content -->
<?php include 'footer.php'; ?>
<script>
	$(document).ready(function(){
		$('.viewMore').click(function() {
			var id_category='<?php echo $products[0]['id_category']; ?>';
					//lấy số lượng sản phẩm hiện tại
					var sl = $('#slsp').val();
					sl=parseInt(sl);
					$('#slsp').val(sl+8);
					$.ajax({
						url: '/project2/Home/loadMore',
						type: 'POST',
						data: {idCartegory:id_category,offset:sl}
					})
					.done(function() {
					})
					.fail(function() {
					})
					.always(function(data) {
						if (data!="NULL") {
							$('.products').append(data);
						}else{
							$('.viewMore').html('<b class="endProduct" >Đã hết sản phẩm</b>');
						}
					});
				});
	     });
</script>
</body>
</html>