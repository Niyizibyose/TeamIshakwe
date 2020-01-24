<?php

include ('config.php');

$login_button = '';

if (isset ($_GET ["code"])) {

  $token = $google_client->fetchAccessTokenWithAuthCode ($_GET["code"]);

  if (!isset ($token['error']))
  {
    $google_client-> setAccessToken($token['access_token']);

    $_SESSION ['access_token'] = $token['access_token'];

    $goole_service = new Google_Service_Oauth2 ($google_client);

    $data = $goole_service->userinfo->get();

    if (!empty ($data ['given_name']))
    {
      $_SESSION ['user_first_name'] = $data ['given_name'];

    }

    if (!empty ($data ['family_name']))
    {
      $_SESSION ['user_last_name'] = $data ['family_name'];
    }

    if (!empty ($data ['email']))
    {
      $_SESSION ['user_email_address'] = $data ['email'];
    }

    if (!empty ($_SESSION['gender']))
    {
      $_SESSION ['user-gender'] = $data ['gender'];
    }

    if (!empty ($_SESSION ['picture']))
    {
      $_SESSION ['user_image'] = $data['picture'];
    }
  }
}

if (!isset ($_SESSION ['access_token']))
{
$login_button = '<a href="'.$google_client->createAuthUrl().'"> 
<img src="kigali_logo.jpg" /></a>';

}

?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ishakwe - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>

                  <form class="user" action="process.php">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="user" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="pass" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <a href="index.php" class="btn btn-primary btn-user btn-block" id="btn" type="submit">
                      Login
                    </a>
                    <hr>
                    <a href="index.php" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.php" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

<?php

if ($login_button == '')
{
  echo '<div class="panel-heading" Welcome User </div><div class="panel-body">';

  echo '<img src="'.$_SESSION["user-image"].'" class="img-responsive img-circle img-thumbnail" />;

  //echo '<b> Name: </b> .$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';

  echo '<h3><b>Email : </b> '.$_SESSION ['user_email_address']. '</h3>';

  
  echo '<h3> <b> Name: </b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';

  echo '<h3> <a href="logout.php"> Logout </h3></div>';

}
else
{
echo '<div align = "center">'.$lo
}

?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>


