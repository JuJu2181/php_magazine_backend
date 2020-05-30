<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$Blog = new blog();
	// debugger($_POST);
	// debugger($_FILES,true);
	if ($_POST) {
		$data = array(
				'title'=>sanitize($_POST['title']),
				'content' => htmlentities($_POST['content']),
				'featured'=>sanitize($_POST['featured']),
				'categoryid'=>(int)$_POST['categoryid'],
				'status' => 'Active',
				'added_by' => $_SESSION['user_id']
			);
		// debugger($data);
		if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$success=uploadImage($_FILES['image'],'blog');
			if ($success) {
				$data['image'] = $success;
				if (isset($_POST['old_img']) && !empty($_POST['old_img']) && file_exists(UPLOAD_PATH.'blog/'.$_POST['old_img'])) {
					unlink(UPLOAD_PATH.'blog/'.$_POST['old_img']);
				}
			}else{
				redirect('../addblog','error','Error while uploading Image');
			}
		}


		if (isset($_POST['id']) && !empty($_POST['id'])) {
			//update
			$act = 'Updat';
			$blog_id = (int)$_POST['id'];
		}else{
			//add
			$act = 'Add';
			$blog_id= false;
		}

		if ($blog_id) {
			$blog_info = $Blog->getBlogbyId($blog_id);
			if ($blog_info) {
				if ($_SESSION['user_id'] == $blog_info[0]->added_by) {
					$success = $Blog->updateBlogById($data,$blog_id);
				}else{
					redirect('../addblog','error','You are not allowed to access this Blog');
				}
			}else{
				redirect('../addblog','error','Blog not Found');
			}
		}else{
			$success = $Blog->addBlog($data);
		}
		if ($success) {
			redirect('../blog','success','Blog '.$act.'ed Successfully');
		}else{
			redirect('../addblog','error','Problem while '.$act.'ing Blog');
		}
	}else if ($_GET) {
		// debugger($_GET,true);
		if (isset($_GET['id']) && !empty($_GET['id'])) {
			$blog_id = (int)$_GET['id'];
			if ($blog_id) {
				$act = substr(md5("Delete-Blog-".$blog_id.$_SESSION['token']), 3,15);
				if ($act == $_GET['act']) {
					$blog_info = $Blog->getBlogbyId($blog_id);
					if ($blog_info) {
						$data = array(
							'status'=>'Passive'
						);
						$success = $Blog->updateBlogById($data,$blog_id);
						if ($success) {
							redirect('../blog','success','Blog Deleted Successfully');
						}else{
							redirect('../blog','error','Error while Deleting Blog');
						}
					}else{
						redirect('../blog','error','Blog not Found');
					}
				}else{
					redirect('../blog','error','Invalid Action');
				}
			}else{
				redirect('../blog','error','ID is invalid');
			}
		}else{
			redirect('../blog','error','ID is required');
		}
	}else{
		redirect('../blog','error','Unauthorized Access');
	}
?>