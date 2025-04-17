<?php
// Include the config file to access OPENAI_API_KEY constant
require_once 'config.php';

function searchOpenAI($query) {
    $apiKey = OPENAI_API_KEY;  // Fetch the API key from the config file

    // OpenAI API URL for search
    $url = "https://api.openai.com/v1/completions";

    // Data to send to OpenAI
    $data = array(
        'model' => 'text-davinci-003',
        'prompt' => $query,
        'max_tokens' => 100,
        'temperature' => 0.5
    );

    // Initialize cURL to send the API request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer ' . $apiKey,
        'Content-Type: application/json'
    ));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Get the response from OpenAI
    $response = curl_exec($ch);
    curl_close($ch);

    // Check for errors in cURL request
    if ($response === false) {
        return 'cURL Error: ' . curl_error($ch);
    }

    // Decode and return the response from OpenAI
    $decoded_response = json_decode($response, true);
    return $decoded_response['choices'][0]['text'] ?? 'No response from OpenAI';
}
?>
