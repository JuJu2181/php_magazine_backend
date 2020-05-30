<?php
	class social extends database{
		function __construct(){
			$this->table = 'socials';
			database::__construct();
		}
		public function addSocialIcons($data,$is_die=false){
			return $this->addData($data,$is_die);
		}

		public function getSocialIconsbyId($social_id,$is_die=false){
			
			$args = array(
				'where'	=> array(
					'and' => array(
							'id' => $social_id,
						)
					)
				);

			return $this->getData($args,$is_die);
		}

		public function getAllSocialIcons($is_die=false){
			
			$args = array(
				'where'	=> array(
					'and' => array(
							'status' => 'Active',
						)
					)
				);

			return $this->getData($args,$is_die);
		}

		public function updateSocialIconsbyId($data,$id,$is_die=false){
			$args = array(
				'where'	=> array(
					'and' => array(
							'id' => $id,
						)
					)
				);

			return $this->updateData($data,$args,$is_die);
		}

		public function deleteSocialIconsbyId($id,$is_die=false){
			$args = array(
				'where'	=> array(
					'and' => array(
							'id' => $id,
						)
					)
				);

			return $this->deleteData($args,$is_die);
		}
	}

?>