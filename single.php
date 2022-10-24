<?php 
include "model/connect.php" ;
session_start();
$id=$_GET['id'];
$_SESSION['id']=$id;
$_SESSION['postid']=$id;
$qsinglepost="SELECT * FROM posts WHERE id=$id";
$singlepost=$connect->query($qsinglepost);

?>
 

<!DOCTYPE html>
<html lang="uk">
	
<head>
		<title>INSTANT BLOG - Single post</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/bxslider.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/adaptive.css" media="screen" />
		<style>
			.recimage{
				height: 100px;
 			}
		</style>
	</head>
<body class="single-post">
	<?php include "header.php" ?>
	<section class="container">
		<div class="wrapper clear">
			<div class="contentLeft">
<?php foreach($singlepost as $post){ 
?>
			<div class="singlePostMeta">
					<div class="singlePostTime"><?= $post['date'] ?></div>
					<h1><?= $post['title'] ?> </h1>
					<?php
$categoryid=$post['categoryid'];
$q="SELECT `name` FROM `category` WHERE `id`=$categoryid"; 
$cat=$connect->query($q);
foreach($cat as $c) {
 ?>
					<a href="#" class="singlePostCategory"><?= $c['name'] ?></a>
<?php } ?>
				</div>
				<div class="singlePostWrap">
					<div class="singlePostImg">
						<img src="admin/<?=$post['image']?>" alt="Francoise img">
					</div>
					<p><?= $post['description'] ?></p>
					
				</div>
				
			<?php } ?>	
				<div class="pageSocial">
					<div class="pageSocialWrapper">
						<a href="https://www.facebook.com/shahenda.hemdan.3" target="_blank"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>
					</div>
				</div>

				<div class="relatedPostsBox">
					<h3>related posts</h3>
					<div class="relatedPostsWrap clear">
<?php
$id=$_GET['id'];
foreach($singlepost as $rpost){
$categoryid=$post['categoryid'];
$qrelated="SELECT * FROM `posts` WHERE `categoryid`=$categoryid AND  `id`!=$id";
 $relatedposts= $connect->query($qrelated);
foreach($relatedposts as $rp){
	$id=$rp['id'];
?>
					<a href="single.php?id=<?= $id ?>" class="relatedPostItem">
							<img class="recimage" src="admin/<?= $rp['image'] ?>" alt="Francoise img" height="200">
							<div class="overlayBox">
								<div class="relatedPostDesc">
									<div class="postTime"><?= $rp['date'] ?></div>
									<h4><?= $rp['title'] ?></h4>
								</div>
							</div>
						</a>
					
<?php }} ?>
					</div>
				</div>
<?php 
 $id=$_SESSION['postid'];
$qcountcomment="SELECT COUNT(`id`)  AS 'count' FROM comment WHERE `postId`=$id";
$countcomment=$connect->query($qcountcomment);
foreach($countcomment as $cm){
?>

				<div id="comments" class="commentsBox">
					<h2 class="comments-title"><?= $cm['count'] ?> Comments</h2>
<?php } ?>
					<ol class="comment-list commentList">
						<li id="comment-2" class="comment byuser depth-1 parent">
							<a id="view-comment-2" class="comment-anchor"></a>
<?php 
$qcomment="SELECT * FROM `comment` WHERE `status`='approved' AND `postId`=$id ";
$comment=$connect->query($qcomment);
foreach($comment as $c){
?>
							<article id="div-comment-4" class="comment-body">
								<footer class="comment-meta">
									<div class="comment-author vcard">
										<!-- <img  width="56" height="56" src="images/content/comUser3.jpg" alt="Francoise img"> -->
									</div>
									<div class="reply"> 
										<div>
											<a class="comment-reply-link" href="#">Reply</a>
										</div>
									</div>
								</footer>
								<div class="comment-wrapper">
									<cite class="fn"><?= $c['name'] ?></cite>
									<span class="comment-metadata">
										<a href="#">
											<time datetime="2015-05-05"><?= $c['date'] ?></time>
										</a>
									</span>
									<div class="comment-content">
										<p><?= $c['comment'] ?></p>
									</div>
								</div>
							</article>
<?php }?>
						</li>
					</ol>
					<div id="respond" class="comment-respond">
						<h3 id="reply-title" class="comment-reply-title">POST A COMMENT</h3>
						<form id="commentform" class="comment-form" novalidate="" method="post" action="admin/comments.php?id=<?=$id=$_GET['id']?>">
							<p class="comment-form-author">
								<label>Name*</label>
								<input id="author" type="text" placeholder="" aria-required="true" size="30" value="" name="author">
							</p>
							<p class="comment-form-email">
								<label>Email*</label>
								<input id="email" type="text" placeholder="" aria-required="true" size="30" value="" name="email">
							</p>
							<p class="comment-form-url">
								<label>Website</label>
								<input id="url" type="text" placeholder="" size="30" value="" name="url">
							</p>

							<p class="comment-form-comment">
								<label>Your comment</label>
								<textarea id="comment" placeholder="" aria-required="true" rows="8" cols="45" name="comment"></textarea>
							</p>
							<p class="form-submit clear">
								<input id="submit" class="submit" type="submit" value="Post comment" name="submit">
							</p>
						</form>
					</div>
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
<?php 
$sqlrec="SELECT * FROM `posts` ORDER BY `id` DESC LIMIT 1;";
$rec=$connect->query($sqlrec);
foreach($rec as $r){ 
	$id=$r['id'];
	?>
				<div class="sidebar-widget">
					<h3>Recent post</h3>
					<div class="popularPostsWidget">
						<div class="popularPostsWidgetItem">
							<a href="single.php?id=<?= $id ?>" class="popularPostsItemImg"><img src="admin/<?= $r['image'] ?>" alt="Francoise img"></a>
							<time datetime="2015-05-15"><?= $r['date'] ?></time>
							<h4><a href="#"><?= $r['title'] ?></a></h4>
						</div>
						
					</div>
				</div>
<?php } ?>	
				
			</div>
		
		<div class="clear"></div>
		
	</section>
	
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