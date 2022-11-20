<?php
require("config.php");

function getUserData($id){
	$array = array();
	$q = mysql_query("SELECT * FROM users WHERE id=".$id);
	while($r=mysql_fetch_assoc($q)){
		$array['id'] = $r['id'];
		$array['fname'] = $r['fname'];
		$array['lname'] = $r['lname'];
		$array['email'] = $r['email'];
		$array['contact'] = $r['contact'];
		$array['password'] = $r['password'];
		$array['userid'] = $r['userid'];
		$array['coins'] = $r['coins'];
		// $array['cart'] = $r['cart'];
	}
	return $array;
}

function getId($username){
	$q = mysql_query("SELECT * FROM users WHERE id=".$username);
	while($r=mysql_fetch_assoc($q)){
		return $r['i'];
	}
}
?>