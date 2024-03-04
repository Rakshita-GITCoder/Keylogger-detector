document.addEventListener("DOMContentLoaded", function () {
    const userInput = document.getElementById("user-input");
    const detectButton = document.getElementById("detect-button");
    
    let baselinePattern = "";

    // Function to calculate the Levenshtein distance between two strings
    function getLevenshteinDistance(s1, s2) {
        const m = s1.length;
        const n = s2.length;
        const dp = [];

        for (let i = 0; i <= m; i++) {
            dp[i] = [i];
        }

        for (let j = 0; j <= n; j++) {
            dp[0][j] = j;
        }

        for (let i = 1; i <= m; i++) {
            for (let j = 1; j <= n; j++) {
                const cost = s1[i - 1] !== s2[j - 1] ? 1 : 0;
                dp[i][j] = Math.min(
                    dp[i - 1][j] + 1,
                    dp[i][j - 1] + 1,
                    dp[i - 1][j - 1] + cost
                );
            }
        }

        return dp[m][n];
    }

    // Function to detect and compare patterns
    function detectPattern() {
        const currentPattern = userInput.value;
        
        if (!baselinePattern) {
            baselinePattern = currentPattern;
        } else {
            const levenshteinDistance = getLevenshteinDistance(currentPattern, baselinePattern);
            
            if (levenshteinDistance > 1) { // Adjust the threshold as needed
                alert("Alert: Changes found in input.");
            } else {
                alert("No changes found.");
            }
        }
    }

    // Add a click event listener to the Detect button
    detectButton.addEventListener("click", detectPattern);
});

