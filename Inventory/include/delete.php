<?php

	// include '../database.php';
	// $sqlstatement="SELECT * FROM product";

	include "../database.php";
	$id=$_GET['id'];
	// $delete=mysqli_query($connect,"DELETE FROM 'datadel' WHERE id=".$id);
		$sqlstatement="UPDATE product SET prod_qty=0 WHERE id=".$id;
	$result=mysqli_query($connect, $sqlstatement);
    header('location:../menu.php');

	
?>