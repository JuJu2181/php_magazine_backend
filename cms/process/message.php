<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$Message = new message();
	debugger($_GET);
	if ($_GET) {
		if (isset($_GET['id']) && !empty($_GET['id'])) {
			$message_id = (int)$_GET['id'];
			if ($message_id) {
				$accept_act = substr(md5("Accept-Message-".$message_id.$_SESSION['token']), 3,15);
				$reject_act = substr(md5("Reject-Message-".$message_id.$_SESSION['token']), 3,15);
                $act = substr(md5("Delete-Message-".$message_id.$_SESSION['token']), 3,15);
                if ($accept_act == $_GET['act']) {
					$message_info = $Message->getMessagebyId($message_id);
					if ($message_info) {
						$data = array(
							'state'=>'accept'
						);
						$success = $Message->updateMessageById($data,$message_id);
						if ($success) {
							redirect('../message','success','Message Accepted Successfully');
						}else{
							redirect('../message','error','Error while Accepting Message');
						}
					}else{
						redirect('../message','error','Message not Found');
					}
				}else if($reject_act == $_GET['act']){
					$message_info = $Message->getMessagebyId($message_id);
					if ($message_info) {
						$data = array(
							'state'=>'reject'
						);
						$success = $Message->updateMessageById($data,$message_id);
						if ($success) {
							redirect('../message','success','Message Rejected Successfully');
						}else{
							redirect('../message','error','Error while Rejecting Message');
						}
					}else{
						redirect('../message','error','Message not Found');
					}
				}else if ($act == $_GET['act']) {
					$message_info = $Message->getMessagebyId($message_id);
					if ($message_info) {
						$data = array(
							'status'=>'Passive'
						);
						$success = $Message->updateMessageById($data,$message_id);
						if ($success) {
							redirect('../allmessage','success','Message Deleted Successfully');
						}else{
							redirect('../allmessage','error','Error while Deleting Message');
						}
					}else{
						redirect('../allmessage','error','Message not Found');
					}
				}else{
					redirect('../allmessage','error','Invalid Action');
				}
                
			}else{
				redirect('../allmessage','error','ID is invalid');
            }
            
        }else{
			redirect('../message','error','ID is required');
		}
	}else{
		redirect('../message','error','Unauthorized Access');
	}
?>