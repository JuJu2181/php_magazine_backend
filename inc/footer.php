<!-- Footer -->
<footer id="footer">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-5">
				<div class="footer-widget">
					<div class="footer-logo">
						<a href="index" class="logo"><img src="./assets/img/BS/logo.png" alt=""></a>
					</div>
					<ul class="footer-nav">
						<li><a href="blank">Privacy Policy</a></li>
						<li><a href="advertisement">Advertisement</a></li>
					</ul>
					<div class="footer-copyright">
						<span>&copy;
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script> All rights reserved | BrawlMag is developed by <i class="fa fa-star-o"
								aria-hidden="true"></i> by <a href="#" target="_blank">JuJu Gaming</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6">
						<div class="footer-widget">
							<h3 class="footer-title">About Us</h3>
							<ul class="footer-links">
								<li><a href="about">About Us</a></li>

								<li><a href="contact">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="footer-widget">
							<h3 class="footer-title">Catagories</h3>

							<ul class="footer-links">
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
				</div>
			</div>
			<div class="col-md-3">
				<div class="footer-widget">
					<h3 class="footer-title">Join our Community</h3>
					<!-- <div class="footer-newsletter">
								<form>
									<input class="input" type="email" name="newsletter" placeholder="Enter your email">
									<button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
								</form>
							</div> -->
					<ul class="footer-social">
						<?php 
							$Social = new social(); 
							$socialicons = $Social->getAllSocialIcons();
							if($socialicons){
								foreach($socialicons as $key => $socialicon){
							?>
						<li><a href="<?php echo $socialicon->url;?>"><i
									class="<?php echo ('fa fa-'.strtolower($socialicon->iconname));?>"></i></a></li>

						<?php		
								}
							}
							?>
					</ul>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</footer>
<!-- /Footer -->
<!-- jQuery Plugins -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>