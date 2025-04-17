<?php

$host = "localhost";
$user = "root"; 
$pass = "";  
$db = "affiliate_store";  

$conn = mysqli_connect($host, $user, $pass, $db);


if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
define("OPENAI_API_KEY", "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");

?>

