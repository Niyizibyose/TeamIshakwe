<?php

$username = $_POST ['user'];       //values from login.php
$password = $_POST['pass'];

$username = stripslashes ($username);
$password = stripslashes ($password);               //mysql injection prevention
$username = mysql_real_escape_string ($username);
$password = mysql_real_escape_string ($password);


mysql_connect ("localhost" , "root" , "");
mysql_select_db ("foot-sers");                  //server and database connection

$result = mysql_query ("select from users where username = '$username' and password = '$password'")
 or die("Failed to query database " .mysql_error());

 $row = mysql_fetch_array ($result);

 if ($row ['username'] == $username && $row ['password'] == $password){
     echo "Login Success ! Welcome ".$row['username'];
 } else {
     echo "Failed to login!";
 }
?>

