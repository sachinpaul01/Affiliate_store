<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['email'];
    $otp = mysqli_real_escape_string($conn, $_POST['otp']);

    $query = "SELECT * FROM users WHERE email='$email' AND otp_code='$otp'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $updateQuery = "UPDATE users SET is_verified=1, otp_code=NULL WHERE email='$email'";
        mysqli_query($conn, $updateQuery);

        echo "<script>alert('✅ Account verified successfully! You can now login.'); window.location='login.php';</script>";
    } else {
        $error = "❌ Invalid OTP! Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP | Seekify</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(69, 193, 215);
            text-align: center;
        }
        .container {
            max-width: 350px;
            margin: 80px auto;
            background: whitesmoke;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        h2 {
            color: black;
            font-size: 1.5em;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid rgb(174, 160, 150);
            border-radius: 20px;
            outline: none;
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
        <h2>🔑 Enter OTP</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="text" name="otp" placeholder="Enter OTP" required><br>
            <button type="submit">Verify</button>
        </form>

        <p>Didn’t receive OTP? <a href="signup.php" class="link">Signup again</a></p>
    </div>

</body>
</html>
