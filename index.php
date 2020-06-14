<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	include 'inc/header.php';
 ?>


<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row featured posts-->
		<div class="row">
			<!-- post -->
			<!-- <div class="col-md-6">
						<div class="post post-thumb">
							<a class="post-img" href="blog-post"><img src="./assets/img/post-1.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="category">JavaScript</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
							</div>
						</div>
					</div> -->
			<!-- /post -->

			<!-- post -->
			<!-- <div class="col-md-6">
						<div class="post post-thumb">
							<a class="post-img" href="blog-post"><img src="./assets/img/post-2.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-3" href="category">Jquery</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post">Ask HN: Does Anybody Still Use JQuery?</a></h3>
							</div>
						</div>
					</div> -->
			<!-- /post -->

			<!-- recent featured posts on side bar -->
			<?php 
						        $Blog = new blog();
								$recentBlog = $Blog->getAllFeaturedBlogsWithLimit(0,2);
								if ($recentBlog) {
									foreach ($recentBlog as $key => $blog) {
										if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
							?>
			<!-- post -->
			<div class="col-md-6">

				<div class="post post-thumb">

					<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img
							src="<?php echo($thumbnail); ?>" style="height:350px;" class="img-responsive"></a>
					<div class="post-body">
						<!-- for date with category name -->
						<div class="post-meta">
							<a class="post-category <?php echo CAT_COLOR[$blog->categoryid%4] ?>"
								href="category?id=<?php echo $blog->categoryid ?>"><?php echo $blog->category; ?></a>
							<!-- error ingetting name of category -->
							<span class="post-date"><?php echo date("M d, Y",strtotime($blog->created_date)); ?></span>
						</div>
						<h3 class="post-title"><a
								href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>

					</div>
				</div>
			</div>
			<!-- /post -->
			<?php
									}
								}
							?>
		</div>
		<!-- /row -->

		<!-- row recent posts-->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Recent Posts</h2>
				</div>
			</div>

			<!-- post -->
			<!-- <div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post"><img src="./assets/img/post-3.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-1" href="category">Web Design</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
							</div>
						</div>
					</div> -->
			<!-- /post -->

			<?php 
						        $Blog = new blog();
								$recentBlog = $Blog->getAllRecentBlogsWithLimit(0,6);
								if ($recentBlog) {
									foreach ($recentBlog as $key => $blog) {
										if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
							?>
			<!-- post -->
			<div class="col-md-4">

				<div class="post ">

					<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img
							src="<?php echo($thumbnail); ?>" style="height:200px;" class="img-responsive"></a>
					<div class="post-body">
						<!-- for date with category name -->
						<div class="post-meta">
							<a class="post-category <?php echo CAT_COLOR[$blog->categoryid%4] ?>"
								href="category?id=<?php echo $blog->categoryid ?>"><?php echo $blog->category; ?></a>
							<!-- error ingetting name of category -->
							<span class="post-date"><?php echo date("M d, Y",strtotime($blog->created_date)); ?></span>
						</div>
						<h3 class="post-title"><a
								href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>

					</div>
				</div>
			</div>
			<!-- /post -->
			<?php
									}
								}
							?>
		</div>
		<!-- /row -->

		<!-- row -->
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<!-- old posts  -->
					<div class="col-md-12">
						<div class="section-title">
							<h2>Oldest Post</h2>
						</div>
					</div>
					<?php 
						        $Blog = new blog();
								$recentBlog = $Blog->getAllOldBlogsWithLimit(0,1);
								if ($recentBlog) {
									foreach ($recentBlog as $key => $blog) {
										if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
							?>
					<!-- post -->
					<div class="col-md-12">

						<div class="post post-thumb">

							<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img
									src="<?php echo($thumbnail); ?>" class="img-responsive" style="height:500px;"></a>
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
					</div>
					<!-- /post -->
					<?php
									}
								}
							?>
					<!-- old posts  -->
					<div class="col-md-12">
						<div class="section-title">
							<h2>Non Featured Posts</h2>
						</div>
					</div>
					<!-- post -->

					<?php 
						        $Blog = new blog();
								$recentBlog = $Blog->getAllNonFeaturedBlogsWithLimit(0,6);
								if ($recentBlog) {
									foreach ($recentBlog as $key => $blog) {
										if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
							?>
					<!-- post -->
					<div class="col-md-6">

						<div class="post ">

							<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img
									src="<?php echo($thumbnail); ?>" style="height:200px;" class="img-responsive"></a>
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
					</div>
					<!-- /post -->
					<?php
									}
								}
							?>
					<!-- /post -->


					<!-- /post -->
				</div>
			</div>
              <!-- side widget -->
			<div class="col-md-4">
				<!-- post widget Most Read-->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Most Read</h2>
					</div>

					<?php 
								$popularBlog = $Blog->getAllPopularBlogsWithLimit(0,4);
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
								src="<?php echo($thumbnail); ?>" class="img-responsive" style="height:60px"></a>
						<div class="post-body">
							<h3 class="post-title"><a
									href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>
									<p><?php echo($blog->view == ""? 0:$blog->view) ?> Views</p>
						</div>
					</div>

					<?php
									}
								}
							?>
				</div>			
					<!-- /post widget -->

					<!-- post widget Featured Posts-->
					<div class="aside-widget">
						<div class="section-title">
							<h2>Featured Posts</h2>
						</div>
						<?php 
						        $Blog = new blog();
								$recentBlog = $Blog->getAllFeaturedBlogsWithLimit(0,2);
								if ($recentBlog) {
									foreach ($recentBlog as $key => $blog) {
										if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
							?>
						<!-- post -->
						<div class="col-md-12">

							<div class="post post-thumb">

								<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img
										src="<?php echo($thumbnail); ?>" style="height:200px;"
										class="img-responsive"></a>
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
											href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a>
									</h3>

								</div>
							</div>
						</div>
						<!-- /post -->
						<?php
									}
								}
							?>
					</div>
					<!-- /post widget -->

					<!-- simple ad -->
					<div class="aside-widget text-center">
						<!-- <a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./assets/img/ad-1.jpg" alt="">
							</a> -->
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
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row featured posts-->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2>Featured Posts</h2>
					</div>
				</div>

				<!-- post -->
				<?php 
						        $Blog = new blog();
								$recentBlog = $Blog->getAllFeaturedBlogsWithLimit(0,3);
								if ($recentBlog) {
									foreach ($recentBlog as $key => $blog) {
										if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
							?>
				<!-- post -->
				<div class="col-md-4">

					<div class="post ">

						<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img
								src="<?php echo($thumbnail); ?>" style="height:300px;" class="img-responsive"></a>
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
				</div>
				<!-- /post -->
				<?php
									}
								}
							?>

			</div>
			<!-- /post -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- most read -->
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2>Most Read</h2>
						</div>
					</div>
					<!-- post -->
					<div class="col-md-12">
						<?php 
								$popularBlog = $Blog->getAllPopularBlogs();
								if ($popularBlog) {
									foreach ($popularBlog as $key => $blog) {
										if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
							?>
						<div class="post post-row loadPost">
							<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img
									src="<?php echo($thumbnail); ?>" alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a
										href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>
								<div class="post-meta">
									<a class="post-category <?php echo CAT_COLOR[$blog->categoryid%4] ?>"
										href="category?id=<?php echo $blog->categoryid ?>"><?php echo $blog->category; ?></a>
									<!-- error ingetting name of category -->
									<span
										class="post-date"><?php echo date("M d, Y",strtotime($blog->created_date)); ?></span>
										<br><br><p><?php echo($blog->view == ""? 0:$blog->view) ?> Views</p>
								</div>
							</div>
						</div>

						<?php
									}
								}
							?>
					</div>
					<!-- /post -->



					<div class="col-md-12">
						<div class="section-row">
							<button class="primary-button center-block" id = "loadMore">Load More</button>
						</div>
					</div>
				</div>
			</div>
        <!-- side ad categories -->
			<div class="col-md-4">
				<!-- simple ad -->
				<div class="aside-widget text-center">
					<!-- <a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./assets/img/ad-1.jpg" alt="">
							</a> -->
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

				<!-- catagories -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Catagories</h2>
					</div>
					<div class="category-widget">
						<ul>
							<?php 
										if ($categories) {
											foreach ($categories as $key => $category) {
									?>
							<li><a href="category?id=<?php echo $category->id ?>"
									class="<?php echo CAT_COLOR[$category->id%4] ?>"><?php echo($category->categoryname) ?><span>
										<?php 
										//to get count of no of posts
											$Count = $Blog->getNumberBlogByCategory($category->id);
											echo $Count[0]->total;
										?>
									</span></a></li>
							<?php
											}
										}
									?>

						</ul>
					</div>
				</div>
				<!-- /catagories -->


				<!-- tags -->
				<div class="aside-widget">
					<div class="tags-widget">

						<ul>
							<?php 
								#to update categories dynamically 
									$Category = new category();
									$categories = $Category->getAllCategory();
									if ($categories) {
										foreach ($categories as $key => $category) {
								?>

							<li><a
									href="category?id=<?php echo $category->id ?>"><?php echo $category->categoryname; ?></a>
							</li>
							<?php
										}
									}
								?>

						</ul>
					</div>
				</div>
				<!-- /tags -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->
<?php include 'inc/footer.php'; ?>
