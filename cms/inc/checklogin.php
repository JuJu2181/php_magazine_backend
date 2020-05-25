<?php
   $user = new user(); 
   if(isset($_SESSION['token']) && !empty($_SESSION['token'])){
      	$user_info = $user->getUserbySessionToken($_SESSION['token']);
   	if(!isset($user_info[0]->session_token) || empty($user_info[0]->session_token)){
   		redirect('logout');
   	}else{
      //logged in
   		if(pathinfo($_SERVER['PHP_SELF'],PATHINFO_FILENAME) == 'login'){
   		redirect('index','success','You are already logged in');
   	}
   	}
   }else{
     //session token is unavailable
     if(isset($_COOKIE['_auth_user']) && !empty($_COOKIE['_auth_user'])){
     //no session but yes cookie	
     $token = $_COOKIE['_auth_user'];
     $user_info = $user->getUserbySessionToken($token);
     if(isset($user_info[0]->session_token) && !empty($user_info[0]->session_token)){
            $_SESSION['user_id'] = $user_info[0]->id;
            $_SESSION['user_name'] = $user_info[0]->username;
            $_SESSION['user_email'] = $user_info[0]->email;
            $_SESSION['user_role'] = $user_info[0]->role;
            $_SESSION['user_status'] = $user_info[0]->status;
            $token = tokenize();
            $_SESSION['token'] = $token;
            $data = array(
                'session_token' => $token
            );

     }else{
     	//logged out
     	setcookie('_auth_user','',time()-100,'/');
     	if(pathinfo($_SERVER['PHP_SELF'],PATHINFO_FILENAME) !='login'){
   		redirect('login','error','You should login before');
        	} 
       }
    }   
    //logged out
     if(pathinfo($_SERVER['PHP_SELF'],PATHINFO_FILENAME) !='login'){  //this will solve error for multiple redirecting 
   		//no session and no cookie
   		redirect('login','error','You should login before');
   	}
   
   }
?>