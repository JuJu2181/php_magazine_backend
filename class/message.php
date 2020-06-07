<?php 
	class message extends database{
		function __construct(){
			$this->table = 'messages';
			database::__construct();
		}

		public function addMessage($data,$is_die=false){
			return $this->addData($data,$is_die);
		}

		public function getMessagebyId($message_id,$is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'id' => $message_id,
						)
					)
			);
			return $this->getData($args,$is_die);
		}

		public function getAllMessage($is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'status'=>'Active',
						)
					),
				'order'=>'ASC'
			);
			return $this->getData($args,$is_die);
		}

		public function getAllWaitingMessage($is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'status'=>'Active',
							'state'=>'waiting'
						)
					),
				'order'=>'ASC'
			);
			return $this->getData($args,$is_die);
		}
		
		public function getAllAcceptMessageByBlog($blog_id,$is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'status'=>'Active',
							'state'=>'accept',
							'blogid'=>$blog_id,
							'messageType'=>'message'
						)
					),
				'order'=>'DESC',
			);
			return $this->getData($args,$is_die);
		}
		#I used limit so we only display the 3 newest messages
		public function getAllAcceptMessageByBlogWithLimit($blog_id,$offset,$no_of_data,$is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'status'=>'Active',
							'state'=>'accept',
							'blogid'=>$blog_id,
							'messageType'=>'message'
						)
					),
				'order'=>'DESC',
				'limit' => array(
					'offset' => $offset,
					'no_of_data' => $no_of_data	
				 )
			);
			return $this->getData($args,$is_die);
		}

		public function updateMessageById($data,$id,$is_die=false){
			$args = array(
				'where' => array(
						'and' => array(
							'id' => $id,
						)
					)
			);
			return $this->updateData($data,$args,$is_die);
		}

		public function deleteMessageById($id,$is_die=false){
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