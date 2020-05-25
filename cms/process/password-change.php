<?php 
    include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
    include '../inc/checklogin.php';

    if ($_POST) {
    	if (isset($_POST['oldpassword']) && !empty($_POST['oldpassword'])) {
    		if (isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['newpassword']) && !empty($_POST['newpassword'])) {
    			if ($_POST['password'] == $_POST['newpassword']) {
    				$user = new user();
    				$user_info = $user->getUserbyEmail($_SESSION['user_email']);
    				if ($user_info) {
    					$password = sha1($_SESSION['user_email'].$_POST['oldpassword']);
    					if ($password==$user_info[0]->password) {
    						$data = array(
    							'password' => sha1($user_info[0]->email.$_POST['password'])
    						);

    						$success=$user->updateUserByEmail($data,$user_info[0]->email);
    						if ($success) {
    							redirect('../password-change','success','Password Change Successsfully');
    						}else{
    							redirect('../password-change','error','Error while Changing password');
    						}

    					}else{
    						redirect('../password-change','error','Old password is not correct');
    					}
    				}else{
    					redirect('../logout');
    				}
    			}else{
    				redirect('../password-change','error','New Password Doesnot Match');
    			}
    		}else{
    			redirect('../password-change','error','Both new Password fields are required.');
    		}
    	}else{
    		redirect('../password-change','error','Old Password Required');
    	}
    }else{
    	redirect('../password-change','error','Unauthorized Access');
    }

 ?>