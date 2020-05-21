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

	function redirect($loc,$key,$message){
		$_SESSION[$key]=$message;
		@header('location: '.$loc);
	}
 ?>