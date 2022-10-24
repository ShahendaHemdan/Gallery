<?php
include "model/connect.php";


?>
<!DOCTYPE html>
<html lang="uk">
	
<head>
		<title>INSTANT BLOG - Home list</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/bxslider.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/adaptive.css" media="screen" />
	</head>
<body>
	<header id="header">
		<div class="siteHeader">
			<div class="wrapper clear">
				<a href="index.php" class="mobile-logo">
				</a>
				<ul class="mainMenu clear">
					<li>
						<a href="index.php">home</a>
					</li>
					<li>
						<a href="#">Category</a>

						<ul>
<?php $sql="SELECT  * FROM `category` "; 
   $result=$connect->query($sql);
	foreach($result as $r){
		$id=$r['id'];
?>  
							<li><a href="category.php?id=<?= $id ?>"><?= $r['name'] ?></a></li>
<?php }?>
						</ul>

					</li>
        					
				</ul>
				<div class="pull-right clear">
					<div class="headerSocialLinks clear">
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-heart"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-google-plus"></i></a>
					</div>
					<div class="searchIcon"></div>
				</div>
				<span class="showMobileMenu">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</span>
			</div>	
		</div>
		<a href="#" class="logo">INSTANT BLOG</a>
	</header>
	<section class="container mt-5">
		<div class="wrapper clear">
			
			<div class="clear"></div>
			<div class="contentLeft">
				<div class="blogPostListWrap">
<?php
$qpost="SELECT * FROM posts ORDER BY `id` DESC";
$posts=$connect->query($qpost);
		foreach($posts as $post){
?> 
					<div class="blogPostListItem clear">
						<a href="single.php?id=<?= $post['id'] ?>" class="blogPostListImg">
							<img src="admin/<?= $post['image'] ?>" alt="Francoise img">
						</a>
						<div class="blogPostListText">
							<div class="blogPostListTime"><?= $post['date'] ?></div>
<?php 
$id=$post['categoryid'];
$qselect="SELECT name FROM category WHERE id=$id";
$selectcat=$connect->query($qselect);
foreach($selectcat as $cat){
 ?>
							<h3><a href="single.php?id=<?= $post['id'] ?>"><?= $cat['name'] ?></a></h3>
<?php } ?>
							<p> <?php echo substr($post['description'],0)  ?></p>
						</div>
					</div>
 <?php } ?>
					 
					</div>
				<div class="postPagination">
					<ul class="clear">
						<li class="newPosts"><a href="#">New posts</a></li>
						<li class="olderPosts"><a href="#">Older posts</a></li>
					</ul>
				</div>
			</div>
			<div class="sidebarRight">
				<div class="sidebar-widget">
					<h3>About us</h3>
					<div class="aboutMeWidget">
						<img src="images/ourlogo.jpeg" alt="Francoise img">
						<p>A training company specialized in teaching programming languages, networking and computer science to ensure that you get practical experience in the field of software.</p>
					</div>
				</div>
				<div class="sidebar-widget">
					<h3>follow me</h3>
					<div class="followMeSocialLinks">
						<a href="#"><i class="fa fa-instagram"></i></a>
						<span></span>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<span></span>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<span></span>
						<a href="#"><i class="fa fa-heart"></i></a>
						<span></span>
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<span></span>
						<a href="#"><i class="fa fa-google-plus"></i></a>
					</div>
				</div>
				
				<div class="sidebar-widget">
                <?php
$qrecpost="SELECT * FROM `posts` ORDER BY `id` DESC LIMIT 1";
$recpost=$connect->query($qrecpost);
foreach ($recpost as $rp){
	$id=$rp['id'];
?>
					<h3>Recent post</h3>
					<div class="popularPostsWidget">
						<div class="popularPostsWidgetItem">
							<a href="single.php?id=<?=$id?>" class="popularPostsItemImg"><img src="admin/<?= $rp['image'] ?>" alt="Francoise img" ></a>
							<time datetime="2015-05-15"><?= $rp['date'] ?></time>
							<h4><a href="single.php?id=<?=$id?>"><?= $rp['title'] ?></a></h4>
						</div>
						
					</div>
<?php } ?>
				</div>
				
				
			</div>
		</div>
		<div class="clear"></div>
		
	</section>
	<!-- <footer id="footer">
		<div class="footerSocial">
			<div class="wrapper clear">
				<div class="footerSocialItem">
					<a href="#" class="">
						<i class="fa fa-instagram"></i>
						Instagram <br>
						10 537
					</a>
				</div>
				<div class="footerSocialItem">
					<a href="#" class="">
						<i class="fa fa-facebook"></i>
						facebook <br>
						103 537
					</a>
				</div>
				<div class="footerSocialItem">
					<a href="#" class="">
						<i class="fa fa-twitter"></i>
						Twitter <br>
						27 129
					</a>
				</div>
				<div class="footerSocialItem">
					<a href="#" class="">
						<i class="fa fa-heart"></i>
						bloglovin <br>
						98 122
					</a>
				</div>
				<div class="footerSocialItem">
					<a href="#" class="">
						<i class="fa fa-pinterest"></i>
						Pinterest <br>
						10 641
					</a>
				</div>
				<div class="footerSocialItem">
					<a href="#" class="">
						<i class="fa fa-google-plus"></i>
						google + <br>
						17 324
					</a>
				</div>
			</div>
		</div>
		<div class="wrapper">
			
			<p class="copyright">© 2022 INSTANT BLOG</p>
		</div>	
	</footer> -->
	<?php include "footer.php" ?>
	<div class="searchPopup">
		<span class="closeBtn"></span>
		<div class="wrapper">
			<form action="">
				<input class="" type="text" name="" size="32" value="" placeholder="Search">
			</form>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>

</html>