<?php
$cart = $this->session->userdata('cart');
if ($cart == NULL) {
	$quantity = 0;
} else {
	$quantity = 0;
	foreach ($cart as $key => $value) {
		$quantity += $value[0];
	}
}
?>
<div class="menu">
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand logo" href="/project2/Home"><img width="80px" src="/project2/<?php echo $footer[0]['logo'] ?>" alt=""></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<form class="navbar-form navbar-left" role="search" action="/project2/Home/Timkiem" method="POST">
					<div class="form-group">
						<input id="search_text" type="text" class="form-control" name="keySearch" placeholder="Tìm kiếm sản phẩm...">
						<button><div class="iconSearch"><i class="fas fa-search"></i></div></button>
					</div>
				</form>
				<ul class="nav navbar-nav navbar-right">
					
					<li><a href="/project2/Home/showProduct/<?php echo  $header[0]['id'] ?>"><?php echo $header[0]['name'] ?><i class="icon glyphicon glyphicon-phone"></i></a></li>
					<li><a href="/project2/Home/showProduct/<?php echo  $header[1]['id'] ?>"><?php echo $header[1]['name'] ?><i class="icon fas fa-tablet-alt"></i></a></li>
					<li><a href="/project2/Home/showProduct/<?php echo  $header[2]['id'] ?>"><?php echo $header[2]['name'] ?><i class="icon fas fa-laptop"></i></a></li>
					<li><a href="/project2/Home/showProduct/<?php echo  $header[3]['id'] ?>"><?php echo $header[3]['name'] ?><i class="icon fas fa-headphones"></i></a></li>

					<li><a href="/project2/Home/TinTuc">Tin tức<i class="icon glyphicon glyphicon-list-alt"></i></a></li>
					<li class="action giohang">
					 <a href="/project2/Home/Cart">Giỏ hàng<i class="icon cart fas fa-project2ping-cart"></i><span class="quantity" id="sl"><?php echo $quantity ?></span></a></li>
					<?php if ($this->session->has_userdata('fullname') && $this->session->has_userdata('password') && $this->session->has_userdata('email')) {?>
					<li class="action" style="cursor: pointer;" id="changeInfo">
						<a>
							<?php echo $this->session->userdata('fullname') ?>
						</a>
					</li>
					<li class="action"><a href="/project2/Home/logout">Thoát</a></li>
					<?php } else {?>
					<li class="action"><a class="dky" href="#">Đăng ký</a></li>
					<li class="action"><a class="dNhap" href="#">Đăng nhập</a></li>
					<?php }?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<div class="resultSearch KHthi">
	</div>
</div> <!-- end_menu -->
<div class="messageAddToCart">
	<div class="title">Thêm vào giỏ hàng thành công</div>
	<div class="close"><i class="fas fa-times"></i></div>
	<div class="done"><i class="fas fa-check"></i></div>
</div>
<div class="limit">
	<div class="title">Thêm không thành công. Giới hạn số lượng sản phẩm là 5</div>
	<div class="close"><i class="fas fa-times"></i></div>
</div>
<div class="expired">
	<div class="title">Số lượng sản phẩm không đủ.</div>
	<div class="close"><i class="fas fa-times"></i></div>
</div>
<div class="iconUp KHthi">
	<i class="fas fa-angle-double-up"></i>
</div>
<div class="dkyMember KHthi">
	<div class="row"></div>
	<div class="form_content">
		<div class="title">Đăng ký tài khoản</div>
		<div class="closeDky"><i class="fas fa-times"></i></div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="form-group">
				<label for="">Tên đăng nhập</label>
				<input type="text" class="form-control" id="username" placeholder="Username" required>
			</div>
			<div class="form-group">
				<label for="">Mật khẩu</label>
				<input type="password" class="form-control" id="password" placeholder="Mật khẩu" required>
			</div>
			<div class="form-group">
				<label for="">Số điện thoại</label>
				<input type="text" class="form-control" id="phone" placeholder="Số điện thoại" required>
			</div>	
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="form-group">
				<label for="">Họ tên</label>
				<input type="text" class="form-control" id="fullname" placeholder="Họ tên" required>
			</div>
			<div class="form-group">
				<label for="">Nhập lại mật khẩu</label>
				<input type="password" class="form-control" id="repassword" placeholder="Nhập lại mật khẩu" required>
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input type="email" class="form-control" id="email" placeholder="Địa chỉ email">
			</div>
			</div>
		</div>
			
			
			<button type="submit" class="btn btn-primary confirm">Đăng ký</button>
	</div>
