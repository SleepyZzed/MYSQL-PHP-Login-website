<?php 
//checks if the script was accessed through the correct method, if no vkey is passed the site will redirect to index
if(isset($_GET['vkey']))
{   //sets up variables getting values from url
    $vkey = $_GET['vkey'];
    //connection to db
    $mysqli = NEW MySQLi('localhost', 'root', '', 'loginsystem');
    //statement made to get the correct user and vkey
    $resultSet = $mysqli->query("SELECT verified,vkey FROM users WHERE verified = 0 and vkey = '$vkey' LIMIT 1");
    //checks if verified is 0  meaning an account is not verified and sets it it to 1
    if($resultSet->num_rows == 1){
        $update = $mysqli->query("UPDATE users SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");
        //once set to 1 or true the system updates destroying any life session in case the user is logged in and sends them to index with success message
        if($update)
        {
        
        //logs out
        session_start();
        session_unset();
        session_destroy();
        //goes to home page with success message
        header("Location: ../index.php?success=verifycomplete");
        exit();
        }
    }
    //if value is 1 then the user is already verified and sent to index with error message
    else{
        header("Location: ../index.php?error=alreadyverified");
        exit();
    }




}
else{
   //else the user is just sent to index if accessed the script incorrectly 

    header("Location: ../index.php");
    exit();
}





?>