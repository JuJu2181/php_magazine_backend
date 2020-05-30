<?php  
	// // ob_start();
	// // @header('location: cms/index');
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';

	debugger($_SERVER);  //for server info
	//redirect('cms/index');

	// $user = new user();
	//  $data = array(
 //        'username' => 'khwopa',
 //        'email' => 'khwopa@mail.com',
 //        'session_token' => tokenize()
	// );
  
  
    //Adding another data
	 // $data1 = array(
  //        'username' => 'Aj',
  //        'email' => 'aj@mail.com',
  //        'password' => 'aj123'
	 // );
    

    //adding data   
	// $datas = $user->addUser($data);
 //  debugger($datas)
    
    
    //reading data
    // $datas = $user -> getUserbyId(1);
	//  debugger($datas);
	 //  $datas = $user -> getUserbyEmail('aj@mail.com');
  //     debugger($datas);
    

    //updating data 
    //  $datas = $user ->updateUserByEmail($data,'aj@mail.com');
    //  debugger($datas);
    

     //deleting data
     // $datas = $user->deleteUserByEmail('khwopa@mail.com') ;
     // debugger($datas);
	 ?>