<?php 
	class newsletter extends database{
		function __construct(){
			$this->table = 'newsletters';
			database::__construct();
		}

		public function addNewsletter($data,$is_die=false){
			return $this->addData($data,$is_die);
		}

		public function getNewsletterbyId($newsletter_id,$is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'id' => $newsletter_id,
						)
					)
			);
			return $this->getData($args,$is_die);
		}

		public function getNewsletterbyEmail($newsletter_email,$is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'email' => $newsletter_email,
							'status' => 'Active'
						)
					)
			);
			return $this->getData($args,$is_die);
		}

		public function getAllNewsletter($is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'status'=>'Active',
						)
					),
				'order'=>'DESC'
			);
			return $this->getData($args,$is_die);
		}

		

		public function updateNewsletterById($data,$id,$is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'id' => $id,
						)
					)
			);
			return $this->updateData($data,$args,$is_die);
		}

		public function deleteNewsletterById($id,$is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'id' => $id,
						)
					)
			);
			return $this->deleteData($args,$is_die);
		}
    }
?>