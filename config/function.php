<?php 
	function debugger($data,$is_die=false){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		if ($is_die) {
			exit();
		}
	}

	function sanitize($str){
		return trim(stripcslashes(strip_tags($str)));
	}

	function tokenize($length=100){
		$char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQESTUVWXYZ0123456789';
		$len = strlen($char);
		$token='';
		for ($i=0; $i < $length; $i++) { 
			$token.=$char[rand(0,$len-1)];
		}
		return $token;
	}

	function redirect($loc,$key="",$message=""){
		$_SESSION[$key]=$message;
		@header('location: '.$loc);
		exit();
	}

	function flashMessage(){
		if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
			echo "<span class = 'alert alert-danger'>".$_SESSION['error']."</span>";
		    unset($_SESSION['error']);
		}else if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
			echo "<span class = 'alert alert-success'>".$_SESSION['success']."</span>";
	  	    unset($_SESSION['success']);
	  	}else if(isset($_SESSION['warning']) && !empty($_SESSION['warning'])){
			echo "<span class = 'alert alert-warning'>".$_SESSION['warning']."</span>";
			unset($_SESSION['warning']);
		}
?>		
        <script type="text/javascript">
        	setTimeout(function(){
        		$('.alert').slideUp('slow');
        	},3000);
        </script>
<?php        
	}
 ?>
