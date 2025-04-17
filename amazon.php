<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Amazon Store</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            color: #333;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 30px;
            gap: 20px;
        }

        .product {
            background: white;
            border-radius: 10px;
            padding: 15px;
            width: 220px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .product img {
            width: 100%;
            height: 150px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .product h3 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .product a {
            text-decoration: none;
            padding: 8px 12px;
            background-color: #ff9900;
            color: white;
            border-radius: 5px;
            display: inline-block;
        }

        .product a:hover {
            background-color: #e68a00;
        }
    </style>
</head>
<body>

<h2>Amazon Deals 🛍️</h2>
    <div class="back-link">
        <a href="../home.php">← Back to Home</a>
    </div>


<div class="product-container">
    <?php
    $amazonProducts = [
        ["Coffee Mug", "https://amzn.to/4k8CNsH", "https://m.media-amazon.com/images/I/5154ybFj+CL._SY300_SX300_.jpg"],
            ["Foldable Study Table", "https://amzn.to/4i8FXuT", "https://m.media-amazon.com/images/I/61KQngf3JZL._SY355_.jpg"],
            ["ASUS Laptop", "https://amzn.to/4hHOapZ", "https://m.media-amazon.com/images/I/61fsBFww9DL._SY450_.jpg"],
            ["Wireless Earbuds", "https://amzn.to/3CV0wMl", "https://m.media-amazon.com/images/I/51oMWaW7tKL._SX522_.jpg"],
            ["Smartwatch", "https://amzn.to/4hHPskX", "https://m.media-amazon.com/images/I/61xSTnSOkuL._SX425_.jpg"],
            ["Bluetooth Speaker", "https://amzn.to/4hJWG7N", "https://m.media-amazon.com/images/I/51waOv47fqL._SX425_.jpg"],
            ["Gaming Keyboard", "https://amzn.to/4hQaKNm", "https://m.media-amazon.com/images/I/610P9MPegbL._SY355_.jpg"],
            ["LED Desk Lamp", "https://amzn.to/417pj7R", "https://m.media-amazon.com/images/I/61ZZsD+2yUL._SX425_.jpg"],
            ["USB-C Hub", "https://amzn.to/415qHYO", "https://m.media-amazon.com/images/I/41wh-yV335L._SX300_SY300_QL70_FMwebp_.jpg"],
            ["Noise Cancelling Headphones", "https://amzn.to/4i2Iuqj", "https://m.media-amazon.com/images/I/51aXvjzcukL._SY355_.jpg"],
            ["Wireless Mouse", "https://amzn.to/3XczEhQ", "https://m.media-amazon.com/images/I/31sZwMws98L._SX300_SY300_QL70_FMwebp_.jpg"],
            ["Mobile Phone", "https://amzn.to/4hLaHSC", "https://m.media-amazon.com/images/I/61Ml1nEENhL._SY550_.jpg"],
            ["4K Webcam", "https://amzn.to/3Qr8q3e", "https://m.media-amazon.com/images/I/61-K2lXmHQL._SY355_.jpg"],
            ["Ergonomic Office Chair", "https://amzn.to/3QqPIZr", "https://m.media-amazon.com/images/I/71dJfDuMHIL._SX425_.jpg"],
            ["Portable Hard Drive", "https://amzn.to/3QMpIYR", "https://m.media-amazon.com/images/I/81VKxjrWZdL._SX425_.jpg"],
            ["Wireless Charger", "https://amzn.to/4i1mo7q", "https://m.media-amazon.com/images/I/71O59aVg-cL._SY450_.jpg"],
            ["Standing Desk", "https://amzn.to/3ENNO2A", "https://m.media-amazon.com/images/I/913z4oJCuoL._SX425_.jpg"],
            ["Ring Light", "https://amzn.to/41yXhnr", "https://m.media-amazon.com/images/I/6120eLkzksL._SX425_.jpg"],
            ["Noise Cancelling Earbuds", "https://amzn.to/4hHSQwb", "https://m.media-amazon.com/images/I/51LxiMjx3XL._SY355_.jpg"],
            ["Power Bank", "https://amzn.to/3EWdoSQ", "https://m.media-amazon.com/images/I/518+NKyTn4L._SX522_.jpg"],
            ["Portable Mini Projector", "https://amzn.to/3XbYQVH", "https://m.media-amazon.com/images/I/51bGfdFAG5L._SX425_.jpg"],
            ["External SSD", "https://amzn.to/4hHTjOP", "https://m.media-amazon.com/images/I/711-n+US0bL._SY355_.jpg"],
            ["Echo Dot (Smart Speaker)", "https://amzn.to/413BzX7", "https://m.media-amazon.com/images/I/71jNr0MoZEL._SX425_.jpg"],
            ["Smart Fitness Tracker", "https://amzn.to/41sIE3N", "https://m.media-amazon.com/images/I/61RP7sa++KL._SY355_.jpg"],
            ["Compact Digital Camera", "https://amzn.to/4k9KfUi", "https://m.media-amazon.com/images/I/71UKHtv92KL._SY355_.jpg"],
            ["Electric Toothbrush", "https://amzn.to/4ba1ml1", "https://m.media-amazon.com/images/I/61tMDjfhnLL._SY450_.jpg"],
            ["HP Laptop", "https://amzn.to/3QqsGBR", "https://m.media-amazon.com/images/I/712iZsrH3kL._SY450_.jpg"],
            ["iPhone", "https://amzn.to/3QrN59D", "https://m.media-amazon.com/images/I/615O-NFQKdL._SX522_.jpg"]
    ];

    foreach ($amazonProducts as $product) {
        echo '
        <div class="product">
            <img src="'.$product[2].'" alt="'.$product[0].'">
            <h3>'.$product[0].'</h3>
            <a href="'.$product[1].'" target="_blank">Buy Now</a>
        </div>';
    }
    ?>
</div>

</body>
</html>
