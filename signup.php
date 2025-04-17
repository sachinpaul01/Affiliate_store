<?php
session_start();
include 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $otp = rand(100000, 999999);

    $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check_email) > 0) {
        $error = "❌ Email already registered!";
    } else {
        $query = "INSERT INTO users (email, password, otp_code, is_verified) VALUES ('$email', '$password', '$otp', 0)";

        if (mysqli_query($conn, $query)) {
            $_SESSION['email'] = $email;

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'y8233522@gmail.com';
                $mail->Password = 'eudb ylom nupk icfy'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('y8233522@gmail.com', 'Seekify');
                $mail->addAddress($email);
                $mail->Subject = 'Your OTP Code';
                $mail->Body = "Your OTP code is: $otp";

                $mail->send();
                header("Location: verify_otp.php");
                exit();
            } catch (Exception $e) {
                $error = "❌ Error sending OTP: {$mail->ErrorInfo}";
            }
        } else {
            $error = "❌ Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | Seekify</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(69, 193, 215);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: whitesmoke;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            height: 200px;
            width: 600px;
        }
        h2 {
            color: black;
            font-size: 1.5em;
            margin-bottom: 15px;
        }
        .form-group {
            width: 100%;
            text-align: left;
            margin-bottom: 10px;
        }
        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 2px solid rgb(174, 160, 150);
            border-radius: 20px;
            outline: none;
            font-size: 16px;
            display: block;  
            box-sizing: border-box;
        }
        input:focus {
            border-color: #ff3300;
            box-shadow: 0px 0px 8px rgba(255, 102, 0, 0.5);
        }
        button {
            width: 100%;
            padding: 12px;
            background: rgb(44, 43, 41);
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            transition: 0.3s;
        }
        button:hover {
            background: #ff3300;
            transform: scale(1.05);
        }
        .error {
            color: red;
            font-size: 14px;
        }
        .link {
            color: #ff3300;
            text-decoration: none;
        }
        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>🪪 Signup</h2>

    <?php if (!empty($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form action="signup.php" method="post">
        <div class="form-group">
      
        <input type="email" name="email" placeholder="Email" style="width: 100%; padding: 15px; font-size: 18px; border-radius: 30px; border: 1px solid #ccc;">


        </div>

        <div class="form-group">
   
        <input type="password" name="password" placeholder="Password" style="width: 100%; padding: 15px; font-size: 18px; border-radius: 30px; border: 1px solid #ccc;">

        </div>

        <button type="submit">Sign Up</button>
    </form>

    <p class="login-text">
        Already have an account? <a href="login.php" class="login-button">Login</a>
    </p>
</div>






</body>
</html>
