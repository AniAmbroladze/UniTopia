<?php 
session_start();
require 'connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['signin'])){

    $email = $_POST['email'];
    $ex = $mysqli->query("SELECT * FROM users WHERE email ='$email'");
    
    //checking if user exists
    if($ex->num_rows == 0){
      $_SESSION['message'] = 'This email has not been registered.';
      header("signin.php");
    }
    else {
      //storing user data inside user array
      $user = $ex->fetch(PDO::FETCH_ASSOC);

      //verifying password
      $validPassword = password_verify($_POST['psw'], $user['psw']);
        if($validPassword){
          $_SESSION['email'] = $email;
          $_SESSION['firstName'] = $_POST['firstName'];
          $_SESSION['lastName'] = $_POST['lastName'];

          header('Location: profile.php');
        }
        else{
          $_SESSION['message'] = 'Password is not correct. Try again!';
          header("login.php");
        }
    }
  
  }
    
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel= "stylesheet" type = "text/css" href = "sign.css">
</head>
<body>
<div id="modal_wrapper">
<form class = "signin" action="signin.php" id="modal_feedback" method="POST" accept-charset="UTF-8" style="border:1px solid #ccc" enctype = "multipart/form-data" autocomplete = "off">
  <div class = "error"> <?= $_SESSION['message'] ?></div>
  <div class="container"> 
    <h1 style = "color: #007bff" >Sign In</h1>
    <hr>

    <label for="email"><b>*Email</b></label>
    <input type="text" placeholder="Enter email here" name="email" required>

    <label for="psw"><b>*Password</b></label>
    <input type="password" placeholder="Enter password here" name="psw" required>
    <hr>

    <div class="clearfix">
       <a href="index.html" > <button  type="button" class="cancelbtn"> Cancel </button> </a>
      <button type="submit" name="signin" value="Signin" class="signupbtn"> <a id="modal_close" href="#">Sign In</button>

    </div>
  </div>
</form>
</div> 

<script type="text/javascript" src="feedback.js"></script>

</body>
</html>
