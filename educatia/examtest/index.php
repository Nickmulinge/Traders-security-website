<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Quiz for Traders</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="quiz-container">
        <!-- Question container where the current question will be displayed -->
        <div id="question-container">
            <h2 id="question"></h2>
        </div>
        <!-- Options container where the answer options buttons will be dynamically added -->
        <div id="options-container">
            <!-- Options will be generated and appended here by the script -->
        </div>
        <!-- Result display area -->
        <div id="result"></div>
        <!-- Countdown timer display -->
        <div id="countdown">Time Left: <span id="countdown-value"></span></div>
        <!-- Next button to proceed to the next question, initially hidden -->
        <button id="next-btn" onclick="nextQuestion()" style="display:none;">Next Question</button>
    </div>

    <script src="script.js"></script>
</body>
</html>
