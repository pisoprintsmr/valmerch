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
        $topupval 		= $_POST['topupval'];	
        $coins      = $_POST['coins'];
        if($topupval>0){
            $sql="UPDATE users SET coins=('$coins'+'$topupval') WHERE userid='".$userid."'";
            $stmt = $db->prepare($sql);
            $result1=$stmt->execute();

            if($result1){
                echo 'BJ Coins added to your account';
            }
            else{
                echo 'There were errors in the payment';
            }
        }
        else{
            echo 'Please fill up the Top-up value';
        }
	}
	else{
		echo 'No data';
	}
SESSION_DESTROY();
session_start();
$sql = "SELECT*FROM users WHERE userid = '".$userid."'";
$stmtselect = $db->prepare($sql);
$result = $stmtselect->execute([$email, $password]);
$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
	if($stmtselect->rowCount()>0){
        $_SESSION['userlogin'] = $user;
    }
