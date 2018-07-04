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
    <title>Signin And Signup Form</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/external.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <br><br>
      <form class="" action="index.php" method="post" name="logIn" onsubmit="return validate">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="psw" class="form-control" placeholder="Password" name="psw" required><br>
      <button class="btn btn-lg btn-primary center-block" type="submit" name="signin" class="Signin">Sign in</button>
      <button class="btn btn-lg btn-primary center-block" onclick="document.getElementById('id01').style.display='block'">Sign up</button>
    </form>


<!-- The Modal (contains the Sign Up form) -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">Close</span>
  <form class="modal-content" action="index.php"  method="post" name="signupform" id="signform" onsubmit="return validate">
    <div class="container">
      <h1 >Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required><br>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required><br>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="pswrepeat" required>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn center-block">Cancel</button>
        <button type="submit" name="signup" class="signup center-block">Sign Up</button>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript" src="js/external.js"></script>
  </body>
</html>

  <!-- PHP server code -->
<?php
$servername="localhost";
$username="databasek";
$password="123";
$dbname="databasek";
// CREATE CONNECTION
$conn = new mysqli($servername,$username,$password,$dbname);
//check connection
if($conn->connect_error){
  
  die("connection failed:".$conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['signin'])) { //user logging in
               # code...
                mysqli_select_db($conn,'databasek');
                $psw = $_POST['psw'];
                $email = $_POST['email'];

                $query = "select * from nk where email='$email' && psw ='$psw' ";
                $result= mysqli_query($conn, $query);
                $num = mysqli_num_rows($result);
                if ($num==1) {
                  $_SESSION['email']=$email;
                     header('Location:home.php');
                }
                else{
                   header('Location:index.php');
                }
            
    }
    else if (isset($_POST['signup'])) {
      $psw = $_POST['psw'];
      $email = $_POST['email'];
      $pswrepeat = $_POST['pswrepeat'];
      if ($pswrepeat !=$psw) {
               echo '<script language="javascript">';
               echo 'alert("password does not match")';
               echo '</script>';           # code...
      }
      else{
      # code...
        $sql="INSERT INTO nk (psw,email,pswrepeat) values('$psw','$email','$pswrepeat')";
        if ($conn->query($sql)===TRUE) {
          #echo "New record created successfully";
          echo '<script language="javascript">';
          echo 'alert("You have successfully signed up")';
          echo '</script>';
          # code...
        }
        else{
          echo "Error:".$sql."<br>".$conn->error;
        }
      }
    }
}

?>