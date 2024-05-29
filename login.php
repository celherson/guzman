<?php
$Email = $Password = "";
$EmailErr = $PasswordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Email"])) {
        $EmailErr = "Email is Required";
    } else {
        $Email = $_POST["Email"];
    }
    if (empty($_POST["Password"])) {
        $PasswordErr = "Password is Required";
    } else {
        $Password = $_POST["Password"];
    }
    if ($Email && $Password) {
        include("Action/connection.php");

        $check_Email = mysqli_query($_connections, "SELECT Email, Password, Account_Type FROM login WHERE email='$Email'");
        $check_Email_row = mysqli_num_rows($check_Email);
        
        if ($check_Email_row > 0) {
            $row = mysqli_fetch_assoc($check_Email);
            $db_Password = $row["Password"];
            $db_Account_Type = $row["Account_Type"];

            if ($db_Password == $Password) {
                if ($db_Account_Type == "1") {
                    echo "<script>window.location.href='admin.php';</script>";
                } else {
                    echo "<script>window.location.href='User.php';</script>";
                }
            } else {
                $PasswordErr = "Password is incorrect";
            }
        } else {
            $EmailErr = "Email not found";
        }
        mysqli_close($_connections);
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="log in.css">
    <title>signin-signup</title>
</head>
<video autoplay loop muted plays-inline class="back-video">
    <source src="artificial.mp4" type="video/mp4">
  </video>
<body>
   
    <div class="container">
        <div class="signin-signup">
            <form action="<?php htmlspecialchars("PHP_SELF"); ?>" method="post" class="sign-in-form">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="Email" placeholder="Email">
                    <span class="error"><?php echo $EmailErr;?> </span>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="Password" value="<?php echo $Email;?>"placeholder="password">
                    <span class="error"><?php echo $PasswordErr;?> </span>
                </div>
                <input type="submit" value="Login"  class="btn">
                <p class="social-text" >Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a></p>
            </form>

            <?php
$logname=$logpass=$Username=$RegEmail=$password=$Repassword="";
$lognameErr=$logpassErr=$UsernameErr=$RegEmailErr=$passwordErr=$RepasswordErr="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["logname"]))
    {
        $lognameErr="Username Is Required";
    }
    else
    {
        $logname=$_POST["logname"];
    }
    if(empty($_POST["logpass"]))
    {
        $logpassErr="Password Is Required";
    }
    else
    {
        $logpass=$_POST["logpass"];   
    }
    if(empty($_POST["Username"]))
    {
        $UsernameErr="Username Is Required";
    }
    else
    {
        $Username=$_POST["Username"];
    }

    if(empty($_POST["RegEmail"]))
    {
        $RegEmailErr="Email Is Required";
    }
    else
    {
        $RegEmail=$_POST["RegEmail"];   
    }
    if(empty($_POST["Repassword"]))
    {
        $RepasswordErr="ConfirmPassword Is Required";
    }
    else
    {
        $Repassword=$_POST["Repassword"];   
    }
}
?>
<style>
    .error{
        color:red;
    }
</style>
            <form action="<?php htmlspecialchars("PHP_SELF"); ?>" method="post"class="sign-up-form">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="logname" placeholder="Username">
                    <span class="error"><?php echo$lognameErr;?> </span>
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="RegEmail" placeholder="Email">
                    <span class="error"><?php echo$RegEmailErr;?> </span>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="logpass" placeholder="Password" >
                    <span class="error"><?php echo$logpassErr;?> </span>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                   <input type="password" name="Repassword" placeholder="Repassword" >
                   <span class="error"><?php echo$RepasswordErr;?> </span>
                   
                </div>
                <input type="submit" value="Sign up" class="btn">
                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p>
            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Already have an account??</h3>
                    <p>click the button at the bottom of the text to sign in your registered account</p>
                    <button class="btn" id="sign-in-btn">Sign in</button>
                </div>
                <img src="robot2.gif" alt="" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Don't have account??</h3>
                    <p>Why not to click the sign in button here at the bottom of the text to create and register your account</p>
                    <button class="btn" id="sign-up-btn">signup</button>
                </div>
                <img src="robot1.gif" alt="" class="image">
            </div>
        </div>
    </div>
    <script src="log in.js"></script>
</body>
</html>
