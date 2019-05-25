<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chi tiết sản phẩm</title>
	<?php include 'link.php'; ?>
	<link rel="stylesheet" href="/project2/lib/home/single.css">
</head>
<body>
<?php include 'header_view.php'; ?>
<?php foreach ($data as $key => $value): ?>
<div class="singleProduct">
	 <div class="container">
		<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<div class="avatar">
						<a href=""><img src="/project2/uploads/product/<?php echo $value['image'] ?>" alt="Lỗi"></a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<div class="content">
						<a href=""><div class="name"><?php echo $value['name'] ?></div></span></a>
						<?php if($value['price_sales']){ ?>
						<div class="prices">
							<div class="priceRoot"><?php echo number_format($value['price_origin'],0,".", "."); ?> ₫</div>
							<div class="priceSale"><?php echo number_format($value['price_sales'],0,".", "."); ?> ₫</div>
						</div>
					<?php }else{ ?>
						<div class="prices">
							<div class="priceSale"><?php echo number_format($value['price_origin'],0,".", "."); ?> ₫</div>
						</div>
					<?php } ?>
						<div class="noteKM"><?php echo $value['promotion'] ?></div>
						<div class="quantitySale">
							<div class="btn-group">
								<button type="button" id="minus" class="btn btn-default">-</button>
								<input type="text" id="sl_add" class="btn btn-default" value="1">
								<button type="button" id="plus" class="btn btn-default">+</button>
							</div>
						</div>
						<input type="hidden" id="idProduct" value="<?php echo $data[0]['id'] ?>">
						<div class="updateCart">
							<button class="btn btn-danger" id="updateCart">Cập nhật giỏ hàng</button>
						</div>
						<div class="goCart">
							<a href="/project2/Home/Cart">
							<button class="btn btn-info">Đến giỏ hàng</button>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<div class="inforProduct">
						<ul>
							<?php echo $value['description'] ?>
						</ul>
					</div>
				</div>
			<?php endforeach ?>
		</div> 
	</div> 
</div> <!-- end singleProduct -->
<div class="productSame">
	<div class="container">
		<div class="row">
			<div class="title">Sản phẩm liên quan</div>
		</div>
		<div class="row">
			<?php $i=1; ?>
			<?php foreach ($spSame as $key => $value): ?>
			<?php if($i==5) break; ?>	
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
			 <div class="product">
			 	<a href="/project2/Home/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id'] ?>"><img width="100%" src="/project2/uploads/product/<?php echo $value['image'] ?>" alt="Lỗi"></a>
			 	<a href="/project2/Home/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id'] ?>"><div class="name"><?php echo $value['name'] ?></div></a>
			 	<?php if($value['price_sales']){ ?>
			 	<div class="prices">
			 	<div class="span-group">
			 		<span class="price"><?php echo number_format($value['price_origin'],0,".", "."); ?> ₫</span>
			 		<span class="priceSale"><?php echo number_format($value['price_sales'],0,".", "."); ?> ₫</span>
			 	</div>
			 	</div>
			 	<?php }else{ ?>
			 		<div class="price"><?php echo number_format($value['price_origin'],0,".", "."); ?> ₫</div>	
			 	<?php } ?>	
			 	<div class="note">KM</div>
			 	<div class="addToCart"><button class="btn btn-danger" value="<?php echo $value['id'] ?>">Thêm vào giỏ hàng</button></div>		
			 </div>		
			</div> <!-- end 1sp -->
			<?php $i++; ?>
			<?php endforeach ?>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>
<script>
	document.addEventListener("DOMContentLoaded",function(){
	$('#plus').click(function() {
		var sl_add = parseInt($('#sl_add').val());
		if (sl_add>=5) {}else{
			sl_add=sl_add+1;
			$('#sl_add').val(sl_add);
		}
	});
	$('#minus').click(function() {
		var sl_add = parseInt($('#sl_add').val());
		if (sl_add==1) {}else{
			sl_add=sl_add-1;
			$('#sl_add').val(sl_add);
		}
	});
	$('#updateCart').click(function() {
		id=parseInt($('#idProduct').val());
		var quantityPresent = parseInt($('.quantity').html());
		var sl=parseInt($('#sl_add').val());
		
		$.ajax({
			url: '/project2/Home/addToCart',
			type: 'POST',
			data: {id:id,sl:sl}
		})
		.done(function() {
		})
		.fail(function() {

		})
		.always(function(data) {
			if (data=='expired'){
				$('.expired').addClass('hThi');
				 setTimeout(function(){
				$('.expired').removeClass('hThi');
				 }, 1500);
				$('.close').click(function() {
				$('.expired').removeClass('hThi');
				});
			}else if(data=='limit'){
				$('.limit').addClass('hThi');
				 setTimeout(function(){
				$('.limit').removeClass('hThi');
				 }, 1500);
				$('.close').click(function() {
				$('.limit').removeClass('hThi');
				});
			}else{
				$('.quantity').html(quantityPresent+sl);
				$('.messageAddToCart').addClass('hThi');
				 setTimeout(function(){
				$('.messageAddToCart').removeClass('hThi');
				 }, 1500);
				$('.close').click(function() {
				$('.messageAddToCart').removeClass('hThi');
				}); 
			}
		});

	});
	},false);
</script>
</body>
</html>