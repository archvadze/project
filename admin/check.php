<?php  session_start();

if (!isset($_SESSION["manager"])) {

    header("Location: login.php"); 

    exit();
}
$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); 
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]); 
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]);

include "config.php"; 

$sql = mysql_query("SELECT * FROM `users` WHERE id='".$managerID."' AND username='".$manager."' AND password='".$password."' AND url='admin' LIMIT 1") or die(mysql_error()); // query the person
 
$existCount = mysql_num_rows($sql); // count the row nums

if ($existCount == 0) { 
	 echo "Your login session data is not on record in the database.";
     exit();
}

?>