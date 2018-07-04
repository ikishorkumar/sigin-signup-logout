<?php 
/* Main page with two forms: sign up and log in */
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.ico">
    <title>Welcome AND Logout</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/external.css" rel="stylesheet">
  </head>

  <body class="text-center">

  	<h1> welcome <?php echo $_SESSION['email']; ?></h1>
  <a href="logout.php"><button class="btn btn-lg btn-success center-block" name="logout"/>Log Out</button></a>

  <script type="text/javascript" src="js/external.js"></script>
  </body>
</html>