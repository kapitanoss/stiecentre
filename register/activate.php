<?php
header("Content-type: text/html;charset=utf-8"); 
require('includes/config.php');

//collect values from the url
$memberID = trim($_GET['x']);
$active = trim($_GET['y']);
$tren = trim($_GET['z']); 
//if id is number and the active token is not empty carry on
if(is_numeric($memberID) && !empty($active)){

	//update users record set the active column to Yes where the memberID and active value match the ones provided in the array
	if ($tren==true) { $stmt = $db->prepare("UPDATE memberstren SET active = 'Yes' WHERE memberID = :memberID AND active = :active"); }
	else       { $stmt = $db->prepare("UPDATE members     SET active = 'Yes' WHERE memberID = :memberID AND active = :active"); }
	$stmt->execute(array(
		':memberID' => $memberID,
		':active' => $active
	));

	//if the row was updated redirect the user
	if($stmt->rowCount() == 1){

		//redirect to login page
		header('Location: logintren.php?action=active');
		exit;

	} else {
		echo "Ваш обликовий запис неможливо активувати."; 
	}
	
}
?>