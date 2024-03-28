<?php
    // Server credentials
    include "database.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["reg_Username"])){
            $username = $_POST["reg_Username"];
            $email = $_POST["reg_email"];
            $password = $_POST["reg_Passwords"];
            $phone = $_POST["reg_Phnno"];

            $hash = password_hash($password, PASSWORD_DEFAULT);

            if(password_verify($OldPassword, $_SESSION["password"])){
                $temp = $_SESSION["id"];
                $sql = "UPDATE users SET user = '$username', email ='$email', password='$hash', phone='$phone' where id=$temp ";
            }

            $sql = "INSERT INTO users (user, email, password, phone)
                    VALUES ('$username', '$email', '$hash', $phone)";

            try{
                mysqli_query($conn, $sql);
                header("Location: login.php"); 
            }
            catch(mysqli_sql_exception){
                echo '<script>alert("Username already taken, please enter another one!")
                      window.location.replace("login.php");</script>';
            }
        }
        else{
            $username = $_POST["log_username"];
            $password = $_POST["log_Passwords"];

            $sql = "SELECT * FROM users WHERE user = '$username'";
            $result =  mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0) {
                $row = mysqli_fetch_assoc($result);
                $user_pass = $row["password"];
                if(password_verify($password, $user_pass)) {
                    session_start();
                    $_SESSION["username"] = $username;
                    $_SESSION["email"] = $row["email"];                    
                    $_SESSION["password"] = $user_pass;
                    $_SESSION["phone"] = $row["phone"];
                    $_SESSION["id"] = $row["id"];
                    header("Location: home.php");
                }
                else{
                    echo '<script>alert("Invalid password!")
                          window.location.replace("login.php");</script>';
                }
            }
            else{
                echo '<script>alert("User doesn\'t exist! Please register")
                      window.location.replace("login.php");</script>';
            }
        }
    }

    mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In and Sign up Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <header>
        <h2 class="logo">Ctrl C's Ctrl V's</h2>
    </header>

    <div class="wrapper">

        <div class="form-box login">
            <h2>Login</h2>
            <form action=# method="POST">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" name="log_username" pattern="^[A-Z]{2}\s[0-9]{2}\s[A-Z]{0,2}\s?[0-9]{4}$" required placeholder="">
                    <label>Username(Eg:TN 39 ZZ 4444)</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock"></ion-icon>
                    </span>
                    <input type="password" name="log_Passwords" required placeholder="">
                    <label>Password</label>
                </div>
                <!-- <div class="remember-forgot">
                    <label>
                        <input type="checkbox">
                        Remember me
                    </label>
                    <a href="#">Forgot Password?</a>
                </div> -->
                <input type="submit" class="btn" name="logbtn" value="Login">
                <div class="login-register">
                    <p>
                        Don't have a account?
                        <a href="#" class="register-link">Register</a>
                    </p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <h2>Registeration</h2>
            <form action=# method="POST">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" name="reg_Username" pattern="^[A-Z]{2}\s[0-9]{2}\s[A-Z]{0,2}\s?[0-9]{4}$" required placeholder="">
                    <label>Username(Eg:TN 39 ZZ 4444)</</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="reg_email" required placeholder="">
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock"></ion-icon>
                    </span>
                    <input type="password" name="reg_Passwords" required placeholder="">
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="call"></ion-icon>
                    </span>
                    <input type="tel" name="reg_Phnno" pattern="[0-9]{10}" required placeholder="">
                    <label>Phone Number(+91)</label>
                </div>
                <div class="remember-forgot">
                    <!-- <label>
                        <input type="checkbox" required>
                        I agree to terms & condition
                    </label> -->
                </div>
                <input type="submit" class="btn" name="regbtn" value="Register">
                <div class="login-register">
                    <p>
                        Already have a account?
                        <a href="#" class="login-link">Login</a>
                    </p>
                </div>
            </form>
        </div>

    </div>

    <script src="script.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    
</body>
</html>