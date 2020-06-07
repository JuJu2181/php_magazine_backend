<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$bread='advertisement';
	include 'inc/header.php';
?>

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-8">
				<?php
                    $Ad = new advertisement();
                    $ad_info = $Ad->getAllAdvertisement();
                    if($ad_info){
                        foreach($ad_info as $key => $ad){
                            if (isset($ad->image) && !empty($ad->image) && file_exists(UPLOAD_PATH.'advertisement/'.$ad->image)) {
                                $thumbnail = UPLOAD_URL.'advertisement/'.$ad->image;
                            }else{
                                $thumbnail = UPLOAD_URL.'noimg.jpg';
                            }
                        ?>
				<h4><br><a href="<?php echo($ad->url) ?>"><?php echo($ad->adTitle)?></a></h4>
				<a href="<?php echo($ad->url) ?>"><img class="img-responsive center-block"
						src="<?php echo($thumbnail); ?>" alt=""></a><br>
				<?php    
                        }
                    }
                    
                    ?>

			</div>

			<!-- aside -->
			<div class="col-md-4">


				<!-- post widget -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Latest Updates</h2>
					</div>

					<?php 
						        $Blog = new blog();
								$recentBlog = $Blog->getAllRecentBlogsWithLimit(0,4);
								if ($recentBlog) {
									foreach ($recentBlog as $key => $blog) {
										if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
							?>
					<!-- post -->


					<div class="post post-thumb">

						<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img
								src="<?php echo($thumbnail); ?>" class="img-responsive" style="height:250px;"></a>
						<div class="post-body">
							<!-- for date with category name -->
							<div class="post-meta">
								<a class="post-category <?php echo CAT_COLOR[$blog->categoryid%4] ?>"
									href="category?id=<?php echo $blog->categoryid ?>"><?php echo $blog->category; ?></a>
								<!-- error ingetting name of category -->
								<span
									class="post-date"><?php echo date("M d, Y",strtotime($blog->created_date)); ?></span>
							</div>
							<h3 class="post-title"><a
									href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>

						</div>
					</div>

					<!-- /post -->
					<?php
									}
								}
							?>
				</div>
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