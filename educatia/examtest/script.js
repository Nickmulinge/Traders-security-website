const quizData = [
  {
    question: "Which of the following best describes the importance of using VPNs for traders using cloud services?",
    options: ["To increase the speed of transactions", "To ensure anonymity online", "To secure data transmission", "To store data offline"],
    answer: 2
  },
  {
    question: "How does multi-factor authentication (MFA) enhance security for cloud services used by traders?",
    options: ["By encrypting data stored in the cloud", "By providing an additional layer of security beyond just a password", "By scanning for malware in uploaded files", "By monitoring user activity for suspicious behavior"],
    answer: 1
  },
  {
    question: "Why is it important for traders to be aware of the data locality laws related to cloud services?",
    options: ["To ensure data is stored in a visually appealing manner", "To minimize latency by storing data closer to the user", "To comply with regulatory requirements regarding where data can be stored and processed", "To use data in marketing materials"],
    answer: 2
  }
]
;

let currentQuestion = 0;
let score = 0;
let countdown;

const questionElement = document.getElementById("question");
const optionsElement = document.getElementById("options-container");
const resultElement = document.getElementById("result");
const nextButton = document.getElementById("next-btn");

function loadQuestion() {
  const currentQuizData = quizData[currentQuestion];
  questionElement.textContent = currentQuizData.question;
  optionsElement.innerHTML = "";
  currentQuizData.options.forEach((option, index) => {
    const button = document.createElement("button");
    button.textContent = option;
    button.setAttribute("class", "option");
    button.addEventListener("click", function() {
      clearInterval(countdown); // Stop the countdown when an option is selected
      checkAnswer(index);
    });
    optionsElement.appendChild(button);
  });

  // Start countdown
  startCountdown();
}

function checkAnswer(optionIndex) {
  const currentQuizData = quizData[currentQuestion];
  if (optionIndex === currentQuizData.answer) {
    score++;
  }
  showNextButton();
}

function showNextButton() {
  nextButton.style.display = "block";
}

function startCountdown() {
  let timeLeft = 3; // Set countdown time in seconds

  countdown = setInterval(() => {
    if (timeLeft <= 0) {
      clearInterval(countdown);
      nextQuestion();
    } else {
      document.getElementById("countdown-value").textContent = timeLeft; // Display remaining time
      timeLeft--;
    }
  }, 1000);
}

function nextQuestion() {
  currentQuestion++;
  if (currentQuestion < quizData.length) {
    loadQuestion();
    resultElement.textContent = "";
    nextButton.style.display = "none";
  } else {
    finishQuiz();
  }
}

function finishQuiz() {
  questionElement.textContent = "Quiz Completed!";
  optionsElement.innerHTML = "";
  resultElement.textContent = "Your Score: " + score + "/" + quizData.length;
  nextButton.style.display = "none";
}

// Initial Load
loadQuestion();
