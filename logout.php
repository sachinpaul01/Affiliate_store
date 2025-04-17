<?php
session_start();
session_destroy(); 

echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Logging Out...</title>
    <style>
        body { 
            background-color: rgb(69, 193, 215); 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            font-family: Arial, sans-serif; 
            text-align: center;
        }
        .logout-message {
            font-size: 22px;
            font-weight: bold;
            color: #ff3300;
        }
        .spinner {
            margin-top: 20px;
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255, 102, 0, 0.3);
            border-top: 5px solid #ff3300;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div>
        <p class='logout-message'>Logging out... Please wait</p>
        <div class='spinner'></div>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = 'index.php'; 
        }, 2000); // Redirect after 2 seconds
    </script>
</body>
</html>
";
exit();
?>
