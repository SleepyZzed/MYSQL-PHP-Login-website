<?php 
if(isset($_GET['vkey']))
{   $vkey = $_GET['vkey'];
    $mysqli = NEW MySQLi('localhost', 'root', '', 'loginsystem');
    $resultSet = $mysqli->query("SELECT verified,vkey FROM users WHERE verified = 0 and vkey = '$vkey' LIMIT 1");
    
    if($resultSet->num_rows == 1){
        $update = $mysqli->query("UPDATE users SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");
        if($update)
        {
        header("Location: ../index.php?success=verifycomplete");
        exit();
        }
    }
    else{
        header("Location: ../index.php?error=alreadyverified");
        exit();
    }




}
else{
    header("Location: ../index.php");
    exit();
}





?>