<?php


require_once 'vendor/autoload.php';

$google_client = new Google_Client();

$google_client->setClientID ('215432538358-8sev6oc198mqr6o93kfavbd7glotpoir.apps.googleusercontent.com');

$google_client->setClientSecret ('Q3crif7Fmdt_ls7f_-PmKjjz');

$google_client -> setRedirectUrl ('http://localhost/ProjectFoot/index.php');

$google_client -> addScope ('email');



?>