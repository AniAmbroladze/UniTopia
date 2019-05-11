<?php
    
    $servername = "clabsql";  
    $username = "aambroladz";   
    $password = "r9YCuEk8";        
    $dbname = "UniTopia"; 
  
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        echo ' not connected';
    }
    else
        echo 'connected';
        mysqli_close($conn);
?>