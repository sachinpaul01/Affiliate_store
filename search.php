<?php
session_start();
header('Content-Type: application/json');

// Product data for all stores
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

$myntra_products = [
    ["Girls Yoke Design Panelled Gotta Patti Kurta", "https://www.myntra.com/kurta-sets/silk+sparrow/silk-sparrow-girls-yoke-design-panelled-gotta-patti-kurta-with-sharara--with-dupatta/31702992/buy", "https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/2024/NOVEMBER/22/ciW1lvN3_6b7949a719fd42168b95e49099064a49.jpg"],
    ["Girls Ethnic Motifs Printed Regular Kurti", "https://www.myntra.com/kurta-sets/silk+sparrow/silk-sparrow-girls-ethnic-motifs-printed-regular-gotta-patti-pure-cotton-kurti-with-trousers/31702993/buy", "https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/2024/NOVEMBER/22/zDIFoepg_c867e04e613a4c7a9b013f91cb98ad92.jpg"],
    ["Floral Panelled Gotta Patti Kurta", "https://www.myntra.com/kurta-sets/silk+sparrow/silk-sparrow-girls-floral-panelled-gotta-patti-pure-cotton-kurta-with-sharara--with-dupatta/31702988/buy", "https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/2024/NOVEMBER/22/talWyu3F_79d872bfb1624fbdb261451da1f6f274.jpg"],
    ["Floral Printed Angrakha Gotta Patti Kurta", "https://www.myntra.com/kurta-sets/silk+sparrow/silk-sparrow-girls-floral-printed-angrakha-gotta-patti-kurta-with-sharara--with-dupatta/31702973/buy", "https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/2024/NOVEMBER/22/QTKCVc8V_e8555e987b374aeda70a9572fd7d261f.jpg"]
];

// Combine all products into one array
$all_products = [
    'Amazon' => $amazonProducts,
    'Meesho' => $meesho_products,
    'Myntra' => $myntra_products
];

// Get the search query
$data = json_decode(file_get_contents('php://input'), true);
$query = isset($data['query']) ? strtolower(trim($data['query'])) : '';

if (empty($query)) {
    echo json_encode(['status' => 'error', 'message' => 'No search query provided.']);
    exit();
}

// Search for the product in all stores
$results = [];
foreach ($all_products as $store => $products) {
    foreach ($products as $product) {
        if (strpos(strtolower($product[0]), $query) !== false) {
            $results[] = [
                'store' => $store,
                'product' => $product[0],
                'image' => $product[2],
                'url' => $product[1]
            ];
        }
    }
}

// Return results
if (!empty($results)) {
    echo json_encode(['status' => 'success', 'results' => $results]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Product not available in any store.']);
}
?>