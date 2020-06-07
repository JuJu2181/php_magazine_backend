<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$Message = new message();
	debugger($_POST);
	if ($_POST) {
		$act='Add';
		$data = array(
				'email'=>filter_var($_POST['email'],FILTER_VALIDATE_EMAIL),
				'subject'=>sanitize($_POST['subject']),
				'message' => sanitize(htmlentities($_POST['message'])),
				'status' => 'Active',
				'state'=>'waiting'
			);
		// debugger($data);

		if ($message_id) {
			$message_info = $Message->getMessagebyId($message_id);
			if ($message_info) {
				$success = $Message->addMessage($data);
			}else{
				redirect('../contact','error','Message not Found');
			}
		}else{
			$success = $Message->addMessage($data);
		}
		if ($success) {
			redirect('../messageRecieved','success','Message '.$act.'ed Successfully');
		}else{
			redirect('../contact','error','Problem while '.$act.'ing Message');
		}
	}