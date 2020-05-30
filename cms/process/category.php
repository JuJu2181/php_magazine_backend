<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$Category = new category();
	//debugger($_POST);
	if ($_POST) {
		$data = array(
				'categoryname'=>sanitize($_POST['categoryname']),
				'description' => htmlentities($_POST['description']),
				'status' => 'Active',
				'added_by' => $_SESSION['user_id']
			);
		// debugger($data);

		if (isset($_POST['id']) && !empty($_POST['id'])) {
			//update
			$act = 'Updat';
			$category_id = (int)$_POST['id'];
		}else{
			//add
			$act = 'Add';
			$category_id= false;
		}

		if ($category_id) {
			$category_info = $Category->getCategorybyId($category_id);
			if ($category_info) {
				if ($_SESSION['user_id'] == $category_info[0]->added_by) {
					$success = $Category->updateCategoryById($data,$category_id);
				}else{
					redirect('../category','error','You are not allowed to access this Category');
				}
			}else{
				redirect('../category','error','Category not Found');
			}
		}else{
			$success = $Category->addCategory($data);
		}
		if ($success) {
			redirect('../category','success','Category '.$act.'ed Successfully');
		}else{
			redirect('../category','error','Problem while '.$act.'ing Category');
		}

	}else if ($_GET) {
		if (isset($_GET['id']) && !empty($_GET['id'])) {
			$category_id = (int)$_GET['id'];
			if ($category_id) {
				$act = substr(md5("Delete-Category-".$category_id.$_SESSION['token']), 3,15);
				if ($act == $_GET['act']) {
					$category_info = $Category->getCategorybyId($category_id);
					if ($category_info) {
						$data = array(
							'status'=>'Passive'
						);
						$success = $Category->updateCategoryById($data,$category_id);
						if ($success) {
							redirect('../category','success','Category Deleted Successfully');
						}else{
							redirect('../category','error','Error while Deleting Category');
						}
					}else{
						redirect('../category','error','Category not Found');
					}
				}else{
					redirect('../category','error','Invalid Action');
				}
			}else{
				redirect('../category','error','ID is invalid');
			}
		}else{
			redirect('../category','error','ID is required');
		}
	}else{
		redirect('../category','error','Unauthorized Access');
	}
?>