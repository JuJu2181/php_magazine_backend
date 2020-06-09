<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$Newsletter = new newsletter();
	debugger($_GET);
	if ($_GET) {
		if (isset($_GET['id']) && !empty($_GET['id'])) {
			$newsletter_id = (int)$_GET['id'];
			if ($newsletter_id) {
                $act = substr(md5("Delete-Newsletter-".$newsletter_id.$_SESSION['token']), 3,15);
                 if ($act == $_GET['act']) {
					$newsletter_info = $Newsletter->getNewsletterbyId($newsletter_id);
					if ($newsletter_info) {
						$data = array(
							'status'=>'Passive'
						);
						$success = $Newsletter->updateNewsletterById($data,$newsletter_id);
						if ($success) {
							redirect('../newsletter','success','Subscriber Deleted Successfully');
						}else{
							redirect('../newsletter','error','Error while Deleting Subscriber');
						}
					}else{
						redirect('../newsletter','error','Subscriber not Found');
					}
				}else{
					redirect('../newsletter','error','Invalid Action');
				}
                
			}else{
				redirect('../newsletter','error','ID is invalid');
            }
            
        }else{
			redirect('../newsletter','error','ID is required');
		}
	}else{
		redirect('../newsletter','error','Unauthorized Access');
	}
?>