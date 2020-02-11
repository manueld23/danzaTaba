<?php include('conexion/conexion.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

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
                  <form class="user" action="controlador/loguear.php" method="POST">
                    <div class="form-group">
                      <input type="text" name="usuario" class="form-control form-control-user" id="usuario" aria-describedby="emailHelp" placeholder="Enter Email Address..." pattern="[A-Za-z_-0-9]{1,20}">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" pattern="[A-Za-z_-0-9]{1,20}">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
                    <!--<div class="btn fb-login-button btn-block" scope="public_profile,email" onlogin="checkLoginState();" data-width="" data-size="large" data-button-type="login_with" data-auto-logout-link="false" data-use-continue-as="false"></div>-->
                    <!--<fb:login-button class="btn btn-facebook btn-user btn-block" scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>-->
                    <!--<a scope="public_profile,email" onlogin="checkLoginState();" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>-->
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--
        <script>
          function statusChangeCallback(response) { // Called with the results from FB.getLoginStatus().
            console.log('statusChangeCallback');
            console.log(response); // The current login status of the person.
            if (response.status === 'connected') { // Logged into your webpage and Facebook.
              testAPI();
            } else { // Not logged into your webpage or we are unable to tell.
              document.getElementById('status').innerHTML = 'Please log ' +
                'into this webpage.';
            }
          }


          function checkLoginState() { // Called when a person is finished with the Login Button.
            FB.getLoginStatus(function(response) { // See the onlogin handler
              statusChangeCallback(response);
            });
          }


          window.fbAsyncInit = function() {
            FB.init({
              appId: '2456210137992679',
              cookie: true, // Enable cookies to allow the server to access the session.
              xfbml: true, // Parse social plugins on this webpage.
              version: 'v4.0' // Use this Graph API version for this call.
            });


            FB.getLoginStatus(function(response) { // Called after the JS SDK has been initialized.
              statusChangeCallback(response); // Returns the login status.
            });
          };


          (function(d, s, id) { // Load the SDK asynchronously
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));


          function testAPI() { // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) {
              console.log('Successful login for: ' + response.name);
              document.getElementById("status").innerHTML = '<p>Welcome '+response.name+'! <a href=index.php?name='+ response.name.replace(" ", "_") +'&email='+ response.email +'>Continue with facebook login</a></p>';
              /*document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.name + '!';*/
            });
          }
        </script>-->

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>
</html>