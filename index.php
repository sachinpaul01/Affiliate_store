<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate Store</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:rgb(230, 230, 236);
            color: #333;
        }
        h1 {
            text-align: center;
            margin: 20px 0;
            color:rgb(255, 255, 255);
        }
        .auth-buttons {
            text-align: center;
            margin: 20px 0;
        }
        .auth-buttons .btn {
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        .auth-buttons .btn:hover {
            background-color: #0056b3;
        }
        section {
            padding: 20px;
            margin: 50px auto;
            max-width: 800px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        section h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        section p {
            line-height: 1.6;
            color: #555;
        }
        form input, form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        form button {
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Seek Better Deals 🔍</h1>
    <div class="auth-buttons">
        <a href="login.php" class="btn">Login</a>
        <a href="signup.php" class="btn">Signup</a>
    </div>

    <!-- About Us Section -->
    <section id="about-us">
        <h2>About Us</h2>
        <p>
            Welcome to Affiliate Store! We are dedicated to helping you find the best deals across multiple stores. 
            Our platform aggregates products from Amazon, Meesho, Myntra, and more, ensuring you get the best.
        </p>
    </section>

    <!-- Contact Us Section -->
    <section id="contact-us">
        <h2>Contact Us</h2>
        <p>
            Have questions or need assistance? Feel free to reach out to us!
        </p>
        <form action="contact_form.php" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </section>
</body>
</html>