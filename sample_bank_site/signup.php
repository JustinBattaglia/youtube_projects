<!DOCTYPE html>
<html>
    <style>
        * {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            overflow-y: hidden;
        }
        
        body {
            width: 100%;
            height: 100%;
        }
        
        form {
            font-family: arial;    
            margin: 23vh auto;
            border-radius: 10px;
        }
        
        #login-form {
            background-color: #fff;
            width: 50%;
            height: 400px;
        }
  
        #login-form input.user-icon {
            padding: 10px;
            border: none;
            width: 60%;
            color: #828282;
            border-radius: 20px;
            outline:none;
            background: url(images/user-icon.png) no-repeat left;
            background-position: 5% 50%;
            background-color: #d1d1d1;
            background-size: 10px;
            margin-bottom: 5px;
            padding-left: 35px; 
        }
        #login-form input.pass-icon {
            padding: 10px;
            border: none;
            width: 60%;
            color: #828282;
            border-radius: 20px;
            outline:none;
            background: url(images/pass-icon.png) no-repeat left;
            background-position: 5% 50%;
            background-color: #d1d1d1;
            background-size: 10px;
            margin-bottom: 5px;
            padding-left: 35px; 
        }
        
        
        #login-form label {
            color: #eee;
        }
        
        #login-form button {
            font-size: 1.1em;
            background-color: #fff;
            border: none;
            border-radius: 2px;
            background-color: rgb(133,30,255);
            background: -webkit-linear-gradient(left, rgba(51,97,255,1) 0%, rgba(133,30,255,1) 80%);
            background: -o-linear-gradient(left, rgba(51,97,255,1) 0%, rgba(133,30,255,1) 80%);
            background: linear-gradient(to right, rgba(51,97,255,1) 0%, rgba(133,30,255,1) 80%);
            transition-property: opacity;
            transition-duration: .2s;
            transition-timing-function: ease-in;
            width: 70%;
            border-radius: 20px;
            height: 40px;
            color: #fdfdfd;
            margin-bottom: 5px;
        }

        #login-form button:hover {
            cursor: pointer;  
            opacity: .68;
            color: white;
        }
        
        .form-container {
            display: flex;
            flex-direction: row; 
            width: 100%;
            height: 100%;
            box-shadow: 0px 0px 12px 2px rgba(0,0,0,0.75);
            -webkit-box-shadow: 0px 0px 12px 2px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 12px 2px rgba(0,0,0,0.75);
            border-radius: 10px;
        }
        .right {
            display: flex;
            flex-direction: column;
            width: 50%;
            justify-content: center;
            align-items: center;
        }
        .right h2 {
            margin-top: -20px;
            margin-bottom: 10px;
            color: #4d4d4d;
        }
        
        .left {
            display: flex;
            flex-direction: column;
            width: 40%;
            align-content: center;
            align-self: center;
            margin: 20px;
            border-right: 3px solid #851EFF;
            padding-right: 10px;
        }
        
        div.img-overlay {
            position: fixed;
            top:0;
            left: 0;
            display: block;
            z-index: -1;
        }
        
        div.img-overlay img {
            width: 100%;
            display: block;
        }
        
        .overlay {
            position: fixed;
            top:0;
            left: 0;
            background: -webkit-linear-gradient(left, rgba(51,97,255,1) 0%, rgba(133,30,255,1) 80%);
            background: -o-linear-gradient(left, rgba(51,97,255,1) 0%, rgba(133,30,255,1) 80%);
            background: linear-gradient(to right, rgba(51,97,255,1) 0%, rgba(133,30,255,1) 80%);
            display: block;
            width: 100vw;
            height: 100vh;
            z-index: 1;
            opacity: .4;
        }
    </style>
    <body>
        <form action="s_signup.php" method="post" id="login-form" autocomplete="off">  
            <div class="form-container"> 
               <div class="left">
                    <img src="images/personal-computer.png" alt="">   
                </div>  
                <div class="right">
                   <h2>Member Sign Up</h2>
                   <br>
                    <input class="user-icon" type="text" placeholder="Full Name" name="fullname" required>
                    <input class="user-icon" type="text" placeholder="Username" name="username" required> 
                    <input class="pass-icon" type="password" placeholder="Password" name="password" required>  
                    <input class="pass-icon" type="password" placeholder="Confirm Password" name="cpassword" required>
                    <br>
                    <button type="submit">Sign Up</button>   
                </div> 
            </div>   
        </form>
        <div class="img-overlay">
           <div class="overlay"></div>
           <img src="images/bg.jpg" alt="">
       </div>
    </body>
</html>