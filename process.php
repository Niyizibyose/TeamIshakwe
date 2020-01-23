<?php

$username = $_POST ['username'];       //values from login.php
$password = $_POST['password'];

$username = stripslashes ($username);
$password = stripslashes ($password);               //mysql injection prevention
$username = mysql_real_escape_string ($username);
$password = mysql_real_escape_string ($password);


mysql_connect ("localhost" , "root" , "");
mysql_select_db ("foot-sers");                  //server and database connection

$result = mysql_query ("select from users where username = '$username' and password = '$password'")
 or die("Failed to query database " .mysql_error());
?>