</div>

<div class="changeInfoUser KHthi">
	<div class="row"></div>
	<div class="form_content">
		<div class="title">Thông tin cá nhân</div>
		<div class="closeDky"><i class="fas fa-times"></i></div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="form-group">
				<label for="">Tên đăng nhập</label>
				<input type="hidden"  id="idChange">
				<input disabled type="text" class="form-control" id="usernameChange" placeholder="Username" required>
			</div>
			<div class="form-group">
				<label for="">Số điện thoại</label>
				<input type="text" class="form-control" id="phoneChange" placeholder="Số điện thoại" required>
			</div>	
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="form-group">
				<label for="">Họ tên</label>
				<input type="text" class="form-control" id="fullnameChange" placeholder="Họ tên" required>
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input type="email" class="form-control" id="emailChange" placeholder="Địa chỉ email">
			</div>
			</div>
		</div>
			<button type="submit" class="btn btn-primary confirmChange">Cập nhật</button>
			<button type="submit" class="btn btn-warning changePasswordNew">Đổi mật khẩu</button>
	</div>
</div>

<div class="loginMember KHthi">
	<div class="form_content">
		<div class="title">Đăng nhập tài khoản</div>
		<div class="closeDNhap"><i class="fas fa-times"></i></div>
			<div class="form-group">
				<label for="">Tài khoản</label>
				<input type="text" class="form-control" id="usernameLogin" placeholder="Username">
			</div>
			<div class="form-group">
				<label for="">Mật khẩu</label>
				<input type="password" class="form-control" id="passwordLogin" placeholder="Mật khẩu">
			</div>
			<button type="submit" class="btn btn-primary login">Đăng nhập</button>
	</div>
</div>

<div class="changePassword KHthi">
	<div class="form_content">
		<div class="title">Đổi mật khẩu</div>
		<div class="closeDNhap"><i class="fas fa-times"></i></div>
			<div class="form-group">
				<label for="">Mật khẩu mới</label>
				<input type="text" class="form-control" id="passwordChange" placeholder="Mật khẩu mới">
			</div>
			<div class="form-group">
				<label for="">Nhập lại mật khẩu</label>
				<input type="password" class="form-control" id="rePasswordChange" placeholder="Nhập lại mật khẩu">
			</div>
			<button type="submit" class="btn btn-primary changePass" style="margin-left: 10px;">Xác nhận</button>
	</div>
</div>

