<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$Comment = new comment();
	debugger($_POST);
	if ($_POST) {
		$act='Add';
		$data = array(
				'name'=>sanitize($_POST['name']),
				'email'=>filter_var($_POST['email'],FILTER_VALIDATE_EMAIL),
				'website'=>sanitize($_POST['website']),
				'message' => sanitize(htmlentities($_POST['message'])),
				'status' => 'Active',
				'blogid' =>(int)$_POST['blogid'],
				'state'=>'waiting'
			);
		// debugger($data);

		if (isset($_POST['commentid']) && !empty($_POST['commentid'])) {
			//Reply
			$comment_id = (int)$_POST['commentid'];
			$data['commentType'] = 'reply';
			$data['commentid'] = $comment_id;
		}else{
			//Comment
			$comment_id= false;
			$data['commentType'] = 'comment';
		}

		if ($comment_id) {
			$comment_info = $Comment->getCommentbyId($comment_id);
			if ($comment_info) {
				$success = $Comment->addComment($data);
			}else{
				redirect('../blog-post?id='.$data['blogid'],'error','Comment not Found');
			}
		}else{
			$success = $Comment->addComment($data);
		}
		if ($success) {
			redirect('../blog-post?id='.$data['blogid'],'success','Comment '.$act.'ed Successfully');
		}else{
			redirect('../blog-post?id='.$data['blogid'],'error','Problem while '.$act.'ing Comment');
		}
	}