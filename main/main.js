let currentQuestionIndex = 0;
let questions = [];
let clicked;

function fetchQuestions() {
    const form = document.getElementById('lang-form');
    const output = document.getElementById('output-info');
    const formData = new FormData(form);

    fetch('fetch_questions.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            console.log(data); // Dodane dla debugowania
            if (data.success) {
                questions = data.questions;
                displayQuestion();
            } else {
                output.innerHTML = 'You must choose at least one language!';
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

function displayQuestion() {
    const container = document.getElementById('questions-container');
    const questionElement = document.createElement('div');
    container.innerHTML = '';
    if (currentQuestionIndex < questions.length) {
        const question = questions[currentQuestionIndex];
        questionElement.classList.add('div-assign');
        questionElement.innerHTML = `
            <p id="lang-title">${question.assign_title}</p>
            <img class="assign-imgs" src="srv/imgs/${question.assign_img_url}" alt="Question Image"><br>
            <label class="assign-inputs"><input class="assign-radio" type="radio" name="question" value="A" onclick="checkAnswer(this, '${question.correctOpt}')"> ${question.optA}</label>
            <label class="assign-inputs"><input class="assign-radio" type="radio" name="question" value="B" onclick="checkAnswer(this, '${question.correctOpt}')"> ${question.optB}</label>
            <label class="assign-inputs"><input class="assign-radio" type="radio" name="question" value="C" onclick="checkAnswer(this, '${question.correctOpt}')"> ${question.optC}</label>
            <label class="assign-inputs"><input class="assign-radio" type="radio" name="question" value="D" onclick="checkAnswer(this, '${question.correctOpt}')"> ${question.optD}</label>
        `;
        container.appendChild(questionElement);
        container.innerHTML += '<button class="assign-buttons" onclick="nextQuestion()">Next Question</button>';
        document.getElementById('lang-list').style.display = 'none';
        container.style.display = 'block';
    } else {
        container.innerHTML = '<p>You have completed all the questions!</p><a href="index.php">Go back</a>';
    }
}

function checkAnswer(selectedOption, correctOption) {
    const labels = selectedOption.parentNode.parentNode.querySelectorAll('label');
    labels.forEach(label => {
        const input = label.querySelector('input');
        if (input.value === correctOption) {
            label.classList.add('correct');
        } else if (input.checked) {
            label.classList.add('incorrect');
        }
    });
    disableOptions();
}

function disableOptions() {
    const options = document.getElementsByName('question');
    options.forEach(option => option.disabled = true);
}

function nextQuestion() {
    currentQuestionIndex++;
    displayQuestion();
}