<?php
$dbServer = "localhost";
$dbUser = "root";
$dbPass = "";
$dbtable = "breadjoint"; 
$connect = mysqli_connect($dbServer, $dbUser, $dbPass, $dbtable);

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    /* set the PDO error mode to exception */
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     /*sql to delete a record*/
    $sql = "DELETE FROM 'product' WHERE id=" .$id;
    // $delete=mysqli_query($connect,"DELETE FROM 'datadel' WHERE id=".$id);

    /*use exec() because no results are returned*/
    $conn->exec($sql);
    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "
" . $e->getMessage();
    }

$conn = null;
?>