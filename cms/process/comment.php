<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$Comment = new comment();
	debugger($_GET);
	if ($_GET) {
		if (isset($_GET['id']) && !empty($_GET['id'])) {
			$comment_id = (int)$_GET['id'];
			if ($comment_id) {
				$accept_act = substr(md5("Accept-Comment-".$comment_id.$_SESSION['token']), 3,15);
				$reject_act = substr(md5("Reject-Comment-".$comment_id.$_SESSION['token']), 3,15);
				if ($accept_act == $_GET['act']) {
					$comment_info = $Comment->getCommentbyId($comment_id);
					if ($comment_info) {
						$data = array(
							'state'=>'accept'
						);
						$success = $Comment->updateCommentById($data,$comment_id);
						if ($success) {
							redirect('../comment','success','Comment Accepted Successfully');
						}else{
							redirect('../comment','error','Error while Accepting Comment');
						}
					}else{
						redirect('../comment','error','Comment not Found');
					}
				}else if($reject_act == $_GET['act']){
					$comment_info = $Comment->getCommentbyId($comment_id);
					if ($comment_info) {
						$data = array(
							'state'=>'reject'
						);
						$success = $Comment->updateCommentById($data,$comment_id);
						if ($success) {
							redirect('../comment','success','Comment Rejected Successfully');
						}else{
							redirect('../comment','error','Error while Rejecting Comment');
						}
					}else{
						redirect('../comment','error','Comment not Found');
					}
				}else{
					redirect('../comment','error','Invalid Action');
				}
			}else{
				redirect('../comment','error','ID is invalid');
			}
		}else{
			redirect('../comment','error','ID is required');
		}
	}else{
		redirect('../comment','error','Unauthorized Access');
	}
?>