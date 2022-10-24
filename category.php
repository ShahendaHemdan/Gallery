<?php 
include "model/connect.php";
$catid=$_GET['id'];
$qpostcat="SELECT * FROM `posts` WHERE `categoryid`=$catid  ORDER BY `id` DESC";
$postcat=$connect->query($qpostcat);
?>

<!DOCTYPE html>
<html lang="uk">
	
<head>
		<title>INSTANT BLOG - Category</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/bxslider.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/adaptive.css" media="screen" />
	</head>
<body class="archive category">
	 
	<?php include "header.php" ?>
	<section class="container">
		<div class="wrapper clear">
			<div class="contentLeft">

<?php  
	$qcat="SELECT `name` FROM `category` WHERE `id`=$catid LIMIT 1";
	$catname=$connect->query($qcat);
	foreach($catname as $cn){
		$catname=$cn['name'];
	?>
				<div class="archivePageTitle"><span><?= $catname ?></span></div>
				<div class="archivePostWrap">
					
		<?php } ?>			 


	<?php foreach($postcat as $pc){
		$postid=$pc['id']; ?>

					<div class="archivePostItem">
						<div class="archivePostTime"><?= $pc['date'] ?></div>
						<h3 class="archivePostTitle"><a href="#"><?= $pc['title'] ?></a></h3>
						<a href="#" class="archivePostCategory"><?= $cn['name'] ?></a>
						<a href="single.php?id=<?= $postid=$pc['id'] ?>" class="archivePostImg">
						<img src="admin/<?= $pc['image'] ?>" alt="Francoise img">
						</a>
						<p> <?= $pc['description'] ?></p>
						<div class="archivePostItemMeta">
<?php 
$qcountcomment="SELECT COUNT(`id`)  AS 'count' FROM comment WHERE `postId`=$postid";
$countcomment=$connect->query($qcountcomment);
foreach($countcomment as $cm){ ?>
							<a href="#" class="archivePostItemComments"><?= $cm['count'] ?> comments</a>
<?php } ?>
							<div class="archivePostItemShareLinks">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</div>
							<a href="single.php?id=<?= $postid ?>" class="archivePostReadMore">Read More</a>
						</div>
					</div>

<?php }?>

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
$qrecent="SELECT * FROM `posts` WHERE `categoryid`=$catid ORDER BY `id` DESC LIMIT 1";
$recent=$connect->query($qrecent);
foreach($recent as $rec){
	$recpostid=$rec['id'];
?>
					<h3>Recent post</h3>
					<div class="popularPostsWidget">
						<div class="popularPostsWidgetItem">
						<a href="single.php?id=<?= $recpostid ?>" class="popularPostsItemImg"><img src="admin/<?= $rec['image'] ?>" alt="Francoise img"></a>
						<time datetime="2015-05-15"><?= $rec['date'] ?></time>
						<h4><a href="single.php?id=<?= $recpostid ?>"><?= $rec['title'] ?></a></h4>
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
	</footer>
	 -->

	 <?php include "footer.php" ?>
	<div class="searchPopup">
		<span class="closeBtn"></span>
		<div class="wrapper">
			<form action="https://highseastudio.com/demo/francoise-html/index.html">
				<input class="" type="text" name="" size="32" value="" placeholder="Search">
			</form>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>

</html>