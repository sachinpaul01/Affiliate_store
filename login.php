<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    
    $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id, $db_email, $db_password);
    $stmt->fetch();

    if (password_verify($password, $db_password)) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $db_email; 
        header("Location: home.php");
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Seekify</title>
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
        <h2>🔑 Login</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>

        <p>Don't have an account? <a href="signup.php" class="link">Signup</a></p>
    </div>

</body>
</html>
