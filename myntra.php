<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$myntra_products = [
    ["Girls Yoke Design Panelled Gotta Patti Kurta", "https://www.myntra.com/kurta-sets/silk+sparrow/silk-sparrow-girls-yoke-design-panelled-gotta-patti-kurta-with-sharara--with-dupatta/31702992/buy", "https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/2024/NOVEMBER/22/ciW1lvN3_6b7949a719fd42168b95e49099064a49.jpg"],
    ["Girls Ethnic Motifs Printed Regular Kurti", "https://www.myntra.com/kurta-sets/silk+sparrow/silk-sparrow-girls-ethnic-motifs-printed-regular-gotta-patti-pure-cotton-kurti-with-trousers/31702993/buy", "https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/2024/NOVEMBER/22/zDIFoepg_c867e04e613a4c7a9b013f91cb98ad92.jpg"],
    ["Floral Panelled Gotta Patti Kurta", "https://www.myntra.com/kurta-sets/silk+sparrow/silk-sparrow-girls-floral-panelled-gotta-patti-pure-cotton-kurta-with-sharara--with-dupatta/31702988/buy", "https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/2024/NOVEMBER/22/talWyu3F_79d872bfb1624fbdb261451da1f6f274.jpg"],
    ["Floral Printed Angrakha Gotta Patti Kurta", "https://www.myntra.com/kurta-sets/silk+sparrow/silk-sparrow-girls-floral-printed-angrakha-gotta-patti-kurta-with-sharara--with-dupatta/31702973/buy", "https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/2024/NOVEMBER/22/QTKCVc8V_e8555e987b374aeda70a9572fd7d261f.jpg"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Myntra Store</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin: 30px 0;
            color: #e60073;
            font-size: 2em;
        }

        .back-link {
            text-align: center;
            margin-bottom: 20px;
        }

        .back-link a {
            text-decoration: none;
            background-color: #eee;
            padding: 10px 20px;
            color: #333;
            border-radius: 25px;
            font-weight: bold;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 30px;
        }

        .product {
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            width: 220px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .product:hover {
            transform: scale(1.05);
        }

        .product img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .product h3 {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
        }

        .product a {
            background-color: #ff3f6c;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }

        .product a:hover {
            background-color: #d9365c;
        }

        .search-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .search-container input {
            padding: 10px;
            width: 300px;
            margin-right: 10px;
        }

        .search-container button {
            padding: 10px;
            background-color: #ff3f6c;
            color: white;
            border: none;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #d9365c;
        }
    </style>
</head>
<body>

    <h2>🛍️ Myntra Store</h2>
    <div class="back-link">
        <a href="../home.php">← Back to Home</a>
    </div>

    <!-- Search Form -->
    

    <div class="product-container">
        <?php
        // Handle the form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include '../functions.php';

            $userQuery = $_POST['search_query'];
            
            // Call OpenAI API to search based on user query
            $searchResults = searchOpenAI($userQuery);
            
            if ($searchResults && isset($searchResults['choices'][0]['text'])) {
                echo "<h2>Results from OpenAI:</h2>";
                echo "<p>" . nl2br(htmlspecialchars($searchResults['choices'][0]['text'])) . "</p>";
            }
        }

        // Display Myntra products (static display for now)
        foreach ($myntra_products as $product):
        ?>
            <div class="product">
                <img src="<?= $product[2] ?>" alt="<?= htmlspecialchars($product[0]) ?>">
                <h3><?= htmlspecialchars($product[0]) ?></h3>
                <a href="<?= $product[1] ?>" target="_blank">View Product</a>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>
