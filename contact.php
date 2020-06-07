<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php'; #$_SERVER['DOCUMENT_ROOT] returns magazine.com
	$bread='Contact';
	include 'inc/header.php';
?>

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-6">
						<div class="section-row">
							<h3>Contact Information</h3>
							<p>BrawlMag is simply a project developed by Anish Shilpakar on the behalf of completing the PHP course provided by Khwopa College Of Engineering.</p>
							<ul class="list-style">
								<li><p><strong>Email:</strong> <a href="#">BrawlMag@gmail.com</a></p></li>
								<li><p><strong>Phone:</strong> +977-98XXXXXXXX</p></li>
								<li><p><strong>Address:</strong> Bhaktapur, Nepal</p></li>
							</ul>
						</div>
					</div>
					<div class="col-md-5 col-md-offset-1">
						<div class="section-row">
							<h3>Send A Message</h3>
							<form action="process/message" method="post">
								<div class="row">
									<div class="col-md-7">
										<div class="form-group">
											<span>Email</span>
											<input class="input" type="email" name="email" required="">
										</div>
									</div>
									<div class="col-md-7">
										<div class="form-group">
											<span>Subject</span>
											<input class="input" type="text" name="subject" required="">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="input" name="message" placeholder="Message" required=""></textarea>
										</div>
										<input type="hidden" name="messageid" id="message_id" value="">
										<button class="primary-button" type="submit">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<?php include 'inc/footer.php'; ?>