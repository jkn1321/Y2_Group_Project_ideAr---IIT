<?php 
session_start();
require_once('connect.php'); ?>

<?php

    if (isset($_POST['submit'])){

        $Username = $_POST['username'];
        $Email = $_POST['email'];
        $Password = $_POST['password'];

        $psquery="UPDATE users SET password = '$Password' WHERE username = '$Username' AND email = '$Email'";
        $psquery = mysqli_query($conn, $psquery);

        if(($psquery)){
            echo "<script>alert('Password updated');</script>";
        }        
        else{
            echo "<script>alert('Invalid username or email!');</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>

        /*Header*/
        .nav-outer{
          width: 100%;
          height: 70px;
          background-color: #F778A1;
          display: flex;
          position: fixed;
          top: 0;
          z-index: 2;
        }

        .logo-outer{
          width: 200px;
          display: flex;
          align-items: center;
          justify-content: center;
        }

        .logo-outer>img{
          height: 65px;
        }

        .nav-bar-context{
          flex: 1;
          display: flex;
          align-items: center;
          justify-content: flex-end;
        }

        .nav{
          list-style: none;
          display: flex;
        }

        .nav>li>span>a{
          color: white;
          text-decoration: none;
          font-size: 18px;
          text-transform: uppercase;
          font-family: 'Ubuntu', sans-serif;
        }

        .nav>li{
          border-right: 1px solid white;
          padding: 0 25px;
          border-bottom: 2px solid transparent;
          transition: 0.65s ease-in-out;

        }

        .nav>li:last-child{        /* >li: nth-child(3) */
           border-right: none;
           padding-right: 15px;
        }

        .nav>li:hover{
            border-color: white;
        }

        .nav>li>span>a:hover{
            color: #E75480;
        }


        /*Content*/
        body {
            font-family: 'Segoe UI', 'cursive';
            background-color: #FC6C85;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #ececec;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
            max-width: 100%;
        }

        .form-header {
            background-color: #F67280;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }

        .form-group1 {
            padding: 20px 20px 5px 20px;
        }
        .form-group2 {
            padding: 15px 20px 5px 20px;
        }
        .showp {
            padding: 0px 0px 5px 20px;
        }
        .form-group1 label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        .form-group2 label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        .showp label {
            display: inline;
            margin-bottom: 8px;
            color: #333;
        }


        .form-group1 input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group2 input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group button {
            font-family: 'Segoe UI';
            background-color: #F67280;
            color: #ffffff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-group button:hover {
            background-color: #E75480;
        }

        .form-footer {
            text-align: center;
            padding: 20px;
        }

        .form-footer a {
            color: #FC6C85;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
        
    
        footer {
            background-color: #F778A1;
            color: #576574;
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            border-top: 1px solid #FC6C85;
        }

    </style>
</head>

<body>

    <!--Header-->
    <div class="nav-outer">
        <div class="logo-outer">
            <img class="main-slider-logo" src="Logo.png"
                 alt="logo img">
        </div>
        <div class="nav-bar-context">
            <ul class="nav">
                <li><span><a href="">SHOP</a></span></li>
                <li><span><a href="">CART</a></span></li>
                <li><span><a href="">GALLERY</a></span></li>
                <li><span><a href="">LINK</a></span></li>
            </ul>
        </div>
        <div class="nav-bar-outer"></div>
    </div>

    <!--Content-->
    <div class="container">
        <form action="ideAr-forgot.php" method="post">

            <div class="form-header">
                <h2>Forgot Password</h2>
            </div>
            <div class="form-group1">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group2">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group3">
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="showp">
            
            <label for="showpassword">Show Password</label>
            <input type="checkbox" onclick="myFunction()">
            <script> function myFunction() {    
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }</script>
            </div>
            <div class="form-group">
                <center>
                    <button name="submit" type="submit">Update Password</button>
                </center>    
            </div>
            <div class="form-footer">
                <p>Remember your password? <a href="ideAr-login.php">Login</a></p>
                <p><a href="ideAr-signup.php">Create an account</a></p>
            </div>

        </form>
    </div>
    <footer >
        <p>&copy; 2024 ideAr</p>
    </footer>
</body>

</html>