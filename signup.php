<?php 

session_start();

require 'connection.php';
        
        $_SESSION['message'] = '';
      
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          if(isset($_POST['signup'])){
                
                //session variables that will be used on profile page
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['firstName'] = $_POST['firstName'];
                $_SESSION['lastName'] = $_POST['lastName'];

                $email = $_POST['email'];
                $pass= base64_encode($_POST['psw']); //password secured
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $DOB = date('Y-m-d',strtotime($_POST['dob']));
                $gender = $_POST['gender'];
                
                //Checking if email already exists
                $ex = $mysqli->query("SELECT * FROM users WHERE email ='$email'") or die($mysqli->error());
                
                //if the number of rows is more that zero then user with the email exists
                if($ex->num_rows > 0){
                  $_SESSION['message'] = 'The email address you have entered is already registered.';
                  header(signup.php);
                }
                else{
                     //checkimg if netered passwords match
                     if($_POST['psw']== $_POST['psw-repeat']) {
                
                        $sql = "INSERT INTO users (email, pass, firstName, lastName, gender, DOB)"
                         . "VALUES ($email', '$pass', '$firstNname', '$lastName', '$gender', '$DOB')";
              
                         if($mysqli->query($sql) === true) {
                            $_SESSION['message'] = "$firstName, you have resgistered succesfully!";
                            header("location: profile.php");
                           }
                          else{
                            $_SESSION['message'] = "Registration failed";
                          }
                      }
                      else{
                          $_SESSION['message'] = "Passwords don't match";
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
<form action="signup.php" id="modal_feedback" method="POST" accept-charset="UTF-8" style="border:1px solid #ccc">
    <div class = "error"> <?= $_SESSION['message'] ?></div>
  <div class="container">
    <h1 style = "color: #007bff" >Sign Up</h1>
    <p style = "color: #2B3856" >Please fill in this form to create an account.</p>
    <hr>

    <label for="firstName"><b>*First Name </b></label>
    <input type="text" placeholder="Enter name here" name="firstName" autofocus required>

    <label for="lastname"><b>*Lastname</b></label>
    <input type="text" placeholder="Enter lastname here" name="lastName" required>

    <label for="email"><b>*Email</b></label>
    <input type="text" placeholder="Enter email here"  name="email" required>

    <label for="psw"><b>*Password</b></label>
    <input type="password" placeholder="Enter password here"  name="psw" required>

    <label for="psw-repeat"><b>*Repeat Password</b></label>
    <input type="password" placeholder="Repeat password here"  name="psw-repeat" required>

    <label for="dob"><b> Date of Birth</b></label> <br><br>
    <input style = "font-size:15px; text-align: center"  type="date" name="dob">
     <br>

    <label for="gender"><b> Gender</b></label> <br> <br>
    <input type="radio" name="gender" value="male"> Male
    <input type="radio" name="gender" value="female"> Female 
    <input type="radio" name="gender" value="other"> Other 
    <hr>
    
    <p>By creating an account you agree to our
     <a id="Btn" style="color:dodgerblue" href="#">Terms & Privacy</a>
                <div id="prPo" class="privacy">
                  <div class="privacy-content">
                    <span class="close">&times;</span>
                      <p> 
                        <h1 style = "color: #007bff"> <center> Privacy Notice </center> </h1> 
                        <br/>This privacy notice discloses the privacy practices for Unitopia. This privacy notice applies solely to information collected by this website. It will notify you of the following:
                        <br/>
                        <br/>1. What personally identifiable information is collected from you through the website, how it is used and with whom it may be shared.
                        <br/>2. What choices are available to you regarding the use of your data.
                        <br/>3. The security procedures in place to protect the misuse of your information.
                        <br/>4. How you can correct any inaccuracies in the information.<br/>
                        <br/> <h3 style = "color: #2B3856"> Information Collection, Use, and Sharing </h3> 
                        We are the sole owners of the information collected on this site. We only have access to/collect information that you voluntarily give us via email or other direct contact from you. We will not sell or rent this information to anyone.
                        <br/> We will use your information to respond to you, regarding the reason you contacted us. We will not share your information with any third party outside of our organization, other than as necessary to fulfill your request, e.g. to ship an order.
                        <br/> Unless you ask us not to, we may contact you via email in the future to tell you about specials, new products or services, or changes to this privacy policy.<br/>
                        <br/><h3 style = "color: #2B3856"> Your Access to and Control Over Information </h3> 
                        You may opt out of any future contacts from us at any time. You can do the following at any time by contacting us via the email address or phone number given on our website: <br/>
                        <br/> - See what data we have about you, if any.
                        <br/> - Change/correct any data we have about you.
                        <br/> - Have us delete any data we have about you.
                        <br/> - Express any concern you have about our use of your data.<br/>
                        <br/> <h3 style = "color: #2B3856" > Security </h3> 
                        We take precautions to protect your information. When you submit sensitive information via the website, your information is protected both online and offline.
                        Wherever we collect sensitive information (such as credit card data), that information is encrypted and transmitted to us in a secure way. You can verify this by looking for a lock icon in the address bar and looking for "https" at the beginning of the address of the Web page.
                        While we use encryption to protect sensitive information transmitted online, we also protect your information offline. Only employees who need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable information. 
                        The computers/servers in which we store personally identifiable information are kept in a secure environment.
                        <br/><b style = "color: #2B3856" >If you feel that we are not abiding by this privacy policy, you should contact us immediately via telephone at XXX YYY-ZZZZ or via email.</b>
                     </p>
                  </div>
                  </div>
           </p>
                <!-- JS for privacy policy window -->
                <script>

                  var modal = document.getElementById('prPo');

                  // The button that opens the window
                  var btn = document.getElementById("Btn");

                  // Get the <span> element that closes the window
                  var span = document.getElementsByClassName("close")[0];

                  // By clicking opens up the window 
                  btn.onclick = function() {
                    modal.style.display = "block";
                  }

                  // By clicking on <span> (x) closes the window
                  span.onclick = function() {
                    modal.style.display = "none";
                  }

                  // By clicking outside the box, closes the window
                  window.onclick = function(event) {
                    if (event.target == modal) {
                      modal.style.display = "none";
                    }
                  }
                  </script>
    <div class="clearfix">
       <a href="index.html" > <button  type="button" class="cancelbtn"> Cancel </button> </a>
      <button type="submit" name="signup" value="Signup" class="signupbtn"> <a id="modal_close" href="#">Sign Up</button>

    </div>
  </div>
</form>
</div> 

<script type="text/javascript" src="feedback.js"></script>

</body>
</html>
	
 



