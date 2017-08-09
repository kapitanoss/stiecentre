<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/London');

//database credentials denwer
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','site_db');

//database credentials hosting
/*define("DBHOST", "localhost");
define("DBUSER", "dfsu");
define("DBPASS", "Centre-2017/08/01");
define("DBNAME", "site_db");*/

//application address
define('DIR','http://www.centre-kiev.kiev.ua/loginregister-master/');
define('SITEEMAIL','g.zvolinsky@gmail.com');

try {

	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include('classes/user.php');
include('classes/phpmailer/mail.php');
$user = new User($db);
?>
