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
        <div class="col-lg-8 col-lg-push-2">
            <h1><?php echo $tintuc['title'] ?></h1>
            <img src="/project2/<?php echo $tintuc['image'] ?>" alt="">
            <?php echo $tintuc['content'] ?>
        </div>
    </div>
    <!-- end Page Content -->
<?php include 'footer.php'; ?>
</body>
</html>