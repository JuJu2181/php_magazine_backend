<?php
     //to load init file
     include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
     
     $schema = new schema(); 

     $table = array(
              'users' => "
                         CREATE TABLE IF NOT EXISTS users
                           (
                              id int not null AUTO_INCREMENT PRIMARY KEY,
                              username varchar(50),
                              email varchar(150) UNIQUE KEY,
                              password varchar(200),
                              session_token text,   #to avoid using multiple logins
                              activate_token text,         #for activating new account 
                              password_reset_token text,    #to reset password
                              role enum('Admin','Staff')   default 'Staff',
                              status enum('Active','Passive') default 'Passive',
                              added_by int,
                              created_date datetime default current_timestamp,
                              updated_date datetime on update current_timestamp

                            )       
                 " ,
                 'superuser' => "
                                 INSERT into users SET 
                                 username = 'Admin',
                                 email ='admin@magazine.com',
                                 password = '".sha1('admin@magazine.comadmin123')."',  
                                 role = 'Admin',
                                 status = 'Active'                            
                  "



        );

     foreach ($table as $key => $sql) {
     	try{
           $success = $schema->create($sql);  
           if($success){
           	echo "Query".$key."Executed Successfully<br>";
           }else{
           	echo "Problem while executing Query : ".$key."<br>";
           }
     	}catch(PDOException $e){
                 error_log(Date("M d, Y h:i:s a").': (run Query) :'.$e->getMessage()."\r\n",3,ERROR_PATH.'error_log');
             return false;  
     	}
     }


?>

<!-- #md5 and sha1 are hashing functions similar to encode #but it can't be dehashed as decoding -->