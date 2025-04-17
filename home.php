<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
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

        #recommendations {
            text-align: center;
            margin-top: 50px;
        }

        #recommendations .store-box {
            display: inline-block;
            margin: 10px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        #recommendations .store-box:hover {
            transform: scale(1.05);
        }

        #recommendations img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        #recommendations p {
            font-size: 1em;
            font-weight: bold;
            color: #333;
        }

        #ai-store-results {
            display: flex;
            flex-wrap: wrap; /* Allow items to wrap to the next line if needed */
            justify-content: center; /* Center items horizontally */
            align-items: center; /* Center items vertically (if needed) */
            gap: 20px; /* Add spacing between items */
            margin-top: 20px;
            padding: 10px; /* Optional: Add padding for better spacing */
        }

        #ai-store-results .store-box {
            background-color: white;
            padding: 20px;
            border-radius: 15px;
            width: 200px; /* Set a fixed width for consistency */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center content inside the box */
            transition: transform 0.3s ease;
        }

        #ai-store-results .store-box:hover {
            transform: scale(1.05);
            box-shadow: 0px 6px 16px rgba(0, 0, 0, 0.15);
        }

        #ai-store-results img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        #ai-store-results p {
            font-size: 1em;
            font-weight: bold;
            color: #333;
            margin: 10px 0;
        }

        #ai-store-results a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 0.9em;
            display: inline-block;
            margin-top: 10px;
        }

        #ai-store-results a:hover {
            background-color: #0056b3;
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
        <button type="button" id="voice-search-btn" style="background: none; border: none; padding: 0; cursor: pointer;">
            <img src="images/microphone_11811178.png" alt="Voice Search" style="width: 30px; height: 30px;">
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

    <div id="recommendations" style="margin-top: 50px;"></div>

    <script src="script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("ai-store-search-form");
            const input = document.getElementById("ai-store-search");
            const resultsDiv = document.getElementById("ai-store-results");
            const voiceSearchBtn = document.getElementById("voice-search-btn");

            if (!form || !input || !resultsDiv || !voiceSearchBtn) return;

            // Handle form submission (search button)
            form.addEventListener("submit", function (e) {
                e.preventDefault();
                const query = input.value.trim();

                if (query === "") {
                    alert("Please enter a search query.");
                    return;
                }

                // Save the search query
                fetch("save_search.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ query: query }),
                })
                    .then((response) => response.json())
                    .then((data) => {
                        console.log("Save search response:", data); // Debugging
                        if (!data.success) {
                            alert("Failed to save search query: " + data.error);
                        }
                    })
                    .catch((error) => {
                        console.error("Error saving search query:", error);
                    });

                // Perform the search
                fetch("search.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ query: query }),
                })
                    .then((response) => response.json())
                    .then((data) => {
                        console.log("Search response:", data); // Debugging
                        if (data.status === "success") {
                            resultsDiv.innerHTML = "";
                            data.results.forEach((result) => {
                                resultsDiv.innerHTML += `
                                    <div class="store-box">
                                        <img src="${result.image}" alt="${result.product}">
                                        <p><strong>${result.product}</strong></p>
                                        <p>Available at: <strong>${result.store}</strong></p>
                                        <a href="${result.url}" target="_blank">View Product</a>
                                    </div>
                                `;
                            });
                        } else {
                            resultsDiv.innerHTML = `<p>${data.message}</p>`;
                        }
                    })
                    .catch((error) => {
                        console.error("Error performing search:", error);
                    });
            });

            // Handle voice search
            if (!('webkitSpeechRecognition' in window) && !('SpeechRecognition' in window)) {
                alert("Your browser does not support voice search. Please use a modern browser.");
                return;
            }

            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
            const recognition = new SpeechRecognition();

            recognition.lang = "en-US"; // Set the language for recognition
            recognition.interimResults = false; // Only return final results
            recognition.maxAlternatives = 1;

            voiceSearchBtn.addEventListener("click", function () {
                recognition.start();
                console.log("Voice recognition started. Speak now...");
            });

            recognition.onresult = function (event) {
                const transcript = event.results[0][0].transcript;
                console.log("Voice input:", transcript);
                input.value = transcript; // Set the recognized text in the search input field

                // Trigger the search form submission
                form.dispatchEvent(new Event("submit"));
            };

            recognition.onerror = function (event) {
                console.error("Voice recognition error:", event.error);
                alert("Voice recognition failed. Please try again.");
            };

            recognition.onspeechend = function () {
                recognition.stop();
                console.log("Voice recognition stopped.");
            };

            fetch("recommendations.php")
                .then((response) => response.json())
                .then((data) => {
                    console.log("Recommendations response:", data); // Debugging
                    if (data.success) {
                        const recommendationsDiv = document.getElementById("recommendations");
                        recommendationsDiv.innerHTML = "<h2>Recommended for You</h2>";
                        data.recommendations.forEach((product) => {
                            recommendationsDiv.innerHTML += `
                                <div class="store-box">
                                    <img src="${product.image}" alt="${product.name}" style="width: 100px; height: 100px; object-fit: contain;">
                                    <p>${product.name}</p>
                                    <a href="${product.url}" target="_blank" style="text-decoration: none; color: white; background-color: #007bff; padding: 8px 12px; border-radius: 5px; display: inline-block; margin-top: 10px;">View Product</a>
                                </div>
                            `;
                        });
                    } else {
                        console.error("Failed to fetch recommendations:", data.error);
                    }
                })
                .catch((error) => console.error("Error fetching recommendations:", error));
        });
    </script>
</body>
</html>
