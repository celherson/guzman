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
<form action="<?php htmlspecialchars("PHP_SELF"); ?>"class="sign-up-form">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username">
                    <span class="error"><?php echo$UsernameErr;?> </span>   
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Email">
                    <span class="error"><?php echo$emailErr;?> </span>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" >
                    <span class="error"><?php echo $passwordErr;?> </span>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Repassword" >
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
                    <button class="btn" id="sign-up-btn"><a href="signup.php">signup</a></button>
                </div>
                <img src="robot1.gif" alt="" class="image">
            </div>
        </div>
    </div>
    <script src="log in.js"></script>
</body>
</html>
