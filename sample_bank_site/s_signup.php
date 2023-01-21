<?php
    
$showAlert = false; 
$showError = false; 
$exists = false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
    include 'config.php';   
    
    $nameParts = "";
    
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 
    $cpassword = $_POST["cpassword"];
    $fullname = $_POST["fullname"];
    
    $nameParts = explode(" ", $fullname);
    $lastname = array_pop($nameParts);
    $firstname = implode(" ", $nameParts);
    
    $sql = "Select * from users where username='$username'";
    
    $result = mysqli_query($db, $sql);
    
    $num = mysqli_num_rows($result); 
    // This sql query is use to check if
    // the username is already present 
    // or not in our Database    
    if($num == 0) {
        if(($password == $cpassword) && $exists==false) {
            $sql = "INSERT INTO users (username, 
                password, created_at, firstname, lastname) VALUES ('$username', 
                '$password', current_timestamp(), '$firstname', '$lastname')";
        
            $result = mysqli_query($db, $sql);
    
            if ($result) {
                $showAlert = true; 
            }
            
            header("location: login.php");
        } 
        else { 
            $showError = "Passwords do not match"; 
        }      
    }// end if 
    
   if($num>0) 
   {
      $exists="Username not available"; 
   } 
    
}

?>