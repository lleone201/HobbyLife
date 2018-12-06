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

    <title>HobbyLife</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
    
  </head>

  <body>
      

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">HobbyLife!</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <!--
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Add User</a>
                    <a class="dropdown-item" href="#">Add Organization</a>
                    <a class="dropdown-item" href="#">Add Event</a>
                    <a class="dropdown-item" href="#">Delete User</a>
                    <a class="dropdown-item" href="#">Delete Organization</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select One</button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">User</a>
                    <a class="dropdown-item" href="#">Organization</a>
                    <a class="dropdown-item" href="#">Event</a>
                  </div>
                </div>
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <main role="main">

      
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3"><?php include 'includes/dbh.inc.php';
                                    if(!$conn){
                                        die("Connection Failed: " . mysqli_connect_error());
                                    }
                                    
                                    $sql = "SELECT * FROM organizations WHERE '".$_GET['org_id']."' = org_id";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['org_name'];
                                    ?></h1>

        </div>
      </div>
      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <?php
                //$sql = "SELECT * FROM organizations WHERE '".$_SESSION['u_id']."' = owner_id";
                //$result = mysqli_query($conn, $sql);
            ?>
            <tr><p>Organization's Name: <?php echo $row['org_name']?></p></tr>
            <tr><p>Organization's Address: <?php echo $row['address']?></p></tr>
            <tr><p>Organization's Owner: <?php echo $row['owner_name']?></p></tr>
            <tr><p>Organization's Members: <?php 
                
                $sql2    = "SELECT user_id
                            FROM user_org
                            WHERE org_id = '".$_GET['org_id']."'";
                $result2 = mysqli_query($conn, $sql2);

                while($row2 = mysqli_fetch_assoc($result2)){
                    $sql3 = "SELECT * FROM users WHERE user_id = '".$row2['user_id']."'";
                    $result3 = mysqli_query($conn, $sql3);
                    $row3 = mysqli_fetch_assoc($result3);
                    ?>
                    <div><?php echo $row3['user_first'];
                               echo ' ';
                               echo $row3['user_last'];?></div>
                    <?php
                }

                         
                         ?></p></tr>
        </div>
          <div class="col-md-4">
          <?php echo '<a href=editorg.php?org_id=' . $row['org_id'] . '" class ="btn btn-primary-active" role="button"> Edit</a><br>'; ?>
          <!--<a href="editorg.php?org_id=" class="btn btn-primary active" role="button" aria-pressed="true">Edit</a>-->
          </div>

    </main>

    <footer class="container">
      <!--<p>&copy; Company 2017-2018</p>-->
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>