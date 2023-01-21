<?php   
    include("config.php");

    if(!isset($_SESSION)) 
    { 
        $session = session_start();
    } 

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 

        // $username = mysqli_real_escape_string($db,$_POST['username']);
        // $password = mysqli_real_escape_string($db,$_POST['password']); 
        $username = $_POST['username'];
        $password = $_POST['password']; 


        $sql = "SELECT id FROM users WHERE username = '$username' and password = '$password'";
        

        $result = mysqli_query($db,$sql);

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        if ($row != NULL) {

            $active = $row['id'];
            
            $count = mysqli_num_rows($result);
            // If result matched $myusername and $mypassword, table row must be 1 row

            $sql = "SELECT firstname, username FROM users WHERE username = '$username' and password = '$password'";
            $result = mysqli_query($db,$sql);
            
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            $displayName = $row['firstname'];
            $loginName = $row['username'];
            
            if($count >= 1) {
                $_SESSION['login_user'] = $loginName;
                $_SESSION['display_name'] = $displayName;
                $_SESSION['id'] = $active;
                header("location: user_account.php");
            } else {
                echo "Your Login Name or Password is invalid";
            }
        } else {
            echo "Your Username or Password is invalid";
        }
    }
?>
