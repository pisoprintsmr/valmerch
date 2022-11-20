<?php
	require_once('config.php');
	
?>
<?php

if(isset($_POST)){
	$fname 			= $_POST['fname'];
	$lname 			= $_POST['lname'];
	$email			= $_POST['email'];
	$address 		= $_POST['address'];
	$password	 	= sha1($_POST['password']);
	$contact		= $_POST['contact'];
	$userid			= $_POST['userid'];
	//$tablename 		= mysql_real_escape_string($_POST['email']);
	$stmt=$db->prepare("SELECT * FROM users WHERE userid=?");
    $stmt->execute([$userid]);
    $user = $stmt->fetch();

	if(!$user){
		$sql="INSERT INTO users(fname, lname, userid, email, address, password, contact) VALUES(?,?,?,?,?,?,?)";
		$stminsert = $db->prepare($sql);
		$result=$stminsert->execute([$fname, $lname, $userid, $email, $address, $password, $contact]);
		 $sql ="CREATE TABLE $userid(
					 id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
					name VARCHAR(255) NOT NULL,
					count INT(3) NOT NULL,
					 cafepic VARCHAR(255) NOT NULL,
					 price INT(7) NOT NULL)";
		 $db->exec($sql);
		//$stmt->bindParam(":tablename", $_POST['userid']);
		
		
		if($result){
			echo 'Successfully Saved';
		}
		else{
			echo 'There were errors while saving the data';
		}
	}
	else{
		echo 'Username already Exist!';
	}
    
	
	
}
else{
	echo 'No data';
}