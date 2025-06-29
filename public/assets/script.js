// const quizData = [
//     {
//         question: "What is the capital of France?",
//         options: ["London", "Berlin", "Paris", "Madrid"],
//         correct: 2
//     },
//     {
//         question: "Which planet is known as the Red Planet?",
//         options: ["Venus", "Mars", "Jupiter", "Saturn"],
//         correct: 1
//     },
//     {
//         question: "Who painted the Mona Lisa?",
//         options: ["Van Gogh", "Picasso", "Da Vinci", "Michelangelo"],
//         correct: 2
//     },
//     {
//         question: "What is the largest ocean on Earth?",
//         options: ["Atlantic", "Indian", "Arctic", "Pacific"],
//         correct: 3
//     },
//     {
//         question: "Which element has the symbol 'O'?",
//         options: ["Gold", "Silver", "Oxygen", "Iron"],
//         correct: 2
//     }
// ];

const quizData = questions;

let answers = [];

let currentQuestion = 0;
let score = 0;
let timer;
let timeLeft = duration; // duration in seconds

const questionEl = document.getElementById('question');
const optionsEl = document.getElementById('options');
const nextBtn = document.getElementById('next-btn');
const timerEl = document.getElementById('timer');
const progressBar = document.querySelector('.progress-bar');
const quizContainer = document.getElementById('quiz');

function loadQuestion() {
  const question = quizData[currentQuestion];
  questionEl.textContent = question.question;
  optionsEl.innerHTML = '';
  question.options.forEach((option, index) => {
    const button = document.createElement('button');
    button.textContent = option;
    button.classList.add('option');
    button.addEventListener('click', () => selectOption(button, index));
    optionsEl.appendChild(button);
  });
  // nextBtn.style.display = 'none';
  // timeLeft = 30;
  if (timer) clearInterval(timer);
  startTimer();
  updateProgress();
}

function selectOption(selectedButton, optionIndex) {
  const buttons = optionsEl.getElementsByClassName('option');
  Array.from(buttons).forEach(button => button.classList.remove('selected'));
  selectedButton.classList.add('selected');
  autoNext();
}

function startTimer() {
  timer = setInterval(() => {
    timeLeft--;
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    timerEl.textContent = `Time: ${minutes}:${seconds.toString().padStart(2, '0')}`;
    if (timeLeft === 0) {
      clearInterval(timer);
      checkAnswer();
      postAnswer();
    }
  }, 1000);
}

function checkAnswer() {
  const selectedOption = document.querySelector('.option.selected');
  if (!selectedOption) return;

  const selectedAnswer = Array.from(optionsEl.children).indexOf(selectedOption);
  const question = quizData[currentQuestion];

  answers.push({
    question_id: question.id,
    answer: selectedAnswer
  });
  if (selectedAnswer === question.correct) {
    score++;
    selectedOption.classList.add('correct');
  } else {
    selectedOption.classList.add('incorrect');
    optionsEl.children[question.correct].classList.add('correct');
  }

  Array.from(optionsEl.children).forEach(button => button.disabled = true);
  clearInterval(timer);
}

function updateProgress() {
  const progress = ((currentQuestion + 1) / quizData.length) * 100;
  progressBar.style.width = `${progress}%`;
  progressBar.setAttribute('aria-valuenow', progress);
}

function showResults() {
  quizContainer.innerHTML = `
        <div class="results">
            <div class="result-icon">
                <i class="fas ${score > quizData.length / 2 ? 'fa-trophy text-success' : 'fa-times-circle text-danger'}"></i>
            </div>
            <div class="score">Your score: ${score}/${quizData.length}</div>
            <p>${score > quizData.length / 2 ? 'Great job!' : 'Better luck next time!'}</p>
            <button class="option" onclick="location.reload()">Restart Quiz</button>
        </div>
    `;
}

function autoNext() {
  checkAnswer();
  currentQuestion++;
  if (currentQuestion < quizData.length) {
    setTimeout(loadQuestion, 1000);
  } else {
    setTimeout(postAnswer, 1000);
  }
}

async function postAnswer() {
  const post = await fetch(quizUrl, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': csrfToken
    },
    body: JSON.stringify({
      "answers": answers,
    })
  });

  post.json().then(result => {
    const data = result.data;
    console.log('Response:', data);
    quizContainer.innerHTML = `
        <div class="results">
            <div class="result-icon">
                <i class="fas fa-trophy text-success'}"></i>
            </div>
            <div class="score">Your score: ${data.score}</div>
            <button class="option" onclick="location.href='${homePage}'">Homepage</button>
        </div>
    `;
  }).catch(error => {
    console.error('Error:', error);
  });
}

loadQuestion();