<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tin tức công nghệ</title>
	<?php include 'link.php'; ?>
</head>
<body>
<?php include 'header_view.php'; ?>	
    <!-- Page Content -->
    <div style="padding-top: 100px;" class="container">
        <div class="row firstRow">
        	<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 tintuc_newest">
                <?php $i=0; ?>
                <?php foreach ($tintuc1 as $tintuc1): ?>   
                    <?php if($i == 0){ ?>      
                		<a href="/project2/Home/TinTucDetail/<?php echo $tintuc1['id'] ?>">
                			<img width="457px" class="anhtintucmoi" src="<?php echo base_url() ?><?php echo $tintuc1['image'] ?>" alt="">
                			<h3 class="title"><?php echo $tintuc1['title'] ?></h3>
                			<p class="tomtat"><?php echo $tintuc1['summary'] ?></p>
                		</a>
                    <?php } ?>    
                    <?php $i++; ?>  
                <?php endforeach ?>
        	</div>
        	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 tintuc_phu">
        		<ul>
                    <?php $j=0; ?>
                    <?php foreach ($tintuc2 as $tintuc2): ?> 
                        <?php if($j == 1) { ?>               
                			<li>
                				<a href="/project2/Home/TinTucDetail/<?php echo $tintuc2['id'] ?>">
                					<img width="220px" class="anhtintucphu" src="<?php echo base_url() ?><?php echo $tintuc2['image'] ?>" alt="">
                					<h4 class="title"><?php echo $tintuc2['title'] ?></h4>
                				</a>			
                			</li>
                        <?php } ?>             
                        <?php if(($j > 1) && ($j < 4)){ ?>
                            <hr>
                			<li>
                				<a href="/project2/Home/TinTucDetail/<?php echo $tintuc2['id'] ?>">
                					<h4 class="title"><?php echo $tintuc2['title'] ?></h4>
                				</a>
                			</li>
                        <?php } ?>
                        <?php $j++; ?>
                    <?php endforeach ?>
        		</ul>
        	</div>
        	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 tintuc_khuyenmai">
        		<h4>Khuyễn mãi hot</h4>
        		<ul>
                    <?php $k=0; ?>
                    <?php foreach ($khuyenmai as $khuyenmai): ?>
                        <?php if($k < 7){ ?>               
                			<li>
                				<div class="stt"><p><?php echo $k+1 ?></p></div>
                                <a href="" class="tenkhuyenmai"><p><?php echo $khuyenmai['name'] ?></p></a>
                				
                			</li>
                        <?php } ?>
                        <?php $k++; ?>
                    <?php endforeach ?>
        		</ul>
        	</div>
        </div>
        <div class="row tintuc_older">
        	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        		<hr>
        		<ul class="listTintuc">
                    <?php $x=0; ?>
                    <?php foreach ($tintuc3 as $tintuc3): ?>
                        <?php if($x > 3 && $x < 9){ ?>           
                			<li>
                				<a href="/project2/Home/TinTucDetail/<?php echo $tintuc3['id'] ?>">
                                    <span class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <img width="200px" src="<?php echo base_url() ?><?php echo $tintuc3['image'] ?>" alt="" class="anhtintuccu">
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                            <h3 class="title"><?php echo $tintuc3['title'] ?></h3>
                                            <p class="tomtat"><?php echo $tintuc3['summary'] ?></p>
                                            <p class="time_created"><?php echo date('d/m/Y H:i:s A', $tintuc3['time_created']) ?></p>
                                        </div>
                                    </span>
                				</a>  
                                <hr>    				
                			</li>
                        <?php } ?>
                        <?php $x++; ?>
                    <?php endforeach ?>
        		</ul>
                
                    <input type="hidden" id="sltt" value="9" >
                    <div class="row">
                        <div class="viewMore">
                            <b class="btn btn-danger">Xem thêm </b>
                        </div>
                    </div>
                </div>
         </div>
    </div>
    <!-- end Page Content -->
<?php include 'footer.php'; ?>
<script>
	$(document).ready(function(){
		$('.viewMore').click(function() {
				//lấy số lượng tin tức hiện tại
				var sl = $('#sltt').val();
				sl=parseInt(sl);
				$('#sltt').val(sl+5);
				$.ajax({
					url: '/project2/Home/loadMoreTintuc',
					type: 'POST',
					data: {offset:sl}
				})
				.done(function() {
				})
				.fail(function() {
				})
				.always(function(data) {
                    data = JSON.parse(data)
					if (data.status !="NULL") {
						$('.listTintuc').append(data.data);
					}else{
						$('.viewMore').html('<b class="endProduct" >Đã hết sản phẩm</b>');
					}
				});
			});
	     });
</script>
</body>
</html>