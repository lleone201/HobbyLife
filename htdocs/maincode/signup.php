<?php   
    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signup for HobbyLife</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-group" action = "includes/signup.inc.php" method = "POST">
      <h1 class="h3 mb-3 font-weight-normal">Enter your information in the fields below</h1>
      <div class = "row justify-content-center">
            <div class = "col-md-4">
                <label for="inputfname" class="sr-only">First Name</label>
                <input type="first_name" id="inputfname" name = "firstname" class="form-control" placeholder="First Name" required autofocus>
            </div>
        </div>
        <div style = "padding-top: 10px"></div>
        <div class = "row justify-content-center">
            <div class = "col-md-4">
                <label for="inputlname" class="sr-only">Last Name</label>
                <input type="last_name" id="inputlname" name = "lastname" class="form-control" placeholder="Last Name" required>
            </div>
        </div>
        <div style = "padding-top: 10px"></div>
        <div class = "row justify-content-center">
            <div class = "col-md-4">
                <label for="inputuname" class="sr-only">Username</label>
                <input type="username" id="inputuname" name = "username" class="form-control" placeholder="Username" required>
            </div>
        </div>
        <div style = "padding-top: 10px"></div>
      <div class = "row justify-content-center">
            <div class = "col-md-4">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" name = "email" class="form-control" placeholder="Email address" required>
            </div>
        </div>
        <div style = "padding-top: 10px"></div>
        <div class = "row justify-content-center">
            <div class = "col-md-4">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name = "password" class="form-control" placeholder="Password" required>
            </div>
        </div>
        <div style = "padding-top: 10px"></div>
      <button class="btn btn-primary btn-lg" type="submit" name = "submit">Submit</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>