<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$Newsletter = new newsletter();
	debugger($_POST);
	if ($_POST) {
		$act='Add';
		$data = array(
				'email'=>filter_var($_POST['email'],FILTER_VALIDATE_EMAIL),
				'status' => 'Active',
			);
		// debugger($data);

			$newsletter_info = $Newsletter->getNewsletterbyEmail($data['email']);
			if ($newsletter_info) {
				// $success = $Newsletter->addNewsletter($data);
				redirect('../index','success','You have already subscribed to our newsletter. Thank you');
			}else{
				$success = $Newsletter->addNewsletter($data);
			}
		
		if ($success) {
			redirect('../subscriber','success','Newsletter '.$act.'ed Successfully');
		}else{
			redirect('../index','error','Problem while '.$act.'ing Newsletter');
		}
	}