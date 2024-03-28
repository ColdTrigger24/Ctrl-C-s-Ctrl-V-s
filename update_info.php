<?php
    session_start();
    include "header.html";
    include "database.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["update_Username"];
        $email = $_POST["update_email"];
        $OldPassword = $_POST["prev_Passwords"];
        $password = $_POST["update_Passwords"];
        $phone = $_POST["update_Phnno"];
        $hash = password_hash($password, PASSWORD_DEFAULT); 

        $sql = "SELECT * FROM users WHERE user = '$username'";
        $result =  mysqli_query($conn, $sql);
        
        if((mysqli_num_rows($result) == 0) || ($username == $_SESSION["username"])){

            if(password_verify($OldPassword, $_SESSION["password"])) {
                $temp = $_SESSION["id"];
                $sql = "UPDATE users SET user = '$username', email = '$email', password = '$hash', phone = '$phone' WHERE id = '$temp'";
                mysqli_query($conn, $sql);
                $sql = "SELECT * FROM users WHERE user = '$username'";
                $result =  mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                $_SESSION["username"] = $username;
                $_SESSION["email"] = $row["email"];                    
                $_SESSION["password"] = $row["password"];
                $_SESSION["phone"] = $row["phone"];
                $_SESSION["id"] = $row["id"];

                header("Location: home.php");
            }
            else{
                echo '<script>alert("Incorrect old password!")
                    window.location.replace("update_info.php");</script>';
            }

        }
        else{
            echo '<script>alert("Username already taken, please enter another one!")
                        window.location.replace("update_info.php");</script>';
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
    <div class="update_wrapper">
        <div class="update-box">
            <h2>Update Profile</h2>
            <form action=# method="POST">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" name="update_Username" pattern="^[A-Z]{2}\s[0-9]{2}\s[A-Z]{0,2}\s?[0-9]{4}$" required placeholder="">
                    <label>New Username(Eg:TN 39 ZZ 4444)</</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="update_email" required placeholder="">
                    <label>New Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock"></ion-icon>
                    </span>
                    <input type="password" name="update_Passwords" required placeholder="">
                    <label>New Password</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="call"></ion-icon>
                    </span>
                    <input type="tel" name="update_Phnno" pattern="[0-9]{10}" required placeholder="">
                    <label>New Phone Number(+91)</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock"></ion-icon>
                    </span>
                    <input type="password" name="prev_Passwords" required placeholder="">
                    <label>Previous Password</label>
                </div>
                <input type="submit" class="btn" name="upbtn" value="Update">
            </form>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    
</body>
</html>