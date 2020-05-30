<?php
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	
	$SocialIcons = new social();
	   //debugger($_POST);
	   //debugger($_FILES);
	if($_POST){
		$data = array(
			'iconname'=>sanitize($_POST['iconname']),
			'url' => filter_var($_POST['url'],FILTER_VALIDATE_URL),
			'status' =>	'Active',
			'added_by' => $_SESSION['user_id']
		);
				

	if (isset($_POST['id']) && !empty($_POST['id'])) {
		$act = 'Updat';
		$socialicons_id = (int)$_POST['id'];
	}else{
		$act = 'Add';
		$socialicons_id = false;
	}

	if ($socialicons_id) {
		$socialicons_info = $SocialIcons->getSocialIconsbyId($socialicons_id);
		if ($socialicons_info) {
			if ($_SESSION['user_id'] == $socialicons_info[0]->added_by) {
				// $SocialIcons>addSocialIcons($data);
				$success = $SocialIcons->updateSocialIconsbyId($data,$socialicons_id);
			}else{
				redirect('../social-icons','error','You are not allowed to edit.');
			}
		}else{
			redirect('../social-icons','error','SocialIcons Not Found');
		}
	}else{		//Add	
	$success = $SocialIcons->addSocialIcons($data);
	}
	if ($success) {
		redirect('../social-icons','success','SocialIcons '.$act.'ed Succesfully');
	}else{
		redirect('../social-icons','error','Problem While '.$act.'ing SocialIcons');
	}
}else if ($_GET) {		//Delete
	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$socialicons_id = (int)$_GET['id'];
		if ($socialicons_id) {
			$act = substr(md5("Delete-SocialIcons-".$socialicons_id.$_SESSION['token']), 3,15);
			if ($act) {
				if ($act == $_GET['act']){
					$socialicons_info = $SocialIcons->getSocialIconsbyId($socialicons_id);
					if ($socialicons_info) {
						$data =  array(
							'status'=>'Passive'
							);
						$success = $SocialIcons->updateSocialIconsbyId($data,$socialicons_id);
						if ($success) {
							redirect('../social-icons','success','SocialIcons Deleted Succesfully.');
						}else{
							redirect('../social-icons','error','Error while Deleting.');
						}
					} else {
						redirect('../social-icons','error','SocialIcons Not Found.');
					}
				}else{
					redirect('../social-icons','error',"Invalid Action");
				}
			}else{
				redirect('../social-icons','error','action is required');
			}
		}else{
			redirect('../social-icons','error','Id is Invalid');
		}
	}else{
		redirect('../social-icons','error','Id is required.');
	}
}
else{
	redirect('../social-icons','error','Error Occurs during submitting');
}
?>