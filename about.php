<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$bread='About';
	include 'inc/header.php';
?>

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row static content -->
		<div class="row">
			<div class="col-md-8">
				<div class="section-row">
					<h3>Brawl Stars</h3>
					<p>Brawl Stars is a freemium mobile video game developed and published by the Finnish video game
						company Supercell. Brawl Stars is a multiplayer online battle arena game where players battle
						against other players or AI opponents in multiple game modes. Players can choose between several
						brawlers that they have unlocked, each with their unique offensive or defensive kit. As brawlers
						attack and do damage to enemy brawlers, they build up their special ability, called a "Super".
						Each brawler has their own "Super" ability, which can, for example, spawn a damage-dealing
						turret or a complete heal. Each brawler also has two unlockable (passive) abilities called "Star
						Powers", which can be found in "Brawl Boxes" (the game's version of a loot box), or inside the
						in-game shop once the brawler reaches their maximum power level. Furthermore each brawler also
						has one unlockable ability called a "Gadget". A brawler's gadget appear in Brawl Boxes and in
						the shop once that brawler reaches power level 7. These abilities are, once unlocked, usable 3
						times per match and are activated by pressing a certain "Gadget button". Additional brawlers can
						be obtained through Brawl Boxes as well. In addition, it is possible to purchase "skins" in the
						shop, which may alter the appearance, animations or sounds of Brawlers.</p>
					<figure class="figure-img">
						<img class="img-responsive" src="./assets/img/BS/brawldef.jpg" alt="">
					</figure>
					<p>Brawl Stars has a variety of different game modes that players can choose from, each one having a
						different objective. Players can invite friends to play with them up to the maximum team size of
						the game mode.</p>
				</div>
				<div class="row section-row">
					<div class="col-md-6">
						<figure class="figure-img">
							<img class="img-responsive" src="./assets/img/BS/brawlmag.png" alt="">
						</figure>
					</div>
					<div class="col-md-6">
						<h3>About BrawlMag</h3>
						<p>BrawlMag is an online magazine developed to provide quality news and informations about all
							the latest updates of Brawl Stars. </p>
						<ul class="list-style">
							<li>
								<p>Our main goal is provide everyday updates on Brawl Stars.</p>
							</li>
							<li>
								<p>We also provide information about various components of brawl stars</p>
							</li>
							<li>
								<p>Thsi is not an official website of brawl stars and is developed only for
									entertainment purpose</p>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<!-- aside latest updates-->
			<div class="col-md-4">
				<!-- simple ad -->
				<div class="aside-widget text-center">
					<?php 
									$Ad = new advertisement();
									$recentAd=$Ad->getLatestAdByType('Simple');
									if (isset($recentAd[0]) && !empty($recentAd[0])) {
										//checking if the image exists or not
										if (isset($recentAd[0]->image) && !empty($recentAd[0]->image) && file_exists(UPLOAD_PATH.'advertisement/'.$recentAd[0]->image)) {
											$thumbnail = UPLOAD_URL.'advertisement/'.$recentAd[0]->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
								    ?>
					<a href="<?php echo($recentAd[0]->url) ?>"><img class="img-responsive center-block"
							style="width:300px;height:250px" src="<?php echo($thumbnail); ?>" alt=""></a>
					<?php 
									}
									?>
				</div>
				<!-- /ad -->

				<!-- post widget -->
				<div <div class="aside-widget">
					<div class="section-title">
						<h2>Most Read</h2>
					</div>

					<?php 
							$BLog = new blog();
								$popularBlog = $Blog->getAllPopularBlogsWithLimit(0,8);
								if ($popularBlog) {
									foreach ($popularBlog as $key => $blog) {
										if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
							?>
					<div class="post post-widget">
						<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img
								src="<?php echo($thumbnail); ?>" class="img-responsive"></a>
						<div class="post-body">
							<h3 class="post-title"><a
									href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>
						</div>
					</div>

					<?php
									}
								}
							?>


				</div>
				<!-- /post widget -->
			</div>
			<!-- /aside -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<?php include 'inc/footer.php'; ?>