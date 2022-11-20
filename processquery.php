<?php
	require_once('config.php');
	session_start();
	require("functions.php");
?>
<?php
	if(isset($_POST)){
		$email 			= $_POST['email'];
		$concern 		= $_POST['concern'];	
		

		$sql="SELECT CURRENT_TIMESTAMP";
		$stmt= $db->prepare($sql);
		$stmt->execute();
		$date_from_sql=$stmt->fetch(PDO::FETCH_ASSOC);
		$date = date('d-m-Y', strtotime($date_from_sql['CURRENT_TIMESTAMP'])); //date format
		
	
		$sql = "SELECT * FROM custqueries WHERE email='$email' and dateandtime='$date'";
		$stmt = $db->prepare($sql);
		$stmt->execute();
			if($stmt->rowCount()<3){
				$sql="INSERT INTO custqueries (email, queries,dateandtime) VALUES(?,?,?)";
				$stminsert = $db->prepare($sql);
				$result=$stminsert->execute([$email, $concern, $date]);
				
				if($result){
					echo 'Query Sent.';
				}
				else{
					echo 'There were errors while adding the data';
				}
			}
			else{
				echo 'Over the Limit';
			}
			
		}
	else{
		echo 'No data';
	}

