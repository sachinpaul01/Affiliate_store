<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the file is uploaded
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $audioFile = $_FILES['file']['tmp_name'];

        // OpenAI API Key
        $apiKey = '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';

        // Prepare the cURL request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/audio/transcriptions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);

        // Set headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $apiKey,
        ]);

        // Set the file and model in the POST fields
        $postFields = [
            'file' => new CURLFile($audioFile, 'audio/webm', 'audio.webm'),
            'model' => 'whisper-1',
        ];
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

        // Execute the request
        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['error' => 'Failed to process audio: ' . $error]);
        } else {
            echo $response; // Return the response from OpenAI
        }
    } else {
        echo json_encode(['error' => 'No audio file uploaded or an error occurred.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Affiliate E-commerce - Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: rgb(69, 193, 215);
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            background-color: rgba(6, 73, 96, 0.5);
            padding: 15px 30px;
            border-radius: 30px;
            display: inline-block;
            margin-top: 30px;
            font-size: 1.8em;
            text-shadow: 2px 2px 5px rgba(199, 45, 45, 0.5);
        }

        .auth-buttons {
            margin-top: 15px;
        }

        .auth-buttons a {
            background-color: #333;
            color: white;
            padding: 8px 14px;
            border-radius: 20px;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }

        .auth-buttons a:hover {
            background-color:rgb(10, 9, 9);
        }

        .store-section {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 50px;
            gap: 40px;
        }

        .store-box {
            background-color: white;
            padding: 20px;
            border-radius: 15px;
            width: 180px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .store-box:hover {
            transform: scale(1.05);
            box-shadow: 0px 6px 16px rgba(0,0,0,0.15);
        }

        .store-box img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .store-box p {
            margin-top: 10px;
            font-size: 1em;
            font-weight: bold;
            color: #333;
        }

        @media (max-width: 600px) {
            .store-section {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>

    <h1>Seek Better Deals 🔎</h1>

    <div class="auth-buttons">
        <?php if (isset($_SESSION['user_id'])): ?>
            <p>Logged in as <strong><?php echo $_SESSION['email']; ?></strong></p>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="signup.php">Signup</a>
        <?php endif; ?>
    </div>

    <!-- AI Universal Search Bar -->
    <div style="text-align: center; margin: 20px auto;">
        <form id="ai-store-search-form">
            <input type="text" id="ai-store-search" placeholder="What are you looking for?" style="padding: 12px; width: 300px; border-radius: 25px;">
            <button type="submit" style="padding: 12px 20px; border-radius: 25px;">Search</button>
            <button type="button" id="voice-search-btn" style="padding: 12px 20px; border-radius: 25px; background-color: #007bff; color: white; border: none; cursor: pointer;">
                🎤
            </button>
        </form>
    </div>

    <div id="ai-store-results" style="text-align: center; margin-top: 20px;"></div>
    <h2> STORES:</h2>
    <div class="store-section">
        <a href="stores/amazon.php" target="_blank" class="store-box">
            <img src="https://i0.wp.com/www.dafontfree.co/wp-content/uploads/2021/11/Amazon-Logo-Font-1-scaled.jpg?fit=780%2C481&ssl=1" alt="Amazon">
            <p>Amazon</p>
        </a>

        <a href="stores/meesho.php" target="_blank" class="store-box">
            <img src="https://images.moneycontrol.com/static-mcnews/2023/06/Meesho-682x435.jpg" alt="Meesho">
            <p>Meesho</p>
        </a>

        <a href="stores/myntra.php" target="_blank" class="store-box">
            <img src="https://cdn.worldvectorlogo.com/logos/myntra-1.svg" alt="Myntra">
            <p>Myntra</p>
        </a>
    </div>

    <script>
        const voiceSearchBtn = document.getElementById('voice-search-btn');
        const searchInput = document.getElementById('ai-store-search');

        voiceSearchBtn.addEventListener('click', async () => {
            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                alert('Your browser does not support audio recording.');
                return;
            }

            try {
                const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
                const mediaRecorder = new MediaRecorder(stream);
                const audioChunks = [];

                mediaRecorder.ondataavailable = (event) => {
                    audioChunks.push(event.data);
                };

                mediaRecorder.onstop = async () => {
                    const audioBlob = new Blob(audioChunks, { type: 'audio/webm' });
                    const formData = new FormData();
                    formData.append('file', audioBlob);
                    formData.append('model', 'whisper-1');

                    // Send the audio to OpenAI's Whisper API
                    const response = await fetch('https://api.openai.com/v1/audio/transcriptions', {
                        method: 'POST',
                        headers: {
                            Authorization: 'Bearer YOUR_OPENAI_API_KEY',
                        },
                        body: formData,
                    });

                    const data = await response.json();
                    if (data.text) {
                        searchInput.value = data.text; // Set the transcribed text as the search query
                        document.getElementById('ai-store-search-form').submit(); // Submit the form
                    } else {
                        alert('Failed to transcribe audio.');
                    }
                };

                mediaRecorder.start();
                setTimeout(() => mediaRecorder.stop(), 5000); // Record for 5 seconds
            } catch (error) {
                alert('Error accessing microphone: ' + error.message);
            }
        });
    </script>
</body>
</html>