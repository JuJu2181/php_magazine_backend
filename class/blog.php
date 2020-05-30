<?php 
	class blog extends database{
		function __construct(){
			$this->table = 'blogs';
			database::__construct();
		}

		public function addBlog($data,$is_die=false){
			return $this->addData($data,$is_die);
		}

		public function getBlogbyId($blog_id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $blog_id,
						)
					)
			);
			return $this->getData($args,$is_die);
		}

		public function getAllBlog($is_die=false){
			$args = array(
				'fields' => ['id',
					            'title',
					            'content',
					            'featured',
					            'categoryid',
					            '(SELECT categoryname from categories where id = categoryid) as category',
					            'view',
					            'image'],
					            
				'where' => array(
						'or' => array(
							'status'=>'Active',
						)
					)
			);
			return $this->getData($args,$is_die);
		}
		
       public function updateBlogById($data,$id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $id,
						)
					)
			);
			return $this->updateData($data,$args,$is_die);
		}

		public function deleteBlogById($id,$is_die=false){
			$args = array(
				'where' => array(
						'or' => array(
							'id' => $id,
						)
					)
			);
			return $this->deleteData($args,$is_die);
		}
	}

 ?>

