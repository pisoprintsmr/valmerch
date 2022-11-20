<?php
	require_once('config.php');
	session_start();
	require("functions.php");
?>
<?php
	if(isset($_POST)){
		$userid 			= $_SESSION['userlogin']['userid'];
        $orders 		= $_POST['orders'];	
        $price 		= $_POST['price'];	
        $coins      = $_SESSION['userlogin']['coins'];
		

		$sql="SELECT CURRENT_TIMESTAMP";
		$stmt= $db->prepare($sql);
		$stmt->execute();
		$date_from_sql=$stmt->fetch(PDO::FETCH_ASSOC);
        $date = date('d-m-Y', strtotime($date_from_sql['CURRENT_TIMESTAMP'])); //date format
        if($price>0){
            $sql="INSERT INTO order_history (userid, orders,price, date) VALUES(?,?,?,?)";
            $stminsert = $db->prepare($sql);
            $result=$stminsert->execute([$userid, $orders, $price, $date]);
        
            if($result){
                echo 'Please wait for the digital receipt';
                $sql="DELETE FROM ".$userid."";
                $stm = $db->prepare($sql);
                $result=$stm->execute();
            }
            else{
                echo 'There were errors while adding the data';
            }
        }
		else{
            echo 'Please fill up your cart';
        }
			
		}
	else{
		echo 'No data';
	}

