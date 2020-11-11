<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$blog_id = (int)$_GET['id'];
		if ($blog_id) {
			$Blog = new blog();
			$blog_info = $Blog->getBlogbyId($blog_id);
			if ($blog_info) {
				$blog_info= $blog_info[0];
				$data=array(
					'view' => $blog_info->view + 1
				);
				$Blog->updateBlogById($data,$blog_id);
			}else{
				redirect('index');
			}
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
			<!-- Post content -->
			<div class="col-md-8">
				<div class="section-row sticky-container">
					<div class="main-post">
						<?php echo html_entity_decode($blog_info->content); ?>
					</div>

							<div class="a2a_kit a2a_kit_size_40 sticky-shares post-shares">
                               <a class="a2a_button_facebook"></a>
                               <a class="a2a_button_twitter"></a>
							   <a class="a2a_button_reddit"></a>
							   <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                            </div>
                               <script async src="https://static.addtoany.com/menu/page.js"></script>
					<!-- social icons			 -->
					<!-- <div class="post-shares sticky-shares">
						<?php 
							// $Social = new social(); 
							// $socialicons = $Social->getAllSocialIcons();
							// if($socialicons){
							// 	foreach($socialicons as $key => $socialicon){
							?>
						<!-- <a href="<?php //echo $socialicon->url;?>"
							class="<?php //echo('share-'.strtolower($socialicon->iconname));?>"><i
								class="<?php //echo ('fa fa-'.strtolower($socialicon->iconname));?>"></i></a> -->
						<?php		
							//	}
							//}
							?>
					<!-- </div>  -->

					
				</div>


				<!-- wide ad -->
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
					<a href="<?php echo($recentAd[0]->url) ?>" style="display: inline-block;margin: auto;"><img
							class="img-responsive center-block" style="width:728px;height:90px"
							src="<?php echo($thumbnail); ?>" alt=""></a>
					<?php 
									}
									?>
				</div>
				<!-- ad -->
				<!-- post image	 -->
				<?php
				    if (pathinfo($_SERVER['PHP_SELF'],PATHINFO_FILENAME)=='blog-post') {
					if (isset($blog_info->image) && !empty($blog_info->image) && file_exists(UPLOAD_PATH.'blog/'.$blog_info->image)) {
						$thumbnail = UPLOAD_URL.'blog/'.$blog_info->image;
					}else{
						$thumbnail = UPLOAD_URL.'noimg.jpg';
					}
					?>
				<div class="section-row">
					<img src="<?php echo $thumbnail ?>" class="img-responsive center-block" style="width:800px;">
				</div>
				<?php
						}
					?>
				<!-- post image	 -->
				<!-- author -->
				<h2>About Author</h2>
				<div class="section-row">
					<div class="post-author">
						<div class="media">
							<div class="media-left">
								<img class="media-object" src="./assets/img/BS/brawlmag.png" alt="">
							</div>
							<div class="media-body">
								<div class="media-heading">
									<h3>BrawlMag</h3>
								</div>
								<p>BrawlMag is an online magazine developed to provide quality news and informations
									about all the latest updates of Brawl Stars. </p>
								<ul class="author-social">
									<?php 
										$Social = new social(); 
										$socialicons = $Social->getAllSocialIcons();
										if($socialicons){
											foreach($socialicons as $key => $socialicon){
										?>
									<li><a href="<?php echo $socialicon->url;?>"><i
												class="<?php echo ('fa fa-'.strtolower($socialicon->iconname));?>"></i></a>
									</li>

									<?php		
											}
										}
										?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /author -->

				<!-- comments -->
				<div class="section-row">
				    <!-- No of comments -->
					<div class="section-title">
						<h2>
							<?php 
										$Comment = new comment(); 
										$count=$Comment->getNumberCommentByBlog($blog_id);
										echo $count[0]->total;
									?>
							Comments
						</h2>
					</div>

					<div class="post-comments">
						<!-- comment -->
						<!-- <div class="media">
									<div class="media-left">
										<img class="media-object" src="./assets/img/avatar.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4>John Doe</h4>
											<span class="time">March 27, 2018 at 8:00 am</span>
											<a href="#" class="reply">Reply</a>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										comment
										<div class="media">
											<div class="media-left">
												<img class="media-object" src="./assets/img/avatar.png" alt="">
											</div>
											<div class="media-body">
												<div class="media-heading">
													<h4>John Doe</h4>
													<span class="time">March 27, 2018 at 8:00 am</span>
													<a href="#" class="reply">Reply</a>
												</div>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
											</div>
										</div>
										/comment
									</div>
								</div> -->
						<!-- /comment -->

						<?php 
									$comments = $Comment->getAllAcceptCommentByBlogWithLimit($blog_id,0,3);
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
											$replies=$Comment->getAllAcceptReplyByBlogByCommentWithLimit($blog_id,$comment->id,0,1);
											if ($replies) {
												foreach ($replies as $key => $reply) {
										?>

								<!-- reply -->

								<div class="media">
									<div>
										<?php 
										$Reply = new comment(); 
										$count1=$Reply->getNumberReplyCommentByBlog($blog_id);
										//echo $count1[0]->total;
									    ?>
										<!-- Replies  -->
									</div>
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
										<?php
												if($count1[0]->total > 1){
												?>
										<a href="allComments?id=<?php echo($blog_id)?>">
											View All
										</a>
										<?php 	  
												}
												?>
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
				</div>
				<!-- /comments -->
				<!-- only display view all button if no of comments are greater than 3 -->
				<?php
						  if($count[0]->total > 3){
						?>
				<div class="col-md-12">
					<div class="section-row">
						<a href="allComments?id=<?php echo($blog_id)?>">
							<button class="primary-button center-block">View All</button>
					</div>
					</a>
				</div>
				<?php 	  
						  }
						?>

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
			<!-- /Post content -->

			<!-- aside -->
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
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<?php include 'inc/footer.php';; ?>
	<script>
		$('blockquote').addClass('blockquote');

		function comment(element) {
			var id = $(element).data();
			console.log(id.commentid);
			$('#comment_id').val(id.commentid);
		}
	</script>