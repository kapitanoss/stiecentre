<?php require('includes/config.php');

//logout
$user->logout(); 

//logged in return to index page
//header('Location: login.php');
header('Location: ../nads/nadsnew.shtml');
exit;
?>