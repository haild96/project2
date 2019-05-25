<?php foreach ($products as $key => $value): ?>	
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
	 	<div class="note"><?php echo $value['promotion'] ?></div>
	 	<div class="addToCart"><button class="btn btn-danger" value="<?php echo $value['id'] ?>">Thêm vào giỏ hàng</button></div>		
	 </div>		
	</div> <!-- end 1sp -->	
<?php endforeach ?> 