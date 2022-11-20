<?php
    include 'config.php';

    $data = json_decode(file_get_contents("php://input"));

    $resText='';
    if(isset($data->userid)){
        $userid = $data->userid;
        

        if($userid){
            $sql = "SELECT COUNT(userid) as allcount FROM users WHERE userid='".$userid."'";
            $result=mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);

            $resText = "Available";
            if($row['allcount'] > 0){
                $resText = 'Not Available';
            }
        }
        else{
            $resText = '';
        }
    }

    echo $resText;

?>