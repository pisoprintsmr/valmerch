<?php
	require_once('config.php');
	session_start();
	require("functions.php");

        $name 			= $_POST['name'];
        $price 			= $_POST['price'];
	
		$sql2 = "SELECT * FROM ".$_SESSION['userlogin']['userid']."";
		$stmt = $db->prepare($sql2);
		$stmt->execute();
		$cartAccount = $stmt->fetchAll();
		$_SESSION['cart'] = $cartAccount;
	

if(isset($_POST)){

		$sql = "DELETE FROM ".$_SESSION['userlogin']['userid']." WHERE name = '$name' && price ='$price'";
		$stmt = $db->prepare($sql);
		return $stmt->execute();

}