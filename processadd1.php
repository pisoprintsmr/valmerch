<?php
	require_once('config.php');
	session_start();
	require("functions.php");
?>
<?php
if(!isset($_SESSION['userlogin'])){
	echo 'Please login to order';
}
else{
	if(isset($_POST)){
		$name 			= $_POST['name'];
		$price 			= $_POST['price'];
		$cafepic		= $_POST['cafepic'];
		$count          = $_POST['count'];	
		
	
		$sql = "SELECT * FROM ".$_SESSION['userlogin']['userid']." WHERE name = '$name' && price = '$price'";
		$stmt = $db->prepare($sql);
		$stmt->execute();

		$sql1 = "SELECT prod_qty FROM product WHERE prod_name = '$name' && prod_price = '$price'";
		$stm = $db->prepare($sql1);
		$stm->execute();
		$row = $stm->fetch(PDO::FETCH_ASSOC);
		if($row['prod_qty']>0){
			if($stmt->rowCount()== 0){
				$sql="INSERT INTO ".$_SESSION['userlogin']['userid']."(name, price, cafepic, count) VALUES(?,?,?,?)";
				$stminsert = $db->prepare($sql);
				$result=$stminsert->execute([$name, $price, $cafepic, $count]);
				
				if($result){
					echo 'Added to Cart';
				}
				else{
					echo 'There were errors while adding the data';
				}
			}
			else{
				$sql = "UPDATE ".$_SESSION['userlogin']['userid']." SET count=count+".$count." WHERE name = '$name' && price ='$price'";
				$stmt = $db->prepare($sql);
				$stmt->execute();
				echo 'Added another to your cart';
			}
			
		}
		else{
			echo 'Already out of Stock';
		}
		}
	else{
		echo 'No data';
	}
}
