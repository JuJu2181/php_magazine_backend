<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$header=$_POST['search'];
	include 'inc/header.php';
	// debugger($_POST,true);
	if($_POST['search']){
		$search_key=$_POST['search'];
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
					<div class="col-md-8">
						<?php 
							$Blog = new blog();
                            $blogs = $Blog->getBlogbySearchKey($search_key);
                            //debugger($blogs,true);
                            $Count = $Blog->getNumberBlogBySearchText($search_key);
                            
							if ($blogs) {
                                echo "<h3>All the search results for '".$search_key."' <br>".$Count[0]->total." Items Found <br><br></h3>";
								foreach ($blogs as $search_key => $blog) {
									if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
										$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
									}else{
										$thumbnail = UPLOAD_URL.'noimg.jpg';
									}
						?>
						<div class="post post-widget">
							<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo $thumbnail; ?>" class="img-responsive" style="height:75px;"></a>
							<div class="post-body">
                            <div class="post-meta">
							<a class="post-category <?php echo CAT_COLOR[$blog->categoryid%4] ?>"
								href="category?id=<?php echo $blog->categoryid ?>"><?php echo $blog->category; ?></a>
							<span class="post-date"><?php echo date("M d, Y",strtotime($blog->created_date)); ?></span>
						</div>
								<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>
                                <p><?php echo($blog->view == ""? 0:$blog->view) ?> Views</p>
							</div>
						</div>

						<?php
								}
							}else{
                                echo "<h3>Sorry, No search results were found for '".$search_key."' .<br> <br>Try Searching something else</h3>";
                            }
						?>
					</div>

                     <!-- /aside latest updates-->
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
                    <!-- /row -->
                </div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<?php include 'inc/footer.php'; ?>