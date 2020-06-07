<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$blog_id = (int)$_GET['id'];
		if ($blog_id) {
			$Blog = new blog();
			$blog_info = $Blog->getBlogbyId($blog_id);
		}else{
			redirect('index');
		}
	}else{
		redirect('index');
	}
	include 'inc/header.php';
 ?>

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- aside main comments-->
			<div class="col-md-8">

				<!-- post widget Comments-->
				<div class="post-comments">
					<h1>All
						<?php 
										$Comment = new comment(); 
										$count=$Comment->getNumberCommentByBlog($blog_id);
										echo $count[0]->total;
									?>
						Comments For :<br> <br><?php echo $blog_info[0]->title; ?></h1>
					<!-- /comment -->
					<br><br>
					<?php 
                                $Comment = new comment(); 
									$comments = $Comment->getAllAcceptCommentByBlog($blog_id);
									if ($comments) {
										foreach ($comments as $key => $comment) {
								?>
					<!-- comment -->
					<div class="media">
						<div class="media-left">
							<img class="media-object" src="./assets/img/avatar.png" alt="">
						</div>
						<div class="media-body">
							<div class="media-heading">
								<h4><?php echo $comment->name; ?></h4>
								<span
									class="time"><?php echo date("M d, Y h:i:s a",strtotime($comment->created_date)); ?></span>
								<a href="#ReplySection" class="reply" onclick="comment(this);"
									data-commentID="<?php echo ($comment->id) ?>">Reply</a>
							</div>
							<p><?php echo html_entity_decode($comment->message); ?></p>

							<?php 
											$replies=$Comment->getAllAcceptReplyByBlogByComment($blog_id,$comment->id);
											if ($replies) {
												foreach ($replies as $key => $reply) {
										?>
							<!-- reply -->
							<div class="media">
								<div class="media-left">
									<img class="media-object" src="./assets/img/avatar.png" alt="">
								</div>
								<div class="media-body">
									<div class="media-heading">
										<h4><?php echo $reply->name; ?></h4>
										<span
											class="time"><?php echo date('M d, Y h:i:s a',strtotime($reply->created_date)); ?></span>
										<a href="#ReplySection" class="reply" onclick="comment(this);"
											data-commentID="<?php echo ($comment->id) ?>">Reply</a>
									</div>
									<p><?php echo $reply->message; ?></p>
								</div>
							</div>
							<!-- /reply -->
							<?php
												}
											}

										?>

						</div>
					</div>
					<!-- /comment -->
					<?php
										}
									}
								?>

				</div>
				<!-- /post widget -->
				<br>
				<!-- wide ad -->
				<div class="col-md-12">
					<div class="section-row">
						<!-- <a href="#">
										<img class="img-responsive center-block" src="./assets/img/ad-2.jpg" alt="">
									</a> -->
						<?php 
									$Ad = new advertisement();
									$recentAd=$Ad->getLatestAdByType('Wide');
									if (isset($recentAd[0]) && !empty($recentAd[0])) {
										//checking if the image exists or not
										if (isset($recentAd[0]->image) && !empty($recentAd[0]->image) && file_exists(UPLOAD_PATH.'advertisement/'.$recentAd[0]->image)) {
											$thumbnail = UPLOAD_URL.'advertisement/'.$recentAd[0]->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
								    ?>
						<a href="<?php echo($recentAd[0]->url) ?>"><img class="img-responsive center-block"
								style="width:728px;height:90px" src="<?php echo($thumbnail); ?>" alt=""></a>
						<?php 
									}
									?>
					</div>
				</div>
				<!-- ad -->
				<!-- reply -->
				<div class="section-row" id="ReplySection">
					<div class="section-title">
						<h2>Leave a reply</h2>
						<p>Your email address will not be published. required fields are marked *</p>
					</div>
					<form class="post-reply" action="process/comment" method="post">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<span>Name *</span>
									<input class="input" type="text" name="name" required="">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<span>Email *</span>
									<input class="input" type="email" name="email" required="">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<span>Website</span>
									<input class="input" type="text" name="website">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="input" name="message" placeholder="Message" required=""></textarea>
								</div>
								<input type="hidden" name="commentid" id="comment_id" value="">
								<input type="hidden" name="blogid" value="<?php echo($blog_id) ?>">
								<button class="primary-button" type="submit">Submit</button>
							</div>
						</div>
					</form>
				</div>
				<!-- /reply -->
			</div>


			<!-- /aside  side column-->
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
					<a href="<?php echo($recentAd[0]->url) ?>" style="display: inline-block;margin: auto;"><img
							class="img-responsive center-block" style="width:300px;height:250px"
							src="<?php echo($thumbnail); ?>" alt=""></a>
					<?php 
									}
									?>
				</div>
				<!-- /ad -->

				<!-- Latest updates-->
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
	    <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<?php include 'inc/footer.php'; ?>
<script>
	function comment(element) {
		var id = $(element).data();
		console.log(id.commentid);
		$('#comment_id').val(id.commentid);
	}
</script>