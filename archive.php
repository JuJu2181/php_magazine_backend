<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$bread='Blank';
	include 'inc/header.php';

	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$archive_id = (int)$_GET['id'];
		if ($archive_id) {
			$Archive = new archive();
			$archive_info = $Archive->getArchivebyId($archive_id);
			if ($archive_info) {
				$archive_info= $archive_info[0];
			}else{
				redirect('index');
			}
		}else{
			redirect('index');
		}
	}else{
		redirect('index');
	}
?>

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- archives -->
			<div class="col-md-8">

				<!-- post widget -->
				<div class="aside-widget">
					<div class="section-title">
						<h2><?php echo date('M d, Y',strtotime($archive_info->date)); ?></h2>
					</div>

					<?php 
								$Blog = new blog();
								$blogs = $Blog->getBlogbyDate($archive_info->date);
								if ($blogs) {
									foreach ($blogs as $key => $blog) {
										if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
							?>
					<div class="post post-widget">
						<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img
								src="<?php echo $thumbnail; ?>" alt=""></a>
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
			<!-- /aside latest updates-->
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

<!-- /section -->

<?php include 'inc/footer.php'; ?>