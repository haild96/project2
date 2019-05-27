<div class="footer">
	<div class="container">
		<div class="row infor">
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 top">
				<div class="icon">	
					<i class="fas fa-location-arrow"></i>
				</div>
				<div class="content">
					<h4>Giao hàng toàn quốc</h4>
					<p>Thanh toán tận nơi</p>
				</div>	
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 top">
				<div class="icon">
					<i class="fas fa-tags"></i>	
				</div>
				<div class="content">
					<h4>Ưu đãi thành viên</h4>
					<p>Khuyến mãi cho thành viên</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 top">
				<div class="icon">
					<i class="fas fa-map-marker"></i>	
				</div>
				<div class="content">
					<h4>Nhận hàng nhanh chóng</h4>
					<p>Trong 2 ngày tối đa 6 ngày</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 top">
				<div class="icon">
					<i class="fas fa-handshake"></i>	
				</div>
				<div class="content">
					<h4>Miễn phí giao hàng</h4>
					<p>Cho đơn hàng trên 500.00</p>
				</div>
			</div>
		</div>
		<?php foreach ($footer as $key => $value): ?>
		
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 middle addressCompany">
			    <h4>Thông tin công ty</h4>
				<ul>
					<li>Address:<?php echo $value['address'] ?></li>
					<li>Email:<?php echo $value['email'] ?></li>
					<li>Phone:<?php echo $value['phone'] ?></li>
				</ul>	
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 middle social">
				<h4>Liên hệ</h4>
				<ul>
					<li><a href="<?php echo $value['link_fb'] ?>"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="<?php echo $value['link_instagram'] ?>"><i class="fab fa-instagram"></i></a></li>
					<li><a href="<?php echo $value['link_youtube'] ?>"><i class="fab fa-youtube"></i></a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 middle sub">
				<h4>Đăng ký nhận khuyến mãi</h4>
				<form action="" method="POST" role="form">
				
					<div class="form-group">
						<input type="text" class="form-control" id="" placeholder="Your email address">
					</div>
					<button type="submit" class="btn btn-primary">Subscribe</button>
				</form>
			</div>
		</div>

		<?php endforeach ?>
		<div class="row">
			<div class="bottom">
			<p>© 2019 - Copyright</p>
		</div>
		</div>
	</div>
</div>