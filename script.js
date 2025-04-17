document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("ai-store-search-form");
    const input = document.getElementById("ai-store-search");
    const resultsDiv = document.getElementById("ai-store-results");

    if (!form || !input || !resultsDiv) return;

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
    });

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
                            <img src="${product.image}" alt="${product.name}">
                            <p>${product.name}</p>
                            <a href="${product.url}" target="_blank">View Product</a>
                        </div>
                    `;
                });
            } else {
                console.error("Failed to fetch recommendations:", data.error);
            }
        })
        .catch((error) => {
            console.error("Error fetching recommendations:", error);
        });
});