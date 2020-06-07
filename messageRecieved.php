<?php
 include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
 include 'inc/header.php';
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2 class="text text-success text-center">Thank you for messaging us. We will respond to you soon</h2>
            <br>
            <a href="index" >
            <button class="primary-button center-block " type="button">Return Home</button>
            </a>
            <br><br>
            </div>
    </div>


<!-- row -->
<div class="row">

                <!-- simple ad -->
                <div class="col-md-12">
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
                            <a  href="<?php echo($recentAd[0]->url) ?>"><img class="img-responsive center-block" style = "width:300px;height:250px" src="<?php echo($thumbnail); ?>" alt=""></a>
                            <?php 
                            }
                            ?>
                </div>
                <!-- /ad -->

                 <!-- recentposts   -->
				<div class="col-md-12">
						<div class="section-title">
							<h2>Recent Posts</h2>
						</div>
					</div>

					

					<?php 
						        $Blog = new blog();
								$recentBlog = $Blog->getAllRecentBlogsWithLimit(0,9);
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
								
									<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo($thumbnail); ?>" style="height:200px;"
									class="img-responsive"></a>
									<div class="post-body">
									<!-- for date with category name -->
									<div class="post-meta">
										<a class="post-category <?php echo CAT_COLOR[$blog->categoryid%4] ?>" href="category?id=<?php echo $blog->categoryid ?>"><?php echo $blog->category; ?></a> 
										<!-- error ingetting name of category -->
										<span class="post-date"><?php echo date("M d, Y",strtotime($blog->created_date)); ?></span>
									</div>
										<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>
										
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
</div>


</div>


<?php include 'inc/footer.php'; ?>