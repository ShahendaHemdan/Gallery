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
 <?php $sql="SELECT * FROM category"; 
   $result=$connect->query($sql);
	foreach($result as $r){
		$id=$r['id'];
?>
							<li><a href="category.php?id=<?= $id ?>"><?= $r['name'] ?></a></li>
   <?php } ?>
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