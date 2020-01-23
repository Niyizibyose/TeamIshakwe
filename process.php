<?php

$username = $_POST ['username'];
$password = $_POST['password'];

$username = stripslashes ($username);
$password = stripslashes ($password);
$username = mysql_real_escape_string ($username);
$password = mysql_real_escape_string ($password);

?>