<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Meesho Store</title>
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            color: #e60000;
            font-size: 30px;
            font-weight: 600;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            text-decoration: none;
            color: #e60000;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .back-link a:hover {
            color: #ff6600;
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
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product:hover {
            transform: scale(1.05) translateY(-10px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        }

        .product img {
            width: 100%;
            height: 150px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .product h3 {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
        }

        .product a {
            text-decoration: none;
            padding: 8px 12px;
            background-color: #ff9900;
            color: white;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;
            font-size: 14px;
        }

        .product a:hover {
            background-color: #e68a00;
        }

        @media (max-width: 600px) {
            .product-container {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>

<h2>🛍️ Meesho Store</h2>
<div class="back-link">
    <a href="../home.php">← Back to Home</a>
</div>

<div class="product-container">
    <?php
    $meesho_products = [
        ["Stylish Saree", "https://www.meesho.com/af_invite/53714486:facebook:89749?p_id=396515963&ext_id=6k2pob&utm_source=facebook", "https://images.meesho.com/images/products/396515963/u60vg_512.webp"],
        ["Elegant Suit", "https://www.meesho.com/af_invite/53714486:facebook:89749?p_id=489812280&ext_id=83mdko&utm_source=facebook", "https://images.meesho.com/images/products/489812280/cyoiu_512.webp"],
        ["Trendy Kurti", "https://www.meesho.com/af_invite/53714486:facebook:89749?p_id=403024433&ext_id=6ny7n5&utm_source=facebook", "https://images.meesho.com/images/products/403024433/hoev0_512.webp"],
        ["Floral Dress", "https://www.meesho.com/af_invite/53714486:facebook:89749?p_id=407491057&ext_id=6qly41&utm_source=facebook", "https://images.meesho.com/images/products/407491057/nagzw_512.webp"],
        ["Traditional Wear", "https://www.meesho.com/af_invite/53714486:facebook:89749?p_id=313719770&ext_id=56s3q2&utm_source=facebook", "https://images.meesho.com/images/products/313719770/6dqxg_512.webp"],
        ["Printed Saree", "https://www.meesho.com/af_invite/53714486:facebook:89749?p_id=393634523&ext_id=6icycb&utm_source=facebook", "https://images.meesho.com/images/products/393634523/qppga_512.webp"],
        ["Designer Suit", "https://www.meesho.com/af_invite/53714486:facebook:89749?p_id=456250184&ext_id=7jn0w8&utm_source=facebook", "https://images.meesho.com/images/products/456250184/av2lw_512.webp"],
        ["Cotton Kurta", "https://www.meesho.com/af_invite/53714486:facebook:89749?p_id=237968313&ext_id=3xohix&utm_source=facebook", "https://images.meesho.com/images/products/237968313/97ukw_512.webp"],
        ["Embroidered Top", "https://www.meesho.com/af_invite/53714486:facebook:89749?p_id=386229233&ext_id=6dy8dt&utm_source=facebook", "https://images.meesho.com/images/products/386229233/nlubb_512.webp"],
        ["Stylish Frock", "https://www.meesho.com/af_invite/53714486:facebook:89749?p_id=498901268&ext_id=8916ok&utm_source=facebook", "https://images.meesho.com/images/products/498901268/ybglw_512.webp"],
        ["Trendy Gown", "https://www.meesho.com/af_invite/53714486:facebook:89749?p_id=292353396&ext_id=4u25bo&utm_source=facebook", "https://images.meesho.com/images/products/292353396/zpxp3_512.webp"],
        ["Casual Top", "https://www.meesho.com/af_invite/53714486:facebook:89749?p_id=340619559&ext_id=5msnqf&utm_source=facebook", "https://images.meesho.com/images/products/340619559/wrukz_512.webp"]
    ];

    foreach ($meesho_products as $product) {
        echo '
        <div class="product">
            <img src="' . $product[2] . '" alt="' . $product[0] . '">
            <h3>' . $product[0] . '</h3>
            <a href="' . $product[1] . '" target="_blank">View Product</a>
        </div>';
    }
    ?>
</div>

</body>
</html>
