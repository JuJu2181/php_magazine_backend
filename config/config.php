<?php 
	ob_start();
	session_start();
	date_default_timezone_set('Asia/Kathmandu');

    if($_SERVER['SERVER_ADDR'] == '127.0.0.1' ||$_SERVER['SERVER_ADDR'] == '::1'){
        define ('ENVIRONMENT','DEVELOPMENT');
    }else{
    	define ('ENVIRONMENT','PRODUCTION');
    }

    if(ENVIRONMENT == 'DEVELOPMENT'){
    	error_reporting(E_ALL);
        define('DB_HOST','localhost');
        define('DB_NAME','magazine');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('SITE_URL','http://magazine.com/');

    }else{
    	error_reporting(0);
    	define('DB_HOST','localhost');
        define('DB_NAME','magazine');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('SITE_URL','http://www.magazine.com/');
    }

    define('ERROR_PATH',$_SERVER['DOCUMENT_ROOT'].'error/');
    define('CLASS_PATH',$_SERVER['DOCUMENT_ROOT'].'class/');
    define('CONFIG_PATH',$_SERVER['DOCUMENT_ROOT'].'config/');
    define('UPLOAD_PATH',$_SERVER['DOCUMENT_ROOT'].'upload/');

    define('ALLOWED_EXTENSION', ['jpg','png','jpeg','tif']);


    define('UPLOAD_URL',SITE_URL."upload/");
?>