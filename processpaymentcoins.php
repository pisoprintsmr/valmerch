<?php
	require_once('config.php');
	session_start();
	require("functions.php");
?>
<?php
    $email = $_SESSION['userlogin']['email'];
    $password = $_SESSION['userlogin']['password'];
	if(isset($_POST)){
		$userid 			= $_SESSION['userlogin']['userid'];
        $orders 		= $_POST['orders'];	
        $price 		= $_POST['price'];	
        $coins      = $_POST['coins'];
		

		$sql="SELECT CURRENT_TIMESTAMP";
		$stmt= $db->prepare($sql);
		$stmt->execute();
		$date_from_sql=$stmt->fetch(PDO::FETCH_ASSOC);
        $date = date('d-m-Y', strtotime($date_from_sql['CURRENT_TIMESTAMP'])); //date format
        if($coins>=$price){
            if($price>0){
                $sql="UPDATE users SET coins=('$coins'-'$price') WHERE userid='".$userid."'";
                $stmt = $db->prepare($sql);
                $result1=$stmt->execute();

                if($result1){
                    $sql="INSERT INTO order_history (userid, orders,price, date) VALUES(?,?,?,?)";
                    $stminsert = $db->prepare($sql);
                    $result2=$stminsert->execute([$userid, $orders, $price, $date]);

                    if($result2){
                        echo 'Please wait for the digital receipt';
                        $sql="DELETE FROM ".$userid."";
                        $stm = $db->prepare($sql);
                        $result3=$stm->execute();
                    }
                    else{
                        echo 'There were errors while adding the data';
                    }
                }
                else{
                    echo 'There were errors in the payment';
                }
            }
            else{
                echo 'Please fill up your cart';
            }
            
        }
		else{
            echo 'Please Top-up';
        }
	}
	else{
		echo 'No data';
	}
// SESSION_DESTROY();
// session_start();
// $sql = "SELECT*FROM users WHERE userid = '".$userid."'";
// $stmtselect = $db->prepare($sql);
// $result = $stmtselect->execute([$email, $password]);
// $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
// 	if($stmtselect->rowCount()>0){
//         $_SESSION['userlogin'] = $user;
//     }