<script>
document.addEventListener("DOMContentLoaded",function(){
	 function isEmail(email) {     //check email
			var isValid = false;
			var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(regex.test(email)) {
				isValid = true;
			}
			return isValid;
		}
	// search
$('#search_text').keyup(function() {
	var key=$(this).val();
	element=$('.resultSearch');
	if (key!='') {

		$.ajax({
			url: '/project2/Home/TimkiemAjax',
			type: 'POST',
			data: {key: key}
		})
		.always(function(data) {
			element.removeClass('KHthi');
			element.html('');
			element.append(data);
		});

	}else{
		element.html('');
		element.addClass('KHthi');
	}
});
// đăng ký member
$('.dky').click(function() {
$('.dkyMember').removeClass('KHthi');
$( window ).scroll(function() {
  var y = $(window).scrollTop();
  y=y+'px';
  $(".dkyMember").css("top",y);
});
});
$('.closeDky').click(function() {
$('.dkyMember').addClass('KHthi');
});

$('.closeDky').click(function() {
$('.changeInfoUser').addClass('KHthi');
});

$('.confirm').click(function() {
	var email=$('#email').val();
	var password=$('#password').val();
	var rePassword=$('#repassword').val();
	var fullname=$('#fullname').val();
	var username=$('#username').val();
	var phone=$('#phone').val();
	if(password != rePassword){
		alert('Mật khẩu không hợp lệ !');
	}else if(!isEmail(email)){
		alert('Địa chỉ email không hợp lệ');
	}else if(password==''){
		alert('Vui lòng nhập mật khẩu');
	}else if(fullname==''){
		alert('Vui lòng nhập họ tên');
	}else if (phone.length == 0) {
		alert('Vui lòng nhập số điện thoại');
	}else{
		$.ajax({
			url: '/project2/Home/signUp',
			type: 'POST',
			data: {email:email,password:password,fullname:fullname,username:username,phone:phone}
		})
		.always(function(data) {
			x = data.indexOf(">");
			data = data.slice(x+1, data.length);
			data = JSON.parse(data);
			idUser = data.idAcc;
			if (data.status=='isset') {
			 alert('Tài khoản đã tồn tại !');
			}else{
				$.ajax({
					url: '/project2/Home/createSession',
					type: 'POST',
					data: {idUser:idUser,email:email,password:password,fullname:fullname,username:username,phone:phone}
				})
				.always(function() {
					location.href='/project2/Home';
				});

			}
		});

	}

});
// đăng nhập member
$('.dNhap').click(function() {
 $('.loginMember').removeClass('KHthi');
$( window ).scroll(function() {
  var y = $(window).scrollTop();
  y=y+'px';
  $(".loginMember").css("top",y);
});
});

$('.closeDNhap').click(function() {
	 $('.loginMember').addClass('KHthi');
});

$('.closeDNhap').click(function() {
	 $('.loginMember').addClass('KHthi');
});

$('.closeDNhap').click(function() {
	 $('.changePassword').addClass('KHthi');
});

// confirm
$('.login').click(function() {
  var username=$('#usernameLogin').val();
  var password=$('#passwordLogin').val();
  if (username =='' ||password=='') {
  	alert('Vui lòng nhập đầy đủ thông tin ');
  }else{
  	$.ajax({
  		url: '/project2/Home/login',
  		type: 'POST',
  		data: {username: username,password:password}
  	})
  	.always(function(data) {
  		x = data.indexOf(">");
		data = data.slice(x+1, data.length);
  		data = JSON.parse(data);
  		if (data=='notfound') {
  			alert('Tài khoản hoặc mật khẩu không đúng');
  		}else{
  			location.href='/project2/Home';
  		}
  	});

  }
});

$('#changeInfo').click(function() {
$('.changeInfoUser').removeClass('KHthi');
$( window ).scroll(function() {
  var y = $(window).scrollTop();
  y=y+'px';
  $(".changeInfoUser").css("top",y);
});

$.ajax({
		url: '/project2/admin/User/getInfoUser',
		type: 'POST',
		data: {}
		})
		.always(function(data) {
			data     = JSON.parse(data);
			id       = data.id;
			username = data.username;
			fullname = data.fullname;
			email    = data.email;
			phone    = data.phone;
			$('#emailChange').val(email);
			$('#idChange').val(id);
			$('#fullnameChange').val(fullname);
			$('#usernameChange').val(username);
			$('#phoneChange').val(phone);
		});


});

$('.confirmChange').click(function() {
	var id       = $('#idChange').val();
	var email    = $('#emailChange').val();
	var fullname = $('#fullnameChange').val();
	var username = $('#usernameChange').val();
	var phone    = $('#phoneChange').val();
	if(!isEmail(email)){
		alert('Địa chỉ email không hợp lệ');
	}else if(fullname==''){
		alert('Vui lòng nhập họ tên');
	}else if (phone.length == 0) {
		alert('Vui lòng nhập số điện thoại');
	}else{
		$.ajax({
			url: '/project2/admin/User/updateInfoCustomer',
			type: 'POST',
			data: {id:id, email:email, fullname:fullname, phone:phone}
		})
		.always(function(data) {
			if (data == 'done') {
				alert('Thay đổi thông tin thành công');
				location.href='/project2/Home';
			} else {
				alert('Có lỗi xảy ra, vui lòng thử lại');
			}
		});

	}
});

// change pass
$('.changePasswordNew').click(function() {
 $('.changePassword').removeClass('KHthi');
 $('.changeInfoUser').addClass('KHthi');
});

$('.changePass').click(function() {
 	var id       = $('#idChange').val();
	var password = $('#passwordChange').val();
	var rePassword = $('#rePasswordChange').val();

	if (password != rePassword) {
		alert('Mật khẩu không trùng khớp.');
	} else {
		$.ajax({
			url: '/project2/admin/User/updatePassCustomer',
			type: 'POST',
			data: {password:password, id:id}
		})
		.always(function(data) {
			if (data == 'done') {
				alert('Thay đổi mật khẩu thành công');
				location.href='/project2/Home';
			}
		});

	}

});




},false);
</script>