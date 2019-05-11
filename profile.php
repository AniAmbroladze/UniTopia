<?php 
session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
<link rel= "stylesheet" type = "text/css" href = "profile.css">
</head>
<body>
    <div class = "profile">
       <center> <div class = "error"> <?php echo $_SESSION['message'] ?> </div> </center>
        <img src="img/profile.png" alt="prof" style="width:100%">
        <h1 style = " color: #2B3856"> <span> <?php echo $_SESSION["firstName"],$_SESSION["firstName"] ; ?> </span> </h1>
        <p class="email"><span> <?php echo $_SESSION['email'] ?></p>
        <p> <button> <a href = "logout.php">  Log out</a></button></p> 
    </div>
</body>
</html>
